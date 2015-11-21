<?php

/**
 * This is the model class for table "galeria".
 *
 * The followings are the available columns in table 'galeria':
 * @property integer $id
 * @property string $nombre
 * @property string $descripcion
 * @property integer $estatus_did
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property DetalleGaleria[] $detalleGalerias
 */
class Galeria extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Galeria the static model class
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
		return 'Galeria';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, estatus_did', 'required'),
			array('estatus_did', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>50),
			array('descripcion', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, estatus_did', 'safe', 'on'=>'search'),
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
			'detalleGalerias' => array(self::HAS_MANY, 'DetalleGaleria', 'galeria_did'),
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
		$criteria->compare('estatus_did',$this->estatus_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}