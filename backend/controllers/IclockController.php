<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\base\Action;
use yii\base\Exception;
use yii\base\UserException;
use yii\web\HttpException;
use yii\web\NotFoundHttpException;
use yii\web\ForbiddenHttpException;
use yii\web\ServerErrorHttpException;
use yii\web\Response;

use app\models\SdMachine;
use app\models\SdPc2machine;
use app\models\SdSignin;
use app\models\SdRunlog;
use app\models\SdEmployee;
use app\models\SdFingerprint;
use app\models\SdFace;

/*
 * Iclock controller
 */
class IclockController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['cdata', 'error', 'getrequest', 'devicecmd'],
                        'allow' => true,
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        /*
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
        */
    }

    /**
     * @inheritdoc
     *
     * override
     *   Disable csrf verfication in device POST, as device doesn't
     *   support Set-Cookies method at all..
     */
    public function beforeAction($action)
    {
        return true;
    }

    public function actionIndex()
    {
        return $this->actionError();
    }

    public function actionError()
    {
        /* below codes are copied from yii\web\ErrorAction.php */
        if (($exception = Yii::$app->getErrorHandler()->exception) === null) {
            // action has been invoked not from error handler, but by direct route, so we display '404 Not Found'
            $exception = new HttpException(404, Yii::t('yii', 'Page not found.'));
        }

        if ($exception instanceof HttpException) {
            $code = $exception->statusCode;
        } else {
            $code = $exception->getCode();
        }

        if ($exception instanceof Exception) {
            $name = $exception->getName();
        } else {
            $name = Yii::t('yii', 'Error');
        }

        if ($code) {
            $name .= " (#$code)";
        }

        if ($exception instanceof UserException) {
            $message = $exception->getMessage();
        } else {
            $message = Yii::t('yii', 'An internal server error occurred.');
        }

        return $this->requestResponse("$name: $message");
    }

    public function actionCdata()
    {
        $model = $this->clientBeforeRequest();

        if (Yii::$app->request->getIsGet()) {
            return $this->clientInitialize($model);
        } else if (Yii::$app->request->getIsPost()) {
            if ($model != null)
                return $this->clientCdataPostcmd($model);
        }

        $this->clientAfterRequest();
    }

    public function actionGetrequest()
    {
        $model = $this->clientBeforeRequest();

        if ($model) {
            $model->m_newtime = date('Y-m-d H:i:s');
            $model->save();
            if (Yii::$app->request->getIsGet())
                return $this->clientGetrequest($model);
        }

        $this->clientAfterRequest();
    }

    public function actionDevicecmd()
    {
        $model = $this->clientBeforeRequest();

        if ($model != null) {
            if (Yii::$app->request->getIsPost()) {
                return $this->clientDevicecmd($model);
            }
        }

        $this->clientAfterRequest();
    }

    private function clientInitialize($model)
    {
        $request = Yii::$app->request;

        $options = $request->get('options', null);

        // Parameter checking: options - required
        if ($options != 'all')
            $this->requestForbidden();

        if ($model == null) {
            $sn = $request->get('SN', '0');
            $pushver = $request->get('pushver', null);
            $language = $request->get('language', null);
            $pushcommkey = $request->get('pushcommkey', null);

            $model = new SdMachine();
            $model->m_sn = $sn;
            $model->m_pushver = $pushver;
            $model->m_language = $language;
            $model->m_pushcommkey = $pushcommkey;
            $model->m_stamp = '0';
            $model->m_opstamp = '0';
            $model->m_errordelay = 30;
            $model->m_delay = 10;
            $model->m_transflag = '1111111110';
            $model->m_newtime = date('Y-m-d H:i:s');
            $model->save();
        }

        $response  = "GET OPTION FROM:". $model->m_sn . "\n";
        $response .= "ATTLOGStamp=" . $model->m_stamp . "\n";
        $response .= "OPERLOGStamp=" . $model->m_opstamp . "\n";
        //$response .= "ATTPHOTOStamp=None\n"; // buggy: Can cause ZD reader not uploading the Face data
        $response .= "ErrorDelay=". $model->m_errordelay . "\n";
        $response .= "Delay=" . $model->m_delay . "\n";
        $response .= "TransFlags=" . $model->m_transflag . "\n";
        $response .= "TimeZone=8\n";
        $response .= "Realtime=1\n";
        $response .= "Encrypt=None\n";
        $response .= "ServerVer=2.2.14\n";

        return $this->requestResponse($response);
    }

    private function clientGetrequest($model)
    {
        $info = Yii::$app->request->get('INFO', null);
        $response = 'OK';
        if ($info) {
            // update device information
            $array = explode(',', $info);
            if (count($array) < 10)
                $this->requestForbidden();
            $model->m_firmware       = $array[0];
            $model->m_usercount      = $array[1];
            $model->m_tmpcount       = $array[2];
            $model->m_signcount      = $array[3];
            $model->m_ipaddress      = $array[4];
            $model->m_fpversion      = $array[5];
            $model->m_faceversion    = $array[6];
            $model->m_needfaceamount = $array[7];
            $model->m_facecount      = $array[8];
            $model->m_functionflag   = $array[9];
            if (!$model->save())
                $this->serverError();
        } else {
            //return $this->requestResponse('C:1:SHELL echo root:root | chpasswd'."\n");
            $commands = SdPc2Machine::findAll(['p_machinesn' => $model->m_sn, 'p_execflag' => '0']);
            if ($commands != null) {
                $response = '';
                foreach($commands as $command) {
                    $command->p_sendouttime = Date('Y-m-d H:i:s');
                    $command->save();
                    $response .= 'C:'.$command->ID.':'.$command->p_ordercontent."\n";
                }
            }
        }
        return $this->requestResponse('OK');
    }

    private function clientDevicecmd($model)
    {
        $contents = $this->clientGetRequestContent();
        foreach ($contents as $value) {
            $array = $this->clientGetPostData($value);

            $model = SdPc2machine::findOne(['ID' => $array['ID']]);
            if ($model != null) {
                $model->p_responsetime = Date('Y-m-d H:i:s');
                $model->p_responsevalue = $array['Return'];
                $model->p_execflag = '1';
                $model->save();
            }
        }
        return $this->requestResponse('OK');
    }

    private function clientGetRequestContent()
    {
        // return body in line arrays
        return explode("\n", Yii::$app->request->getRawBody());
    }

    private function clientCdataPostOplogcmd($data)
    {
        // data format: OPTYPE OPWHO OPTIME Value1 Value2 Value3 Reserved
        $data = explode("\t", $data);
        if (count($data) == 7) {
            //TODO
            /*
            $runlog = new SdRunlog();

            $runlog->r_type = $data[0];
            $runlog->r_operator = $data[1];
            $runlog->r_logtime = $data[2];

            $runlog->save();
            */

            return true;
        }

        return false;
    }

    private function clientGetPostData($data)
    {
        // data input format: key1=value1\t[key2=value2\t]
        // process sequence:
        // 1. convert to query string
        // 2. parse key/value pair
        // 3. return as array
        parse_str(str_replace([' ', "\t", ','], '&', $data), $array);
        return $array;
    }

    private function clientCdataPostUsercmd($data)
    {
        $array = $this->clientGetPostData($data);

        Yii::error($data);

        if (count($array) > 6) {
            $table = SdEmployee::findOne(['e_pin' => $array['PIN']]);
            if ($table == null)
                $table = new SdEmployee();

            $table->e_pin    = $array['PIN'];
            //$table->e_name   = $array['Name']; // Device cannot input chinese name
            $table->e_pri    = $array['Pri'];
            $table->e_passwd = $array['Passwd'];
            $table->e_card   = $array['Card'];
            $table->e_grp    = $array['Grp'];
            $table->e_tz     = $array['TZ'];

            if ($table->save())
                return true;
        }

        return false;
    }

    private function clientCdataPostFpcmd($data)
    {
        $array = $this->clientGetPostData($data);

        Yii::error($data);

        if (count($array) == 5) {
            $table = SdFingerprint::findOne(['fp_owner_pin' => $array['PIN'], 'fp_index' => $array['FID']]);
            if ($table == null)
                $table = new SdFingerprint();

            $table->fp_owner_pin = $array['PIN'];
            $table->fp_index     = $array['FID'];
            $table->fp_size      = $array['Size'];
            //$table->fp_valid     = $array['Valid'];
            $table->fp_content   = $array['TMP']; // TMP: Template
            $table->fp_machine   = Yii::$app->request->get('SN', '0');

            if ($table->save())
                return true;
        }

        return false;
    }

    private function clientCdataPostFacecmd($data)
    {
        $array = $this->clientGetPostData($data);

        if (count($array) == 5) {
            $table = SdFace::findOne(['fa_owner_pin' => $array['PIN'], 'fa_index' => $array['FID']]);
            if ($table == null)
                $table = new SdFace();

            $table->fa_owner_pin = $array['PIN'];
            $table->fa_index     = $array['FID'];
            $table->fa_size      = $array['SIZE'];
            //$table->fa_valid     = $array['VALID'];
            $table->fa_content   = $array['TMP']; // TMP: Template
            $table->fa_machine   = Yii::$app->request->get('SN', '0');

            if ($table->save())
                return true;
        }

        return false;
    }

    private function clientCdataPostUserpiccmd($data)
    {
        //TODO:
        return true;
    }

    private function clientCdataPostcmd($model)
    {
        $cmd = Yii::$app->request->get('table', 'none');
        $stamp = Yii::$app->request->get('Stamp', null);
        $key = -1;

        switch ($cmd) {
        case 'ATTLOG': // attendance logs
            // retrieve the body contents
            $contents = $this->clientGetRequestContent();
            foreach ($contents as $value) {
                // data format: pin \t time \t status \t verify \t workcode \t reserved \t reserved
                $data = explode("\t", $value);
                if (count($data) > 6) {
                    $table = new SdSignin();
                    $table->s_owner_pin = $data[0];
                    $table->s_signtime = $data[1];
                    $table->s_workstatus = $data[2];
                    $table->s_verifytype = $data[3];
                    $table->s_workcode = $data[4];
                    if (!$table->save())
                        break;
                    $key++;
                }
            }
            break;
        case 'OPERLOG': // operation logs
            // retrieve the body contents
            $contents = $this->clientGetRequestContent();
            foreach ($contents as $value) {
                if (strncmp($value, 'OPLOG ', 6) == 0)
                    $retval = $this->clientCdataPostOplogcmd(substr($value, 6));
                else if (strncmp($value, 'USER ', 5) == 0)
                    $retval = $this->clientCdataPostUsercmd(substr($value, 5));
                else if (strncmp($value, 'FP ', 3) == 0)
                    $retval = $this->clientCdataPostFpcmd(substr($value, 3));
                else if (strncmp($value, 'USERPIC ', 8) == 0)
                    $retval = $this->clientCdataPostUserpiccmd(substr($value, 8));
                else if (strncmp($value, 'FACE ', 5) == 0)
                    $retval = $this->clientCdataPostFacecmd(substr($value, 5));
                else
                    $retval = true; //FIXME: ignore for now

                if (!$retval)
                    break;

                $key++;
            }

            break;
        case 'ATTPHOTO': // attendance photoes
            //TODO
            return $this->requestResponse('OK');
        }

        if ($key > -1) {
            if ($stamp) {
                // update the stamp
                switch ($cmd) {
                case 'ATTLOG':
                    $model->m_stamp = $stamp;
                    break;
                case 'OPERLOG':
                    $model->m_opstamp = $stamp;
                    break;
                case 'ATTPHOTO':
                    break;
                }

                $model->save();
            }

            $this->requestResponse('OK:' . $key);
        } else
            $this->requestForbidden();
    }

    private function clientBeforeRequest()
    {
        $sn = Yii::$app->request->get('SN', null);
        if ($sn == null)
            $this->requestForbidden();

        $model = SdMachine::findOne(['m_sn' => $sn]);
        if ($model != null) {
            $model->m_newtime = date('Y-m-d H:i:s');
            $model->save();
        }

        return $model;
    }

    private function clientAfterRequest()
    {
        $this->requestNotfound();
    }

    private function requestForbidden()
    {
        throw new ForbiddenHttpException('You are not allowed to access this page.');
    }

    private function requestNotfound()
    {
        throw new NotFoundHttpException('The requested page not found.');
    }

    private function serverError()
    {
        throw new ServerErrorHttpException('Internal server error.');
    }

    private function requestResponse($content)
    {
        // content format in text-plain
        Yii::$app->response->format = Response::FORMAT_RAW;
        Yii::$app->response->getHeaders()->set('Content-Type', 'text/plain; charset=' . Yii::$app->response->charset);
        Yii::$app->response->content = $content;
    }
}
