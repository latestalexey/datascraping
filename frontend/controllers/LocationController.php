<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;

use yii\filters\VerbFilter;
use yii\filters\AccessControl;

use common\models\Location;

/**
 * Site controller
 */
class LocationController extends Controller
{
    public function actionCityLists($id)
    {
        $data = Location::find()->where(['parent_id'=>$id,'type'=>Location::TYPE_CITY])->orderBy('name ASC')->all();
        
        if (!empty($data)) {
            foreach($data as $value) {
                echo "<option value='".$value->id."'>".$value->name."</option>";
            }
        }else {
            //echo "<option value= >- нет данных -</option>";
        }
    }


}
