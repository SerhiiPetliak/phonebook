<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "check".
 *
 * @property integer $itemId
 * @property string $comment
 */
class Check extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'check';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['itemId', 'comment'], 'required'],
            [['itemId'], 'integer'],
            [['comment'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'itemId' => 'Item ID',
            'comment' => 'Коментар',
        ];
    }
}
