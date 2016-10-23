<?php

namespace yiimodules\newsletter\controllers;

use Yii;
use yiimodules\newsletter\models\Campaigns;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CampaignsController implements the CRUD actions for Campaigns model.
 */
class CampaignsController extends Controller
{

	public $layout = '@app/modules/admin/views/layouts/newadmin';

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Campaigns models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Campaigns::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Campaigns model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Campaigns();

        if ($model->load(Yii::$app->request->post())) {
			$model->type = 'EMAIL';
			$model->schedule_date_time = Yii::$app->formatter->asDatetime(strtotime($model->schedule_date_time), "php:d M Y h:i a");
			if($model->save()){
				Yii::$app->session->setFlash('success','Campaign created successfully.');
				return $this->redirect(['index']);
			} else{
				Yii::$app->session->setFlash('danger','Unable to create campaign.');
			}
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }		
    }

    /**
     * Updates an existing Campaigns model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

         if ($model->load(Yii::$app->request->post())) {
			$model->schedule_date_time = Yii::$app->formatter->asDatetime(strtotime($model->schedule_date_time), "php:Y-m-d H:i:s");
			if($model->save()){
				Yii::$app->session->setFlash('success','Campaign created successfully.');
				return $this->redirect(['index']);
			} else{
				Yii::$app->session->setFlash('danger','Unable to create campaign.');
			}
		} else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Campaigns model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Campaigns model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Campaigns the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Campaigns::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
