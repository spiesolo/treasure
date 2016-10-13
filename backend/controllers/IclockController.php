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
use yii\web\Response;
use common\models\LoginForm;

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
        $request = Yii::$app->request;

        $sn = $request->get('SN', null);
        if (!$sn)
            return $this->actionError();

        if ($request->isGet) {
            return $this->clientDeviceInitialize();
        } else if ($request->isPost) {
            return $this->actionResponse('OK');
        }
        return $this->actionError();
    }

    public function actionGetrequest()
    {
        $request = Yii::$app->request;

        $sn = $request->get('SN', null);
        if (!$sn)
            return $this->actionError();

        if ($request->isGet) {
            return $this->clientGetrequest();
        }
        return $this->actionError();
    }

    public function actionDevicecmd()
    {
        $request = Yii::$app->request;

        $sn = $request->get('SN', null);
        if (!$sn)
            return $this->actionError();

        if ($request->isGet) {
            return $this->clientDevicecmd();
        }
        return $this->actionError();
    }

    private function clientDeviceInitialize()
    {
        $request = Yii::$app->request;

        $sn = $request->get('SN', null);
        $options = $request->get('options', null);
        $pushver = $request->get('pushver', null);
        $language = $request->get('language', null);

        $response  = "GET OPTION FROM:". $sn . "\n";
        $response .= "ATTLOGStamp=None\n";
        $response .= "OPERLOGStamp=9999\n";
        $response .= "ATTPHOTOStamp=None\n";
        $response .= "ErrorDelay=30\n";
        $response .= "Delay=10\n";
        $response .= "TransFlags=1111111111\n";
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

    private function actionResponse($response)
    {
        // content format in text-plain
        Yii::$app->response->format = Response::FORMAT_RAW;
        Yii::$app->response->getHeaders()->set('Content-Type', 'text/plain; charset=' . Yii::$app->response->charset);
        Yii::$app->response->content = $response;
    }
}
