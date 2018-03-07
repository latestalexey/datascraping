<?php
  
  use yii\widgets\Breadcrumbs;
  
  if(!array_key_exists('title',$this->params)){
    $this->params['title']=null;
  }
  if(!array_key_exists('breadcrumbs',$this->params)){
    $this->params['breadcrumbs']=null;
  }

  if(!array_key_exists('pageTitle',$this->params)){
    $this->params['pageTitle']=null;
  }

  if(!array_key_exists('pageSubTitle',$this->params)){
    $this->params['pageSubTitle']=null;
  }
  
?>

<?php $this->beginContent('@app/views/layouts/layout.php'); ?>

<?php if(isset($this->params['breadcrumbs']) || isset($this->params['pageTitle']) || isset($this->params['pageSubTitle'])): ?>
<!-- Page Title
============================================= -->
<section id="page-title">
    <div class="container clearfix">
        <h1><?=$this->params['pageTitle']; ?></h1>
        <span><?=$this->params['pageSubTitle']; ?></span>

        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            'tag'=>'ol',
            'activeItemTemplate'=>'<li class="breadcrumb-item active">{link}</li>',
            'itemTemplate'=>'<li class="breadcrumb-item">{link}</li>',

        ]) ?>
        
    </div>

</section><!-- #page-title end -->
<?php endif; ?>

<!-- Content
============================================= -->
<section id="content">

    <div class="content-wrap">

        <?= $content; ?>

    </div>

</section><!-- #content end -->
<?php $this->endContent(); ?>