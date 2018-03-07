<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;


/**
 * Site controller
 */
class ServiceController extends Controller
{
    
    
    
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($id='data-on-demand')
    {
        return $this->render($id);
    }


}
