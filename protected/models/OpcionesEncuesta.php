<?php

/**
 * This is the model class for table "OpcionesEncuesta".
 *
 * The followings are the available columns in table 'OpcionesEncuesta':
 * @property integer $id
 * @property string $nombre
 * @property integer $encuesta_did
 * @property integer $votos
 * @property integer $estatus_did
 *
 * The followings are the available model relations:
 * @property Encuesta $encuesta
 * @property Estatus $estatus
 */
class OpcionesEncuesta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OpcionesEncuesta the static model class
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
		return 'OpcionesEncuesta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, encuesta_did, votos, estatus_did', 'required'),
			array('encuesta_did, votos, estatus_did', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, encuesta_did, votos, estatus_did', 'safe', 'on'=>'search'),
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
			'encuesta' => array(self::BELONGS_TO, 'Encuesta', 'encuesta_did'),
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
			'encuesta_did' => 'Encuesta',
			'votos' => 'Votos',
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
		$criteria->compare('encuesta_did',$this->encuesta_did);
		$criteria->compare('votos',$this->votos);
		$criteria->compare('estatus_did',$this->estatus_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}