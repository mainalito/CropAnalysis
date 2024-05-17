<?php

namespace frontend\controllers;

use app\models\Departments;
use app\models\FinancialInstitutions;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;;

/**
 *
 * Get Dependent drop downs
 *
 * Locations
 * Region feeds Districts feed County feed Sub County feed Parish. Village will be a text field
 */
class DropDownsController extends Controller
{
    private $dependencyDropdownFirstParam;


    public function beforeAction($action)
    {
        $this->dependencyDropdownFirstParam = Yii::$app->request->post('depdrop_parents') ?? NULL;
        return parent::beforeAction($action);
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['financial-institution', 'institution-departments'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionFinancialInstitution()
    {
        echo $this->_generate_dropDown(
            FinancialInstitutions::find()
                ->where(['institutionTypeId' => $this->dependencyDropdownFirstParam])
                ->all()
            , 'financialInstitutionName'
        );
    }

    private function _generate_dropDown($data, $value)
    {

        $response = [];

        foreach ($data as $datum)
            $response[] = [
                'id' => $datum->institutionTypeId,
                'name' => $datum->$value,
            ];

        return json_encode([
            'output' => $response,
            'selected' => [],
        ]);
    }
    public function actionInstitutionDepartments()
    {
        echo $this->_generate_departments(
            Departments::find()
                ->where(['institutionId' => $this->dependencyDropdownFirstParam])
                ->all()
            , 'departmentName'
        );
    }

    private function _generate_departments($data, $value)
    {

        $response = [];

        foreach ($data as $datum)
            $response[] = [
                'id' => $datum->departmentId,
                'name' => $datum->$value,
            ];

        return json_encode([
            'output' => $response,
            'selected' => [],
        ]);
    }
}