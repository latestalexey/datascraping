<?php
  $this->title='Запрос на создание парсера';

  $this->params['pageTitle']='Требования к парсеру';
  $this->params['pageSubTitle']='укажите основные харахтеристики, которым должен соответствоать парсер';
  
  
  $this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
  <?= $this->render('_form',['model'=>$model]); ?>  
</div>

