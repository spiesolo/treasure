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
use yii\web\Response;

use app\models\SdMachine;

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

        return $this->actionResponse("$name: $message");
    }

    public function actionCdata()
    {
        $this->clientBeforeRequest();

        if (Yii::$app->request->isGet) {
            return $this->clientInitialize();
        } else if (Yii::$app->request->isPost) {
            return $this->actionResponse('OK');
        }

        $this->clientAfterRequest();
    }

    public function actionGetrequest()
    {
        $this->clientBeforeRequest();

        $model = SdMachine::find()->where(['m_sn' => Yii::$app->request->get('SN', '0')])->one();
        if ($model) {
            if ($request->isGet) {
                return $this->clientGetrequest();
            }
        }

        $this->clientAfterRequest();
    }

    public function actionDevicecmd()
    {
        $this->clientBeforeRequest();

        $model = SdMachine::find()->where(['m_sn' => Yii::$app->request->get('SN', '0')])->one();
        if ($model) {
            if ($request->isGet) {
                return $this->clientDevicecmd();
            }
        }

        $this->clientAfterRequest();
    }

    private function clientInitialize()
    {
        $request = Yii::$app->request;

        $sn = $request->get('SN', '0');
        $options = $request->get('options', null);

        // Parameter checking: options - required
        if ($options != 'all')
            $this->requestForbidden();

        $model = SdMachine::find()->where(['m_sn' => $sn])->one();
        if (!$model) {
            $options = $request->get('options', null);
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
            $model->m_transflag = '1111111111';
            $model->save();
        }

        $response  = "GET OPTION FROM:". $model->m_sn . "\n";
        $response .= "ATTLOGStamp=" . $model->m_stamp . "\n";
        $response .= "OPERLOGStamp=" . $model->m_opstamp . "\n";
        $response .= "ATTPHOTOStamp=None\n";
        $response .= "ErrorDelay=". $model->m_errordelay . "\n";
        $response .= "Delay=" . $model->m_delay . "\n";
        $response .= "TransFlags=" . $model->m_transflag . "\n";
        $response .= "TimeZone=8\n";
        $response .= "Realtime=1\n";
        $response .= "Encrypt=None\n";

        return $this->actionResponse($response);
    }

    private function clientGetrequest()
    {
        return $this->actionResponse('OK');
    }

    private function clientDevicecmd()
    {
        return $this->actionResponse('OK');
    }

    private function clientBeforeRequest()
    {
        if (!Yii::$app->request->get('SN', null))
            $this->requestForbidden();
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

    private function actionResponse($response)
    {
        // content format in text-plain
        Yii::$app->response->format = Response::FORMAT_RAW;
        Yii::$app->response->getHeaders()->set('Content-Type', 'text/plain; charset=' . Yii::$app->response->charset);
        Yii::$app->response->content = $response;
    }
}
