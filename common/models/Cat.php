<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat".
 *
 * @property int $recId
 * @property string|null $aut
 * @property string|null $title
 * @property string|null $place
 * @property string|null $publ
 * @property string|null $yea
 * @property string|null $lan
 * @property string|null $rubrics
 * @property string|null $person
 * @property string|null $serial
 * @property string|null $material
 * @property string|null $biblevel
 * @property string|null $ager
 */
class Cat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['recId'], 'required'],
            [['recId'], 'integer'],
            [['aut', 'title', 'place', 'publ', 'yea', 'lan', 'rubrics', 'person', 'serial', 'material', 'biblevel', 'ager'], 'string'],
            [['recId'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'recId' => 'Rec ID',
            'aut' => 'Aut',
            'title' => 'Title',
            'place' => 'Place',
            'publ' => 'Publ',
            'yea' => 'Yea',
            'lan' => 'Lan',
            'rubrics' => 'Rubrics',
            'person' => 'Person',
            'serial' => 'Serial',
            'material' => 'Material',
            'biblevel' => 'Biblevel',
            'ager' => 'Ager',
        ];
    }
}
