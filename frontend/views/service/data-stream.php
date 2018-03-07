<?php
  $this->title='Поток данных';

  $this->params['pageTitle']='Организация потока данных';
  $this->params['pageSubTitle']='парсинг по расписанию';
  
  
  $this->params['breadcrumbs'][] = $this->title;
?>


<div class="container text-center">
  <h2>Для организации потока требуются парсер и среда в которой он будет работать. Цена решения складывается из разработки парсера и стоимости аренды парсинг юнита.</h2>  
</div>

<div class="container clearfix">

  <div class="col_three_fifth topmargin-sm bottommargin">
    <img src="/images/IoT-Cloud.png">
  </div>

  <div class="col_two_fifth topmargin-sm bottommargin-lg col_last">

    <div class="heading-block topmargin">
      <h2>Разработка парсера</h2>
      <span>В среднем продолжительность разработки парсера составляет 2-5 рабочих дней.</span>
    </div>
    <h2>Цена: 5 - 10 тыс. руб.</h2>
  </div>

  <div class="line"></div>

</div>

<div class="container clearfix">

  

  <div class="col_two_fifth topmargin-sm bottommargin-lg col_last">

    <div class="heading-block topmargin">
      <h2>Аренда парсинг юнита</h2>
      <span>В зависимости объема обрабатываемых данных и частоты обрабработки тебуется 1 - 10 парсинг юнитов. Но чаще всего достаточно одного. Один парсер юнит способен обработать в сутки примерно 1 миллион страниц.</span>
    </div>

    <h2>Цена: 1 000 руб./мес.</h2>

    

  </div>
  <div class="col_three_fifth topmargin-sm bottommargin">
    <img src="/images/cloud-server-icon-png.png">
  </div>

  <div class="line"></div>

</div>

<div class="container topmargin ">
  <div class="col_full center">
      <a href="<?= Yii::$app->urlManager->createUrl(['/request/create']); ?>" class="button button-desc button-3d button-rounded button-green center topmargin"><div>Оформить заказ</div><span>в течении часа, мы пришлем Вам оценку стоимости работ</span></a>
    
  </div>
</div>

        
        