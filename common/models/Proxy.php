<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;


/**
 * This is the model class for table "proxy".
 *
 * @property int $id
 * @property string $slug
 * @property int $type
 * @property int $location_id
 * @property string $ip
 * @property int $port
 * @property string $protocol
 * @property int $uptime
 * @property string $speed
 * @property int $ping
 * @property int $status
 * @property string $description
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Location $location
 */
class Proxy extends \yii\db\ActiveRecord
{

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 2;


    const TYPE_PAID = 1;
    const TYPE_FREE = 2;

    const PRORTOCOL_HTTP_HTTPS = 1;
    const PRORTOCOL_SOCKS5 = 2;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proxy';
    }
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            'AutoSlug'=>[
                'class' => 'common\behaviors\SlugGenerator',
                'src'=>'ip',
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
            [['location_id'], 'required'],
            [['type', 'location_id', 'port', 'uptime', 'ping', 'status', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['type', 'location_id', 'port', 'uptime', 'ping', 'status', 'created_at', 'updated_at','protocol'], 'integer'],
            [['speed'], 'number'],
            [['description'], 'string'],
            [['slug'], 'string', 'max' => 16],
            [['ip'], 'string', 'max' => 32],
            [['location_id'], 'exist', 'skipOnError' => true, 'targetClass' => Location::className(), 'targetAttribute' => ['location_id' => 'id']],
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
            'type' => 'Type',
            'location_id' => 'Location ID',
            'ip' => 'Ip',
            'port' => 'Port',
            'protocol' => 'Protocol',
            'uptime' => 'Uptime',
            'speed' => 'Speed',
            'ping' => 'Ping',
            'status' => 'Status',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
        return $this->hasOne(Location::className(), ['id' => 'location_id']);
    }
}
