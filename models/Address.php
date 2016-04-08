<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property integer $id
 * @property string $text
 * @property string $unitName
 * @property string $facultyName
 * @property string $post
 * @property string $PIB
 * @property string $telephoneOut
 * @property string $telephoneIn
 * @property string $telephoneForward
 * @property string $email
 * @property string $corps
 * @property string $cabinet
 */
class Address extends \yii\db\ActiveRecord
{
    public $searchId;
    public $itemId;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['unitName', 'telephoneOut', 'corps', 'cabinet','type'], 'required'],
            [['email'],'email'],            
            [['is_active', 'telephoneIn', 'email', 'PIB', 'telephoneForward', 'update_id', 'facultyName', 'change_time', 'post', 'searchId', 'itemId'], 'safe'],
            [['unitName', 'facultyName', 'post', 'PIB', 'email'], 'string', 'max' => 255],
            [['telephoneOut', 'telephoneIn', 'corps', 'cabinet'], 'string', 'max' => 20],
            [['telephoneForward'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Тип заяви',
            'update_id' => 'Номер редагуємого контакту',
            'unitName' => 'Назва підрозділу',
            'facultyName' => 'Факультет',
            'post' => 'Посада',
            'PIB' => 'ПІП контактної особи',
            'telephoneOut' => 'Міський',
            'telephoneIn' => 'Внутрішній',
            'telephoneForward' => 'Прямий',
            'email' => 'Електронна пошта',
            'corps' => 'Корпус',
            'cabinet' => 'Кабінет',
            'is_active' => 'Статус заявки',
            'change_time' => 'Дата подання'
        ];
    }
}
