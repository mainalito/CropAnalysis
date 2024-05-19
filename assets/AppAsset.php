<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot'
    ;
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'asset/vendors/bootstrap/dist/css/bootstrap.min.css',
        'asset/vendors/font-awesome/css/font-awesome.min.css',
        'asset/vendors/line-awesome/css/line-awesome.min.css',
        'asset/vendors/themify-icons/css/themify-icons.css',
        'asset/vendors/animate.css/animate.min.css',
        'asset/vendors/toastr/toastr.min.css',
        'asset/vendors/bootstrap-select/dist/css/bootstrap-select.min.css',
        'asset/vendors/alertifyjs/dist/css/alertify.css',
        'asset/css/main.min.css',
    ];
    public $js = [
        //'asset/vendors/jquery/dist/jquery.min.js',
        //'https://code.jquery.com/jquery-3.7.1.min.js',
        'asset/vendors/popper.js/dist/umd/popper.min.js',
        'asset/vendors/bootstrap/dist/js/bootstrap.min.js',
        'asset/vendors/metisMenu/dist/metisMenu.min.js',
        'asset/vendors/jquery-slimscroll/jquery.slimscroll.min.js',
        'asset/vendors/jquery-idletimer/dist/idle-timer.min.js',
        'asset/vendors/toastr/toastr.min.js',
        'asset/vendors/jquery-validation/dist/jquery.validate.min.js',
        'asset/vendors/bootstrap-select/dist/js/bootstrap-select.min.js',
        'asset/vendors/alertifyjs/dist/js/alertify.js',
        'asset/js/app.min.js',
        'asset/js/scripts/alertify-demo.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
