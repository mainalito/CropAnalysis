<?php

namespace app\controllers;

use app\models\NotificationStatuses;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * NotificationStatusesController implements the CRUD actions for NotificationStatuses model.
 */
class NotificationStatusesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all NotificationStatuses models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => NotificationStatuses::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'notificationStatusId' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single NotificationStatuses model.
     * @param int $notificationStatusId Notification Status ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($notificationStatusId)
    {
        return $this->render('view', [
            'model' => $this->findModel($notificationStatusId),
        ]);
    }

    /**
     * Creates a new NotificationStatuses model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new NotificationStatuses();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'notificationStatusId' => $model->notificationStatusId]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing NotificationStatuses model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $notificationStatusId Notification Status ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($notificationStatusId)
    {
        $model = $this->findModel($notificationStatusId);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'notificationStatusId' => $model->notificationStatusId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing NotificationStatuses model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $notificationStatusId Notification Status ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($notificationStatusId)
    {
        $this->findModel($notificationStatusId)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the NotificationStatuses model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $notificationStatusId Notification Status ID
     * @return NotificationStatuses the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($notificationStatusId)
    {
        if (($model = NotificationStatuses::findOne(['notificationStatusId' => $notificationStatusId])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
