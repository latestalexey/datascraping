<?php

/* @var $this yii\web\View */

$this->title = Yii::$app->name.' - парсинг и обработка данных';
?>

<div class="container clearfix">

    <div id="section-home" class="heading-block title-center nobottomborder page-section">
        <h1>парсинг сайтов</h1>
        <span>Качественные данные для Вашего бизнеса.</span>
    </div>

    <div class="center bottommargin">
        <a href="<?= Yii::$app->urlManager->createUrl(['/service/view','id'=>'data-on-demand']); ?>" class="button button-3d button-teal button-xlarge nobottommargin">Данные по запросу</a> - ИЛИ - <a href="<?= Yii::$app->urlManager->createUrl(['/service/view','id'=>'data-stream']); ?>" data-scrollto="#section-pricing" class="button button-3d button-red button-xlarge nobottommargin">Потоки данных</a>
    </div>

</div>

<div class="section ">
    <div class="container clearfix">

        <div class="col_three_fifth nobottommargin">

            <div class="heading-block">
                <h3>Данные по запросу</h3>
                <span>это решение идеально подходит, когда Вам нужно оперативно спарсить сайт-донор и получать данные в виде файла в формате csv, json или xml</span>
            </div>

            <p>
                Если у вас нет времени или опыта для сканирования сайта, наши специалисты по парсингу могут Вам в этом помочь. Довертье эту задачу нам и в течении 2-5 рабочих дней Вы получите результат. Мы обладаем большим опытом в этой области и у нас уже все готово для решения подобных задач.
            </p>

            <p>
                Некоторые сайты настолько популярны и интересны для сканирования, что мы сами переодически их сканнируем. Напишите нам и возможно у нас уже есть готовый парсер под Вашу задачу. Даже если у нас нет нужного парсера, мы оперативно его для Вас создадим. Как только парсер будет готов, Вы мгновенный получите доступ к необходимым вам данным.
            </p>

            <p>
                Некоторые сайты очень сложны для парсинга. Защита от ботов, неаккуратный код, A/B тесты и другие проблемы могут мешать Вам при сборе необходимых данных. Наши специалисты знают, как обходить подобные проблемы. Экономьте время и деньги, позвольте нам справиться с этими сложностями и облегчить Вам жизнь.
            </p>

            <div class="postcontent nobottommargin clearfix">
                <a href="<?= Yii::$app->urlManager->createUrl(['/service/view','id'=>'data-on-demand']); ?>">Подробнее о услуге →</a>
                <a href="<?= Yii::$app->urlManager->createUrl(['/request/create']); ?>" class="button button-desc button-3d button-rounded button-green center topmargin"><div>Расскажите о своем проекте</div><span>и в течении часа, мы пришлем Вам оценку стоимости работ</span></a>
            
            </div>
            
            
        </div>

        <div class="col_two_fifth col_last" style="min-height: 350px;">
            <img  src="/images/web_scraping.png">
        </div>

    </div>
    

</div>

<div class="container  ">
    <div class="col_two_fifth topmargin" style="min-height: 350px">
        <img  src="/images/web_scraping.jpg">
    </div>

    <div class="col_three_fifth col_last topmargin">

        <div class="heading-block">
            <h3>Потоки данных</h3>
            <span>это решение на случай, когда Вам нужно организовать постоянный поток данных с сайтов-доноров в Вашу аналитическую систему или автоматизировать обновление контента Вашего сайта.</span>
        </div>

        <p>
            Наша облачная инфраструктура парсеров, позволяет Нам легко разворачивать целые сети парсеров и масштабировать их по требованию. Вам не нужно беспокоиться о настройке серверов, мониторинге, резервном копировании или заданиях cron. Мы все это сделаем за Вас. Наши сервера ежемесячно обрабатывают десятки миллионов веб-страниц, превращая их в ценные данные.
        </p>

        <p>
            В настройках Вы можете самостоятельно определить требуемое количество серверов, частоту сканнирований и регион откуда следует производить сканнирование. 
        </p>

        <p>
            Данные парсинга безопасно сохраняются в базе данных высокой доступности. Вы можете просматривать их, скачивать или настроить автоматическую передачу на API Вашей системы.
        </p>
        
        <div class="postcontent nobottommargin clearfix">
            <a href="<?= Yii::$app->urlManager->createUrl(['/service/view','id'=>'data-stream']); ?>">Подробнее о услуге →</a>
            <a href="<?= Yii::$app->urlManager->createUrl(['/request/create']); ?>" class="button button-desc button-3d button-rounded button-green center topmargin"><div>Расскажите о своем проекте</div><span>и в течении часа, мы пришлем Вам оценку стоимости работ</span></a>
        
        </div>
    </div>
</div>