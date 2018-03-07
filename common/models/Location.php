<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "location".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $slug
 * @property string $name
 * @property integer $type
 * @property double $lat
 * @property double $lng
 * @property double $accuracy
 * @property integer $status
 * @property integer $created_by
 * @property integer $updated_by
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Banner[] $banners
 * @property Location $parent
 * @property Location[] $locations
 * @property User $createdBy
 * @property User $updatedBy
 * @property Orgunit[] $orgunits
 * @property Orgunit[] $orgunits0
 * @property Orgunit[] $orgunits1
 * @property OuCourse[] $ouCourses
 * @property OuCourse[] $ouCourses0
 * @property OuCourse[] $ouCourses1
 * @property OuEvent[] $ouEvents
 * @property OuEvent[] $ouEvents0
 * @property OuEvent[] $ouEvents1
 */
class Location extends \yii\db\ActiveRecord
{
    const TYPE_COUNTRY=0;
    const TYPE_REGION=1;
    const TYPE_CITY=2;
    const TYPE_CITY_AREA=3;
    const TYPE_METRO=4;
    const TYPE_METRO_LINE=5;
    const TYPE_METRO_STATION=6;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'AutoSlug'=>[
                'class' => 'common\behaviors\SlugGenerator',
                'src'=>'name',
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
            [['parent_id', 'type', 'status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'required'],
            [['lat', 'lng', 'accuracy'], 'number'],
            [['slug', 'name'], 'string', 'max' => 128],
            [['slug'], 'unique'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['parent_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'slug' => 'slug',
            'name' => 'Name',
            'type' => 'Type',
            'lat' => 'Lat',
            'lng' => 'Lng',
            'accuracy' => 'Accuracy',
            'status' => 'Status',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    //=========================================================
    //
    // Блок relations
    //
    //=========================================================
    public function getParent()
    {
        return $this->hasOne(self::className(), ['id' => 'parent_id']);
    }

    public function getProxies()
    {
        return $this->hasMany(Proxy::className(), ['location_id' => 'id']);
    }

    public function getProxy()
    {
        $proxies=$this->proxies;
        if(count($proxies)){
            return $proxies[0];
        }
        return null;
    }

    //=========================================================
    //
    // Блок событий ActiveRecord
    //
    //=========================================================
    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        $this->path=(isset($this->parent_id)?$this->parent->path:'/').$this->slug.'/';

        return true;
    }


    //Переменная, для хранения текущего города
    static $currentCity = null;
    //Получение текущего объекта языка
    static function getCurrentCity()
    {
        if( self::$currentCity === null ){
            self::$currentCity = self::getDefaultCity();
        }
        return self::$currentCity;
    }

    //Установка текущего объекта грода
    static function setCurrentCity($slug = null)
    {
        $city = self::getCityByslugl($slug);
        self::$currentCity = ($city === null) ? self::getDefaultCity() : $city;
        //Yii::$app->city = self::$currentCity;
    }

    //Получения объекта города по умолчанию
    static function getDefaultCity()
    {
        return Location::find()->where('"default" = :default', [':default' => 1])->one();
    }

    //Получения объекта города по буквенному идентификатору
    static function getCityBySlugl($slug = null)
    {
        if ($slug === null) {
            return null;
        } else {
            $city = Location::find()->where('slug = :slug', [':slug' => $slug])->one();
            if ( $city === null ) {
                return null;
            }else{
                return $city;
            }
        }
    }

    /*
    static function getCountryList(){
        return Location::find()->where('type= :type', [':type' => self::TYPE_COUNTRY])->all();
    }

    static function getRegionList(){
        return Location::find()->where('type= :type', [':type' => self::TYPE_REGION])->all();
    }

    static function getCitiyList(){
        return Location::find()->where('type= :type', [':type' => self::TYPE_CITY])->all();
    }

    static function getMetroList(){
        return Location::find()->where('type= :type', [':type' => self::TYPE_METRO_STATION])->all();
    }

    
    public function getOuListUrl()
    {
        return Yii::$app->urlManager->createUrl('/orgunit/index');
    }
    */

}
