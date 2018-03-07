<?php
  $this->title='Запрос успешно создан';

  $this->params['pageTitle']='Благодарим за обращение!';
  $this->params['pageSubTitle']='Мы получили Ваш запрс и уже приступили к анализу и расчету стоимости.';
  
  
  $this->params['breadcrumbs'][] = $this->title;
?>

<div class="container">
  <div>
    <h1>Заказ № <?= $model->slug;?></h1>
  </div>

  <h4 class="nobottommargin"><?= $model->first_name.' '.$model->last_name;?> (<?= $model->company_name; ?>)</h4>
  <div class="">E-mail: <?= $model->email.', тел.:'.$model->phone;?></div>

  <h3 class="topmargin nobottommargin"><?= $model->project_name; ?></h3>
  <div class="topmargin-sm"><label>Источник данных:</label> <?= $model->websites; ?></div>
  <div><label>Тип данных:</label> <?= $model->typeName; ?></div>
  <div><label>Ожидаемое кол-во строк:</label> <?= number_format($model->records,0,0,' '); ?> строк</div>
  <div><label>Значения, которые нужно парсить:</label> <?= $model->extraction_fields; ?></div>
  <div><label>Переодичность парсинга:</label> <?= $model->frequencyName; ?></div>
  <div><label>Дополнительгая информация:</label> <?= $model->description; ?></div>

  

  <div class="alert alert-success topmargin">
    <strong>Что дальше?</strong>
    <p class="topmargin-sm">
      Наши специалисты уже приступили к анализу источника данных и расчету стоимости изготовленя парсера.
      В течении часа мы направим Вам на E-mail: <?= $model->email; ?> наше коммерческое предложение.
      Если оно Вас устроит, обсудим способ оплаты и присиупим к разработке парсера.
    </p>
    <p class="topmargin-sm">
      В течении 2-5 рабочих дней Вы получите на E-mail архив с данными.
    </p>
  </div>

</div>


