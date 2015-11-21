<?php

/**
 * This is the model class for table "Expediente".
 *
 * The followings are the available columns in table 'Expediente':
 * @property integer $id
 * @property integer $coleccion_did
 * @property integer $volumenAño_did
 * @property string $nombre
 * @property integer $estatus_did
 *
 * The followings are the available model relations:
 * @property Coleccion $coleccion
 * @property Volumen $volumenAño
 */
class Expediente extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Expediente the static model class
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
		return 'Expediente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('coleccion_did, volumenAño_did, nombre, estatus_did', 'required'),
			array('coleccion_did, volumenAño_did, estatus_did', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, coleccion_did, volumenAño_did, nombre, estatus_did', 'safe', 'on'=>'search'),
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
			'coleccion' => array(self::BELONGS_TO, 'Coleccion', 'coleccion_did'),
			'volumen' => array(self::BELONGS_TO, 'Volumen', 'volumenAño_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'coleccion_did' => 'Coleccion',
			'volumenAño_did' => 'Volumen Año',
			'nombre' => 'Nombre',
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
		$criteria->compare('coleccion_did',$this->coleccion_did);
		$criteria->compare('volumenAño_did',$this->volumenAño_did);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('estatus_did',$this->estatus_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}