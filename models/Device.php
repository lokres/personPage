<?php

namespace app\models;
use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Device extends ActiveRecord
{
    private $token;
    private $userid;

    public function rules()
    {
        return [
            // username and password are both required
            [['token'], 'required'],
            // rememberMe must be a boolean value

        ];
    }
    public function getToken()
    {
        return $this->token;
    }
    
        public function setToken($token)
    {
        return $this->token = $token;
    }
       
    public function getUserid()
    {
        return $this->$user_id;
    }
    
        public function setUserid($userid)
    {
        return $this->$userid = $userid;
    }
    
    public function insertToken(){
        Yii::$app->db->createCommand()->insert('device', [
            'device_id' => $this->token,
            'user_id' => $this->userid,
        ])->execute();
    }
    
    public function selectAllTokens(){
        print_r(Device::findAll());
    }
}