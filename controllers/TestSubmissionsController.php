<?php

namespace app\controllers;

use app\models\Farms;
use app\models\LaboratoryFindings;
use app\models\NatureOfAnalysis;
use app\models\TestingTypes;
use app\models\TestSubmissions;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TestSubmissionsController implements the CRUD actions for TestSubmissions model.
 */
class TestSubmissionsController extends Controller
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
     * Lists all TestSubmissions models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => TestSubmissions::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TestSubmissions model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $dataProvider = new ActiveDataProvider([
            'query' => LaboratoryFindings::find()->andWhere(['submissionId' => $model->id]),
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
        ]);
        return $this->render('view', [
            'model' => $model,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new TestSubmissions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TestSubmissions();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['laboratory-findings/create', 'id' => $model->id]);
            }
        }

        $farms = ArrayHelper::map(Farms::find()->all(), 'id', 'name');
        $testing_types = ArrayHelper::map(TestingTypes::find()->all(), 'id', 'name');
        $nature_of_analysis = ArrayHelper::map(NatureOfAnalysis::find()->all(), 'id', 'name');
        return $this->render('create', [
            'model' => $model,
            'farms' => $farms,
            'testing_types' => $testing_types,
            'nature_of_analysis' => $nature_of_analysis
        ]);
    }

    /**
     * Updates an existing TestSubmissions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['laboratory-findings/create', 'id' => $model->id]);
        }

        $farms = ArrayHelper::map(Farms::find()->all(), 'id', 'name');
        $testing_types = ArrayHelper::map(TestingTypes::find()->all(), 'id', 'name');
        $nature_of_analysis = ArrayHelper::map(NatureOfAnalysis::find()->all(), 'id', 'name');
        return $this->render('update', [
            'model' => $model,
            'farms' => $farms,
            'testing_types' => $testing_types,
            'nature_of_analysis' => $nature_of_analysis
        ]);
    }

    /**
     * Deletes an existing TestSubmissions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TestSubmissions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TestSubmissions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TestSubmissions::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
