<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use common\models\Request;

/**
 * Site controller
 */
class RequestController extends Controller
{
    
    
    
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $model= new Request();
        $model->status=Request::STATUS_NEW;

        if ($model->load(Yii::$app->request->post()) && $model->save()){

            Yii::$app->mailqueue->compose(['html' => 'request/create'], ['model' => $model])
                ->setTo(Yii::$app->params['adminEmail'])
                ->setFrom([Yii::$app->params['adminEmail']=>Yii::$app->name])
                ->setSubject('Новый заказ на парсинг')
                ->setTextBody('')
                ->send();

            return $this->redirect($model->viewUrl);
        }

        return $this->render('create',[
          'model'=>$model
        ]);
    }

    public function actionView($id)
    {
        $model=$this->findModel($id);
        return $this->render('view',['model'=>$model]);
    }


    protected function findModel($id)
    {
        $model = Request::findOne(['slug'=>$id]);
        if($model){
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }



}
