<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "siglas".
 *
 * @property int $id
 * @property string|null $cbs
 * @property string|null $adress
 * @property string|null $name
 * @property string|null $eisk
 * @property string|null $temp
 * @property string|null $temp2
 */
class Siglas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'siglas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['cbs', 'adress', 'name', 'eisk', 'temp', 'temp2'], 'string', 'max' => 254],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cbs' => 'Cbs',
            'adress' => 'Adress',
            'name' => 'Name',
            'eisk' => 'Eisk',
            'temp' => 'Temp',
            'temp2' => 'Temp2',
        ];
    }
}
