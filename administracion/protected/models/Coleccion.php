<?php

/**
 * This is the model class for table "Coleccion".
 *
 * The followings are the available columns in table 'Coleccion':
 * @property integer $id
 * @property string $nombre
 * @property integer $tipoClasificacion_did
 * @property integer $estatus_did
 * @property string $fechaCreacion_f
 *
 * The followings are the available model relations:
 * @property ArchivoHistorico[] $archivoHistoricos
 * @property Coleccion $id0
 * @property Coleccion $coleccion
 * @property Estatus $estatus
 * @property TipoClasificacion $tipoClasificacion
 * @property Volumen[] $volumens
 */
class Coleccion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Coleccion the static model class
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
		return 'Coleccion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, tipoClasificacion_did, estatus_did', 'required'),
			array('tipoClasificacion_did, estatus_did', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>80),
			array('fechaCreacion_f', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, tipoClasificacion_did, estatus_did, fechaCreacion_f', 'safe', 'on'=>'search'),
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
			'archivoHistoricos' => array(self::HAS_MANY, 'ArchivoHistorico', 'coleccion_did'),
			'id0' => array(self::BELONGS_TO, 'Coleccion', 'id'),
			'coleccion' => array(self::HAS_ONE, 'Coleccion', 'id'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'tipoClasificacion' => array(self::BELONGS_TO, 'TipoClasificacion', 'tipoClasificacion_did'),
			'volumens' => array(self::HAS_MANY, 'Volumen', 'coleccion_did'),
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
			'tipoClasificacion_did' => 'Tipo Clasificacion',
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
		$criteria->compare('tipoClasificacion_did',$this->tipoClasificacion_did);
		$criteria->compare('estatus_did',$this->estatus_did);
		$criteria->compare('fechaCreacion_f',$this->fechaCreacion_f,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}