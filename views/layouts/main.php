<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\assets\AppAsset;
use yii\bootstrap5\BootstrapAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

BootstrapAsset::register($this);

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php $this->head() ?>
    <body class="fixed-navbar">
    <?php $this->beginBody() ?>
    <div class="page-wrapper">
        <header class="header">
            <div class="page-brand">
                <a href="index.html">
                    <span class="brand">CROP ANALYSIS</span>
                    <span class="brand-mini">CA</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler" href="javascript:;">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link search-toggler js-search-toggler"><i class="ti-search"></i>
                            <span>Search here...</span>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <span>Super User</span>
                            <img src="asset/img/users/admin-image.png" alt="image"/>
                        </a>
                        <div class="dropdown-menu dropdown-arrow dropdown-menu-right admin-dropdown-menu">
                            <div class="dropdown-arrow"></div>
                            <div class="admin-menu-content">
                                <div class="d-flex justify-content-between mt-2">
                                    <?php
                                    echo Html::beginForm(['/site/logout'], 'post');
                                    echo Html::submitButton(
                                        '<i class="fa fa-power-off"></i> Logout',
                                        ['class' => 'btn btn-link logout nav-link']
                                    );
                                    echo Html::endForm(); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <?= $this->render('/layouts/sidebar') ?>
        <div class="content-wrapper">
            <?= $content ?>
            <footer class="page-footer">
                <div class="font-13"><?= date('Y') ?> © <b>Crop Analysis</b></div>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
    </div>

    <?php $this->endBody() ?>
    </body>

    </html>
<?php $this->endPage() ?>