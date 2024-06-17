<?php

namespace app\controllers;

use app\models\LaboratoryFindings;
use app\models\Parameters;
use app\models\TestSubmissions;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * LaboratoryFindingsController implements the CRUD actions for LaboratoryFindings model.
 */
class LaboratoryFindingsController extends Controller
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
     * Lists all LaboratoryFindings models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => LaboratoryFindings::find(),
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
     * Displays a single LaboratoryFindings model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new LaboratoryFindings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($id)
    {
        $test_submission = TestSubmissions::findOne($id);
        $parameters = Parameters::find()->andWhere(['natureOfAnalysisId' => $test_submission->natureOfAnalysisId])->all();
        $model = LaboratoryFindings::find()->andWhere(['submissionId' => $test_submission->id])->asArray()->all();
        $model = ArrayHelper::index($model, 'parameterId');
        if ($this->request->isPost) {
            if (Yii::$app->request->post() && isset(Yii::$app->request->post()["description"])) {
                $descriptions = Yii::$app->request->post()["description"];
                foreach ($descriptions as $key => $description) {
                    $jsonString = str_replace("'", "\"", $key);
                    $formObject = json_decode($jsonString);
                    if ($description != '') {
                        $this->add_finding($formObject, $description);
                    }
                }
                return $this->redirect(['test-submissions/view', 'id' => $test_submission->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'parameters' => $parameters,
            'test_submission' => $test_submission,
        ]);
    }

    private function add_finding($formObject, $description)
    {
        $model = LaboratoryFindings::find()->andWhere(['submissionId' => $formObject->submissionId, 'parameterId' => $formObject->parameterId])->one();
        if(is_null($model))
            $model = new LaboratoryFindings();
        $model->submissionId = $formObject->submissionId;
        $model->parameterId = $formObject->parameterId;
        $model->comments = $description;
        return $model->save() ? $model : null;
    }

    /**
     * Updates an existing LaboratoryFindings model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing LaboratoryFindings model.
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
     * Finds the LaboratoryFindings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return LaboratoryFindings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LaboratoryFindings::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
