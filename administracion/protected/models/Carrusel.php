<?php

/**
 * This is the model class for table "Carrusel".
 *
 * The followings are the available columns in table 'Carrusel':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $ruta
 * @property integer $estatus_did
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 */
class Carrusel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Carrusel the static model class
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
		return 'Carrusel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, descripcion, estatus_did', 'required'),
			
			array('estatus_did', 'numerical', 'integerOnly'=>true),
			array('nombre, ruta', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, ruta, estatus_did', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'ruta' => 'Imagen',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('ruta',$this->ruta,true);
		$criteria->compare('estatus_did',$this->estatus_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}