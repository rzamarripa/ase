<?php

/**
 * This is the model class for table "Evento".
 *
 * The followings are the available columns in table 'Evento':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $fechaInicio_ft
 * @property string $fechaFin_ft
 * @property integer $estatus_did
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 */
class Evento extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Evento the static model class
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
		return 'Evento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, descripcion, fechaInicio_ft, fechaFin_ft', 'required'),
			array('estatus_did', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>50),
			//array('descripcion', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, fechaInicio_ft, fechaFin_ft, estatus_did', 'safe', 'on'=>'search'),
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
			'descripcion' => 'Descripción',
			'fechaInicio_ft' => 'Fecha Inicio',
			'fechaFin_ft' => 'Fecha Fin',
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
		$criteria->compare('fechaInicio_ft',$this->fechaInicio_ft,true);
		$criteria->compare('fechaFin_ft',$this->fechaFin_ft,true);
		$criteria->compare('estatus_did',$this->estatus_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}