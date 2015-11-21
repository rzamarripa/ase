<?php

/**
 * This is the model class for table "DetalleGaleria".
 *
 * The followings are the available columns in table 'DetalleGaleria':
 * @property integer $id
 * @property integer $galeria_did
 * @property string $ruta
 * @property integer $estatus_did
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property Galeria $galeria
 */
class DetalleGaleria extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DetalleGaleria the static model class
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
		return 'DetalleGaleria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('galeria_did, ruta, estatus_did', 'required'),
			array('galeria_did, estatus_did', 'numerical', 'integerOnly'=>true),
			array('ruta', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, galeria_did, ruta, estatus_did', 'safe', 'on'=>'search'),
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
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'galeria' => array(self::BELONGS_TO, 'Galeria', 'galeria_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'galeria_did' => 'Galeria',
			'ruta' => 'Ruta',
			'estatus_did' => 'Estatus',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('galeria_did',$this->galeria_did);
		$criteria->compare('ruta',$this->ruta,true);
		$criteria->compare('estatus_did',$this->estatus_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}