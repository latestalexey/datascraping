
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;


use yii\widgets\Menu;
use common\models\User;

use frontend\widgets\ModalNotification;

use frontend\assets\AppAsset;
AppAsset::register($this);



?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html dir="ltr" lang="<?= Yii::$app->language ?>">
<head>
    <meta name="author" content="<?= Yii::$app->params['author'] ?>" />
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="content-type" content="text/html; charset=<?= Yii::$app->charset ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?= Html::csrfMetaTags() ?>

    <!-- Document Title
    ============================================= -->
    <title><?= Html::encode($this->title) ?></title>

    <!-- Stylesheets
    ============================================= -->
    <?php $this->head() ?>
</head>
<body class="stretched">
    <?php $this->beginBody() ?>

    <!-- Header
    ============================================= -->
    <header id="header">

        <div id="header-wrap">

            <div class="container clearfix">

                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>
                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <!--
                    <a href="index.html" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo.png" alt="Canvas Logo"></a>
                    <a href="index.html" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="images/logo@2x.png" alt="Canvas Logo"></a>
                    -->
                    
                    <a href="/" class="app-name"> <?= Yii::$app->name; ?></a>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu" class="style-4">
                    <?=
                        Menu::widget([
                          'items' => [
                            ['label'=>'Данные по запросу','url'=>['/service/view','id'=>'data-on-demand']],
                            ['label'=>'Потоки данных','url'=>['/service/view','id'=>'data-stream']],
                            ['label' => 'Контакты', 'url' => ['/site/contact']],
                            //['label'=>'Вход','url'=>User::getLoginUrl(),'visible'=>Yii::$app->user->isGuest],
                            
                          ],
                          //'options'=>['class'=>'navigation clearfix'],
                          'activeCssClass'=>'current'

                        ]);
                      ?>

                    <!-- Top Search
                    ============================================= -->
                    <div id="top-search">
                        <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                        <form action="search.html" method="get">
                            <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                        </form>
                    </div><!-- #top-search end -->

                </nav><!-- #primary-menu end -->

                

            </div>

        </div>

    </header><!-- #header end -->
    

    <?= $content; ?>
    <?= ModalNotification::widget(); ?>

    <!-- Go To Top
    ============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>

    <!-- Footer
    ============================================= -->
    <footer id="footer" class="dark">

        

        <!-- Copyrights
        ============================================= -->
        <div id="copyrights">

            <div class="container clearfix">

                <div class="col_half">
                    Copyrights &copy; <?= Date('Y'); ?> All Rights Reserved by <?= Yii::$app->name;?>.<br>
                    <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                </div>

                <div class="col_half col_last tright">
                    <div class="fright clearfix">
                        <a href="#" class="social-icon si-small si-borderless si-facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>
                        <a href="#" class="social-icon si-small si-borderless si-instagram">
                            <i class="icon-instagram"></i>
                            <i class="icon-instagram"></i>
                        </a>
                        <a href="#" class="social-icon si-small si-borderless si-vk">
                            <i class="icon-vk"></i>
                            <i class="icon-vk"></i>
                        </a>

                    </div>

                    <div class="clear"></div>

                    <i class="icon-envelope2"></i> <a href="mailto:<?= Yii::$app->params['contactEmail'];?>"><?= Yii::$app->params['contactEmail'];?></a> 
                    <span class="middot">&middot;</span> 
                    <i class="icon-headphones"></i> <a href="tel:<?= Yii::$app->params['contactPhone'];?>"><?= Yii::$app->params['contactPhone'];?></a>
                    <span class="middot">&middot;</span> 
                    <i class="icon-skype2"></i> <a href="skype::<?= Yii::$app->params['contactSkype'];?>?call">Call us on Skype</a>
                    
                </div>

            </div>

        </div><!-- #copyrights end -->

    </footer><!-- #footer end -->

    

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
