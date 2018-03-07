<?php
namespace frontend\widgets;

use Yii;
use yii\helpers\Html;

/**
 * Alert widget renders a message from session flash. All flash messages are displayed
 * in the sequence they were assigned using setFlash. You can set message as following:
 *
 * ```php
 * Yii::$app->session->setFlash('error', 'This is the message');
 * Yii::$app->session->setFlash('success', 'This is the message');
 * Yii::$app->session->setFlash('info', 'This is the message');
 * ```
 *
 * Multiple messages could be set as follows:
 *
 * ```php
 * Yii::$app->session->setFlash('error', ['Error 1', 'Error 2']);
 * ```
 *
 * @author Kartik Visweswaran <kartikv2@gmail.com>
 * @author Alexander Makarov <sam@rmcreative.ru>
 */
class ModalNotification extends \yii\bootstrap\Widget
{
    
    const TYPE_INFO='info';
    const TYPE_ERROR='error';
    const TYPE_SUCCESS='success';
    const TYPE_WARNING='warning';

    const POSITION_TOP_RIGHT='top-right';
    const POSITION_TOP_LEFT='top-left';
    const POSITION_BOTTOM_RIGHT='bottom-right';
    const POSITION_BOTTOM_LEFT='bottom-left';
    const POSITION_TOP_FULL_WIDTH='top-full-width';
    const POSITION_BOTTOM_FULL_WIDTH='bottom-full-widt';

    public function getTypeList()
    {
        return [
            self::TYPE_INFO=>'info',
            self::TYPE_ERROR=>'error',
            self::TYPE_SUCCESS=>'success',
            self::TYPE_WARNING=>'warning',
        ];
    }

    public $position;

    public function run()
    {
        $session = Yii::$app->session;
        $flashes = $session->getAllFlashes();

        foreach ($flashes as $type => $flash) {
            if (!isset($this->typeList[$type])) {
                continue;
            }

            foreach ((array) $flash as $i => $message) {
                echo Html::tag('div', Html::encode($message), ['class'=>'data-notify','data-notify-type' => $type,'data-notify-msg'=>$message,'data-notify-position'=>$this->position]);
            }

            $session->removeFlash($type);
        }
    }
}
