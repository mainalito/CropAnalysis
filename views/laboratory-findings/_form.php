<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\LaboratoryFindings $model */
/** @var yii\widgets\ActiveForm $form */
/** @var app\models\TestSubmissions $test_submission */
/** @var app\models\Parameters $parameters */
?>

<div class="laboratory-findings-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="ibox-body">
        <table class="table table-bordered">
            <thead class="thead-default thead-lg">
            <th>#</th>
            <th>Parameter</th>
            <th>Findings</th>
            </thead>
            <tbody>
            <?php $count = 0;
            foreach ($parameters as $parameter): ?>
                <tr>
                    <td>
                        <?= ++$count ?>
                    </td>
                    <td>
                        <label>
                            <input class="form-control" disabled type="text" value="<?= $parameter->name ?? '' ?>">
                        </label>
                    </td>
                    <td>
                        <label>
                            <?php //print_r('<pre>'); var_dump($model[$parameter->id]).exit(); ?>
                            <textarea
                                    name="description[{'submissionId':<?= $test_submission->id ?>, 'parameterId':<?= $parameter->id ?>}]"
                                    class="form-control" rows="6"
                                    cols="50"><?= $model[$parameter->id]["comments"] ?? '' ?></textarea>
                        </label>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Submit', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
