<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\Url;

use app\models\SdArea;
use app\models\SdAreaSearch;

/**
 * SdAreaController implements the CRUD actions for SdArea model.
 */
class SdAreaController extends Controller
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
                        'actions' => ['view', 'index', 'create', 'delete', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SdArea models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->request->isAjax) {
            $model = $this->findModel(Yii::$app->request->post('editableKey'));

            if ($model != null) {
                $post = [];
                $posted = current($_POST['SdArea']);
                $post['SdArea'] = $posted;
                if ($model->load($post)) {
                    $model->save();
                    return Json::encode([
                                'success' => true,
                                'messages' => [
                                    'kv-detail-info' => Yii::t('app', '删除成功'),
                                ],
                            ]);
                }
            }

            return Json::encode([
                                'success' => false,
                                'messages' => [
                                    'kv-detail-error' => Yii::t('app', '无法完成操作'),
                                ],
                            ]);
        }

        $searchModel = new SdAreaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SdArea model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('kv-detail-success', Yii::t('app', '保存成功'));
            return $this->redirect(['view', 'id'=>$id]);
        }

        return $this->render('view', ['model' => $model]);
    }

    /**
     * Creates a new SdArea model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SdArea();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', ['model' => $model]);
        }
    }

    /**
     * Updates an existing SdArea model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', ['model' => $model]);
        }
    }

    /**
     * Deletes an existing SdArea model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if (Yii::$app->request->isAjax) {
            if ($this->findModel($id)->delete()) {
                return Json::encode([
                            'success' => true,
                            'messages' => [
                                'kv-detail-info' => Yii::t('app', '删除成功') . '# ' . $id .
                                '<a href="'. Url::to(['sd-area/index']) .
                                '" class="btn btn-sm btn-info">' . ' ' .
                                '<i class="glyphicon glyphicon-hand-right"></i>' .
                                Yii::t('app', '点击继续') . '</a>',
                            ],
                        ]);
            } else {
                return Json::encode([
                            'success' => false,
                            'messages' => [
                                'kv-detail-error' => Yii::t('app', '无法删除') . '# ' . $id . '.',
                            ]
                        ]);
            }
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SdArea model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SdArea the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SdArea::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', '请求的页面不存在.');
        }
    }
}
