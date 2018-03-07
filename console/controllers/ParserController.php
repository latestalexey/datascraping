<?php

namespace console\controllers;


use Yii;
use yii\console\Controller;

use JonnyW\PhantomJs\Client;
use Symfony\Component\DomCrawler\Crawler;
//use common\models\Request;

class ParserController extends Controller
{

    public $scriptName;
    public $url;

    public function options($actionID)
    {
        return [
            'scriptName',
            'url'
        ];
    }
    public function optionAliases()
    {
        return [
            's' => 'scriptName',
            'u'=>'url'
    ];

    }

    public function actionRun()
    {

        $client = Client::getInstance();
        $client->getEngine()->setPath(Yii::getAlias('@common/phantomjs/bin/phantomjs'));
        $client->getEngine()->addOption('--config=//'.Yii::getAlias('@common/phantomjs/config.json'));
        $client->getEngine()->addOption('--cookies-file='.Yii::getAlias('@common/phantomjs/cookies/cookies.txt'));
        
        $request  = $client->getMessageFactory()->createRequest();
        $response = $client->getMessageFactory()->createResponse();
        
        $request->setMethod('GET');
        $request->setUrl('http://dom.mingkh.ru/');

        $timeout = 10000; // 10 seconds
        $request->setTimeout($timeout);

        $delay = 5;
        $request->setDelay($delay);

        $request->addHeader('User-Agent', 'Mozilla/5.0 (X11; Linux x86_64; rv:45.0) Gecko/20100101 Firefox/45.0');
        
        $client->send($request, $response);
        
        $html=null;
        if($response->getStatus() === 200) {
            $html= $response->getContent();
        }

        if(isset($html)){
            $crawler = new Crawler($html);
            $items=$crawler->filter('ul.col-md-3.list-unstyled li a')->each(function (Crawler $node, $i) {
                return 'http://dom.mingkh.ru/'.$node->attr('href');
            });

            foreach ($items as $key => $url) {
                $this->stdOut($url.PHP_EOL);
            }
            

        }else{

        }
    }

    

    
    
  
}