<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "circulaton".
 *
 * @property int $circulationID
 * @property string|null $catalogueRecordID
 * @property string|null $barcode
 * @property string|null $startDate
 * @property string|null $finishDate
 * @property string|null $readerID
 * @property string|null $bookpointID
 * @property string|null $state
 * @property string|null $temp
 * @property string|null $temp2
 */
class Circulaton extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'circulaton';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['circulationID'], 'required'],
            [['circulationID'], 'integer'],
            [['catalogueRecordID', 'barcode', 'startDate', 'finishDate', 'readerID', 'bookpointID', 'state', 'temp', 'temp2'], 'string'],
            [['circulationID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'circulationID' => 'Circulation ID',
            'catalogueRecordID' => 'Catalogue Record ID',
            'barcode' => 'Barcode',
            'startDate' => 'Start Date',
            'finishDate' => 'Finish Date',
            'readerID' => 'Reader ID',
            'bookpointID' => 'Bookpoint ID',
            'state' => 'State',
            'temp' => 'Temp',
            'temp2' => 'Temp2',
        ];
    }

    public function getCat()
    {
        return $this->hasOne(Cat::class, ['recId' => 'catalogueRecordID']);
    }


    public function getBookpoint()
    {
        return $this->hasOne(Siglas::classname(), ['id' => 'sigla'])
            ->viaTable('siglaslink', ['bookpoint' => 'bookpointID']);
    }

}
