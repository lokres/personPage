<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use opensooq\firebase\FirebaseNotifications;
use app\models\Device as Device;
use yii\helpers\BaseArrayHelper as ArrayHelper;
/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     * CP1251
     */
    public function actionSend($title = 'hello', $message = 'hello world', $encode = 'UTF-8')
    {
        
        $data = DEVICE::find()->asArray()->all();
        $tokens = ArrayHelper::getColumn($data, 'device_id');

        $title = iconv ( $encode , 'UTF-8' , $title ) ;
        $message = iconv ( $encode , 'UTF-8' , $message ) ;


        echo $title;
        $service = new FirebaseNotifications(['authKey' => 'AAAARFXXdD4:APA91bGsfoluRz8byzmiXVZKHcimPJtmPc2sQ5eJf95w5ifgqO-AnM5bid9e312p18IN4MypVhQm6HGvzGYmkMNjMhKmAtiNhzAmTNDlUcBpJkcMZwd2taZwXn0blSWcZL5ytn3ifjLX']);
        $message = ['title'=>$title, 'body'=>$message];
        
        print_r($service->sendNotification($tokens, $message));

        return ExitCode::OK;
    }
}
