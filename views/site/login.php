<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width initial-scale=1.0">
        <link href="<?= Yii::$app->request->baseUrl ?>/asset/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?= Yii::$app->request->baseUrl ?>/asset/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
        <link href="<?= Yii::$app->request->baseUrl ?>/asset/vendors/line-awesome/css/line-awesome.min.css" rel="stylesheet" />
        <link href="<?= Yii::$app->request->baseUrl ?>/asset/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
        <link href="<?= Yii::$app->request->baseUrl ?>/asset/vendors/animate.css/animate.min.css" rel="stylesheet" />
        <link href="<?= Yii::$app->request->baseUrl ?>/asset/vendors/toastr/toastr.min.css" rel="stylesheet" />
        <link href="<?= Yii::$app->request->baseUrl ?>/asset/vendors/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
        <link href="<?= Yii::$app->request->baseUrl ?>/asset/css/main.min.css" rel="stylesheet" />
        <style>
            body {
                background-repeat: no-repeat;
                background-size: cover;
                background-image: url('<?= Yii::$app->request->baseUrl ?>/asset/img/blog/17.jpg');
            }

            .cover {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                background-color: rgba(117, 54, 230, .1);
            }

            .login-content {
                max-width: 400px;
                margin: 100px auto 50px;
            }

            .auth-head-icon {
                position: relative;
                height: 60px;
                width: 60px;
                display: inline-flex;
                align-items: center;
                justify-content: center;
                font-size: 30px;
                background-color: #fff;
                color: #5c6bc0;
                box-shadow: 0 5px 20px #d6dee4;
                border-radius: 50%;
                transform: translateY(-50%);
                z-index: 2;
            }
        </style>
    </head>
    <body>
    <div class="cover"></div>
    <div class="ibox login-content">
        <div class="text-center">
            <span class="auth-head-icon"><i class="la la-user"></i></span>
        </div>
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'ibox-body'],
        ]); ?>

        <h4 class="font-strong text-center mb-5">LOG IN</h4>
        <div class="form-group mb-4">
            <?= $form->field($model, 'username')->textInput(['class' => 'form-control form-control-line', 'placeholder' => 'Email']) ?>
        </div>
        <div class="form-group mb-4">
            <?= $form->field($model, 'password')->passwordInput(['class' => 'form-control form-control-line', 'placeholder' => 'Password']) ?>
        </div>
        <div class="flexbox mb-5">
    <span>
        <?= $form->field($model, 'rememberMe')->checkbox(['template' => '<label class="ui-switch switch-icon mr-2 mb-0">{input}<span></span></label>Remember']) ?>
    </span>
            <a class="text-primary" href="#">Forgot password?</a>
        </div>
        <div class="text-center mb-4">
            <?= Html::submitButton('LOGIN', ['class' => 'btn btn-primary btn-rounded btn-block']) ?>
        </div>

        <?php ActiveForm::end(); ?>


    </div>
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <script src="<?= Yii::$app->request->baseUrl ?>/asset/vendors/jquery/dist/jquery.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/asset/vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/asset/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/asset/vendors/metisMenu/dist/metisMenu.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/asset/vendors/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/asset/vendors/jquery-idletimer/dist/idle-timer.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/asset/vendors/toastr/toastr.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/asset/vendors/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/asset/vendors/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="<?= Yii::$app->request->baseUrl ?>/asset/js/app.min.js"></script>
    <script>
        $(function() {
            $('#login-form').validate({
                errorClass: "help-block",
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true
                    }
                },
                highlight: function(e) {
                    $(e).closest(".form-group").addClass("has-error")
                },
                unhighlight: function(e) {
                    $(e).closest(".form-group").removeClass("has-error")
                },
            });
        });
    </script>
    </body>
    </html>
</div>
