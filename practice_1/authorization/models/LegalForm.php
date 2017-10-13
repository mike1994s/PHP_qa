<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class LegalForm extends Model {

    public $fio;
    public $email;
    public $organizationName;
    public $inn;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['fio', 'email', 'organizationName', 'inn'], 'required'],
            [['inn'],  'match', 'pattern' => '/^[0-9]{12}$/'],
            ['email', 'email']
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels() {
        return [
            'inn' => 'Заполните ИНН', // тут бы лучше использовать Yii::t
            'organizationName' => 'Название Организации', // тут бы лучше использовать Yii::t
        ];
    }
   
}
