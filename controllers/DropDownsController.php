<?php

namespace app\controllers;

use app\models\Crops;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;

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
                        'actions' => ['crops'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionCrops()
    {
        //var_dump($this->dependencyDropdownFirstParam).exit();
        echo $this->_generate_dropDown(
            Crops::find()
                ->where(['cropCategoryId' => $this->dependencyDropdownFirstParam])
                ->all()
            , 'name'
        );
    }

    private function _generate_dropDown($data, $value)
    {

        $response = [];

        foreach ($data as $datum)
            $response[] = [
                'id' => $datum->id,
                'name' => $datum->$value,
            ];

        return json_encode([
            'output' => $response,
            'selected' => [],
        ]);
    }
}