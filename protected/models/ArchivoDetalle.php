<?php

/**
 * This is the model class for table "ArchivoDetalle".
 *
 * The followings are the available columns in table 'ArchivoDetalle':
 * @property integer $archivoId
 * @property integer $consecutivo
 * @property string $archivopdf
 *
 * The followings are the available model relations:
 * @property Archivo $archivo
 */
class ArchivoDetalle extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ArchivoDetalle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ArchivoDetalle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('archivoId, consecutivo, archivopdf', 'required'),
			array('archivoId, consecutivo', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('archivoId, consecutivo, archivopdf', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'archivo' => array(self::BELONGS_TO, 'Archivo', 'archivoId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'archivoId' => 'Archivo',
			'consecutivo' => 'Consecutivo',
			'archivopdf' => 'Archivopdf',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('archivoId',$this->archivoId);
		$criteria->compare('consecutivo',$this->consecutivo);
		$criteria->compare('archivopdf',$this->archivopdf,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}