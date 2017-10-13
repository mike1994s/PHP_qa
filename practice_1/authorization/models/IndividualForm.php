<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class IndividualForm extends Model
{
    public $fio;
    public $email;
    public $inn = "";


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['fio', 'email'], 'required'],
            [['inn'],  'match', 'pattern' => '/^[0-9]{12}$/',  'skipOnEmpty' => true],
            // email has to be a valid email address
            ['email', 'email']
            // verifyCode needs to be entered correctly
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'inn' => 'Если Вы ИП заполните ИНН, если не ИП оставьте пустым', // тут бы лучше использовать Yii::t
        ];
    }

}
