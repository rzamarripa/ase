<?php

/**
 * This is the model class for table "Encuesta".
 *
 * The followings are the available columns in table 'Encuesta':
 * @property integer $id
 * @property string $nombre
 * @property string $fecha_f
 * @property integer $estatus_did
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property OpcionesEncuesta[] $opcionesEncuestas
 */
class Encuesta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Encuesta the static model class
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
		return 'Encuesta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, fecha_f, estatus_did', 'required'),
			array('estatus_did', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, fecha_f, estatus_did', 'safe', 'on'=>'search'),
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
			'opcionesEncuestas' => array(self::HAS_MANY, 'OpcionesEncuesta', 'encuesta_did'),
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
			'fecha_f' => 'Fecha F',
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
		$criteria->compare('fecha_f',$this->fecha_f,true);
		$criteria->compare('estatus_did',$this->estatus_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}