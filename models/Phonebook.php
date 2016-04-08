<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "phonebook".
 *
 * @property integer $id
 * @property string $unitName
 * @property string $facultyName
 * @property string $post
 * @property string $PIB
 * @property string $telephoneOut
 * @property string $telephoneIn
 * @property string $email
 * @property string $corps
 * @property string $cabinet
 */
class Phonebook extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'phonebook';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unitName', 'telephoneOut', 'corps', 'cabinet'], 'required'],
            [['email'],'email'],
            [['facultyName', 'email', 'PIB', 'post', 'telephoneForward'], 'safe'],
            [['unitName', 'facultyName', 'post', 'PIB', 'email'], 'string', 'max' => 255],
            [['telephoneOut', 'telephoneIn', 'corps', 'cabinet'], 'string', 'max' => 20]
            //[['telephoneOut', 'telephoneIn'], 'udokmeci\yii2PhoneValidator\PhoneValidator','country'=>'UA']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'unitName' => 'Назва підрозділу',
            'facultyName' => 'Назва факультету',
            'post' => 'Посада',
            'PIB' => 'ПІП контактної особи',
            'telephoneOut' => 'Міський',
            'telephoneIn' => 'Внутрішній',
            'telephoneForward' => 'Прямий', 
            'email' => 'Електронна пошта',
            'corps' => '№ корп.',
            'cabinet' => '№ каб.',
        ];
    }
}
