<?php

namespace backend\controllers;

use app\models\SdDepartment;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\helpers\Url;



use app\models\SdEmployee;
use app\models\SdEmployeeSearch;

/**
 * SdEmployeeController implements the CRUD actions for SdEmployee model.
 */
class SdEmployeeController extends Controller
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
                        'actions' => ['view', 'index', 'create', 'update', 'delete'],
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
     * Lists all SdEmployee models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->request->isAjax) {
            $model = $this->findModel(Yii::$app->request->post('editableKey'));

            if ($model != null) {
                $post = [];
                $posted = current($_POST['SdEmployee']);
                $post['SdEmployee'] = $posted;
                if ($model->load($post)) {
                    $model->save();
                    // no message payload can be provided, as this would be regarded
                    // as an error in GridView PJax
                    return Json::encode(['success' => true]);
                }
            }

            return Json::encode(['success' => false, 'message' => Yii::t('app', '无法完成操作')]);
        }

        $searchModel = new SdEmployeeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SdEmployee model.
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

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SdEmployee model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SdEmployee();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SdEmployee model.
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
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SdEmployee model.
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
                            '<a href="'. Url::to(['sd-employee/index']) .
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
     * Finds the SdEmployee model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SdEmployee the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SdEmployee::findOne($id)) !== null) {
//        if(($model = SdEmployee::find()->leftJoin(SdDepartment::tableName(), 'SD_department.d_sn = SD_employee.e_dept_no '))){
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', '请求的页面不存在.'));
        }
    }
}
