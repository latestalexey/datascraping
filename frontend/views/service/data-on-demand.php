<?php
  $this->title='Данные по запросу';

  $this->params['pageTitle']='Париснг и выгрузка данных файл';
  $this->params['pageSubTitle']='заказ услуги, оплата и сдача работы';
  
  
  $this->params['breadcrumbs'][] = $this->title;
?>


<div class="container text-center">
  <h2>В среднем стоимость разработки парсера составляет <br/>5-10 тыс. руб. и продолжительность 2-5 рабочих дня.</h2>  
</div>

<div class="container clearfix" style="margin-top: 80px;">
    <div class="col_one_third">
      <div class="feature-box fbox-small fbox-plain fadeIn animated" data-animate="fadeIn">
        <div class="fbox-icon">
          <a href="#"><i class="icon-edit"></i></a>
        </div>
        <h3>Заказ</h3>
        <p>Заполните на сайте простую форму заказа и укажите основные параметры парсинга.</p>
      </div>
    </div>

    <div class="col_one_third">
      <div class="feature-box fbox-small fbox-plain fadeIn animated" data-animate="fadeIn" data-delay="200">
        <div class="fbox-icon">
          <a href="#"><i class="icon-dollar"></i></a>
        </div>
        <h3>Предоплата 50%</h3>
        <p>После получения заказа, мы сообщим Вам его стоимость. От Вас потребуется 50% предоплаты.</p>
      </div>
    </div>

    <div class="col_one_third col_last">
      <div class="feature-box fbox-small fbox-plain fadeIn animated" data-animate="fadeIn" data-delay="400">
        <div class="fbox-icon">
          <a href="#"><i class="icon-cogs"></i></a>
        </div>
        <h3>Изготовление парсера</h3>
        <p>В течении 2-5 рабочих дней мы создадим для Вас парсер.</p>
      </div>
    </div>

    <div class="clear"></div>

    <div class="col_one_third">
      <div class="feature-box fbox-small fbox-plain fadeIn animated" data-animate="fadeIn" data-delay="600">
        <div class="fbox-icon">
          <a href="#"><i class="icon-check"></i></a>
        </div>
        <h3>Тестирование</h3>
        <p>Когда парсера будет готов, мы предоставим Вам для проверки тестовую выгрузку, 50% от общего объема.</p>
      </div>
    </div>

    <div class="col_one_third">
      <div class="feature-box fbox-small fbox-plain fadeIn animated" data-animate="fadeIn" data-delay="800">
        <div class="fbox-icon">
          <a href="#"><i class="icon-dollar"></i></a>
        </div>
        <h3>Оплата</h3>
        <p>Если качетво данных Вас устраивает, Вы оплачиваете оставшиеся 50%. Если есть нарекания, сообщаете их нам и мы корректируем работу парсера.</p>
      </div>
    </div>

    <div class="col_one_third col_last">
      <div class="feature-box fbox-small fbox-plain fadeIn animated" data-animate="fadeIn" data-delay="1000">
        <div class="fbox-icon">
          <a href="#"><i class="icon-thumbs-up"></i></a>
        </div>
        <h3>Сдача работы</h3>
        <p>После поступления 100% оплаты мы передаем Вам архив с полным объемом данных.</p>
      </div>
    </div>

    <div class="clear"></div>

    <div class="row ">
      <div class="feature-box fbox-small fbox-plain fadeIn animated" data-animate="fadeIn" data-delay="1200">
        <div class="fbox-icon">
          <a href="#"><i class="icon-refresh"></i></a>
        </div>
        <h3>Повторное использование парсера </h3>
        <p>Если Вам потребуется повторное использование парсера, Вы оплачиваете только объем обработанных данных 0.05 руб. за одну запись.</p>
      </div>
    </div>

    
    <div class="clear"></div>

</div>
<div class="container topmargin ">
  <div class="col_full center">
      <a href="<?= Yii::$app->urlManager->createUrl(['/request/create']); ?>" class="button button-desc button-3d button-rounded button-green center topmargin"><div>Оформить заказ</div><span>в течении часа, мы пришлем Вам оценку стоимости работ</span></a>
    
  </div>
</div>


        
        