<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property string $slug
 * @property int $status
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $company_name
 * @property string $job_title
 * @property int $location_id
 * @property string $project_name
 * @property string $websites
 * @property int $type
 * @property string $extraction_fields
 * @property int $records
 * @property int $frequency
 * @property string $attachment
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Order[] $orders
 */
class Request extends \yii\db\ActiveRecord
{
    const STATUS_NEW=1;
    const STATUS_OFFER_SENDED=2;
    const STATUS_ORDER_CREATED=3;
    const STATUS_CLOSED=4;

    const TYPE_ARTICLE=1;
    const TYPE_PRODUCT=2;
    const TYPE_CONTACT=3;
    const TYPE_OTHER=4;

    const FREQUENCY_ONCE=1;
    const FREQUENCY_DAILY=2;
    const FREQUENCY_WEEKLY=3;
    const FREQUENCY_MONTHLY=4;

    public $region_id;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'AutoSlug'=>[
                'class' => 'common\behaviors\SlugGenerator',
                //'src'=>'ip',
                'dst'=>'slug',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'phone', 'company_name', 'project_name', 'websites', 'type', 'extraction_fields', 'records', 'frequency'], 'required'],
            [['status', 'location_id', 'type', 'records', 'frequency', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['status', 'location_id', 'type', 'records', 'frequency', 'created_at', 'updated_at'], 'integer'],
            [['websites', 'extraction_fields', 'description'], 'string'],
            [['slug'], 'string', 'max' => 16],
            [['first_name', 'last_name', 'email', 'phone', 'project_name'], 'string', 'max' => 32],
            [['company_name', 'job_title'], 'string', 'max' => 64],
            [['attachment'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'status' => 'Status',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'email' => 'E-mail',
            'phone' => 'Телефон',
            'company_name' => 'Название компани',
            'job_title' => 'Должность',
            'location_id' => 'Город',
            'project_name' => 'Название проекта',
            'websites' => 'Ссылки на сайты, которые хотите парсить',
            'type' => 'Тип данных',
            'extraction_fields' => 'Какие поля хотите парсить',
            'records' => 'Ожидаемое количество строк',
            'frequency' => 'Периодичность парсинга',
            'attachment' => 'Файл с дополнительным описанием парсера',
            'description' => 'Дополнительная информация',
            'region_id'=>'Регион',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['request_id' => 'id']);
    }

    public function getCity()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }


    //=========================================================
    //
    // Блок атрибутов
    //
    //=========================================================

    public function getStatusName(){
        return $this->statusList[$this->status];
    }
    
    public static function getStatusList(){
        return [
            self::STATUS_NEW=>'Новый',
            self::STATUS_OFFER_SENDED=>'Отправлено КП',
            self::STATUS_ORDER_CREATED=>'Оформлен заказ',
            self::STATUS_CLOSED=>'Закрыт',
        ];
    }

    public function getTypeName(){
        return $this->typeList[$this->type];
    }
    
    public static function getTypeList(){
        return [
            self::TYPE_ARTICLE=>'Статья',
            self::TYPE_PRODUCT=>'Товар или услуга',
            self::TYPE_CONTACT=>'Контакты',
            self::TYPE_OTHER=>'Другое',
        ];
    }

    public function getFrequencyName(){
        return $this->frequencyList[$this->frequency];
    }
    
    public static function getFrequencyList(){
        return [
            self::FREQUENCY_ONCE=>'Выполнить один раз',
            self::FREQUENCY_DAILY=>'Каждый день',
            self::FREQUENCY_WEEKLY=>'Еженедельно',
            self::FREQUENCY_MONTHLY=>'Ежемесячно',
        ];
    }

    public function getCityName(){
        return $this->typeList[$this->type];
    }
    
    public static function getRegionList(){
        return ArrayHelper::map(Location::find()->where('path LIKE \'/rossiya/%\' AND type='.Location::TYPE_REGION)->all(),'id','name');
    }
    public static function getCityList($region=219){
        $region_query='';
        if(isset($region)){
            $region_query=' AND parent_id='.$region;
        }else{
            $region_query=' AND path LIKE \'/rossiya/%\'';
        }
        return ArrayHelper::map(Location::find()->where('type='.Location::TYPE_CITY.$region_query)->orderBy(['name'=>SORT_ASC])->all(),'id','name');
    }

    public function getViewUrl(){
        return Yii::$app->urlManager->createUrl(['/request/view','id'=>$this->slug]);
    }

}
