<?php

/**
 * This is the model class for table "Contacto".
 *
 * The followings are the available columns in table 'Contacto':
 * @property integer $id
 * @property string $nombre
 * @property string $apPaterno
 * @property string $apMaterno
 * @property string $correo
 * @property string $mensaje
 * @property integer $estatus_did
 * @property string $fechaCreacion_f
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 */
class Contacto extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Contacto the static model class
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
		return 'Contacto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, apPaterno, correo, mensaje, estatus_did, fechaCreacion_f', 'required'),
			array('estatus_did', 'numerical', 'integerOnly'=>true),
			array('nombre, apPaterno, apMaterno, correo', 'length', 'max'=>50),
			array('correo', 'email','message'=>"El formato del Correo es incorrecto."),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, apPaterno, apMaterno, correo, mensaje, estatus_did, fechaCreacion_f', 'safe', 'on'=>'search'),
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
			'apPaterno' => 'Ap Paterno',
			'apMaterno' => 'Ap Materno',
			'correo' => 'Correo',
			'mensaje' => 'Mensaje',
			'estatus_did' => 'Estatus',
			'fechaCreacion_f' => 'Fecha Creacion F',
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
		$criteria->compare('apPaterno',$this->apPaterno,true);
		$criteria->compare('apMaterno',$this->apMaterno,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('mensaje',$this->mensaje,true);
		$criteria->compare('estatus_did',$this->estatus_did);
		$criteria->compare('fechaCreacion_f',$this->fechaCreacion_f,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}