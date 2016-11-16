<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\Url;

use app\models\SdDepartment;
use app\models\SdDepartmentSearch;

/**
 * SdDepartmentController implements the CRUD actions for SdDepartment model.
 */
class SdDepartmentController extends Controller
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
     * Lists all SdDepartment models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->request->isAjax) {
            $model = $this->findModel(Yii::$app->request->post('editableKey'));

            $post = [];
            $posted = current($_POST['SdDepartment']);
            $post['SdDepartment'] = $posted;
            if ($model->load($post)) {
                $model->save();
                // PJAX in editableColument won't use success for
                // error conditions, an empty payload also works well
                return Json::encode(['success' => true]);
            }

            return Json::encode(['success' => false, 'message' => Yii::t('app', '无法完成操作')]);
        }

        $searchModel = new SdDepartmentSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SdDepartment model.
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
     * Creates a new SdDepartment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SdDepartment();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', ['model' => $model]);
        }
    }

    /**
     * Updates an existing SdDepartment model.
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
     * Deletes an existing SdDepartment model.
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
                            '<a href="'. Url::to(['sd-department/index']) .
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
     * Finds the SdDepartment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SdDepartment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SdDepartment::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
