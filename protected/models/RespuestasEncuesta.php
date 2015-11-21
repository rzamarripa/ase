<?php

/**
 * This is the model class for table "RespuestasEncuesta".
 *
 * The followings are the available columns in table 'RespuestasEncuesta':
 * @property integer $id
 * @property integer $encuesta_did
 * @property integer $respuesta_did
 * @property string $ip
 * @property string $fechaCreacion_f
 * @property integer $estatus_did
 * @property integer $usuario_did
 *
 * The followings are the available model relations:
 * @property Encuesta $encuesta
 * @property Estatus $estatus
 * @property OpcionesEncuesta $respuesta
 * @property Usuario $usuario
 */
class RespuestasEncuesta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return RespuestasEncuesta the static model class
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
		return 'RespuestasEncuesta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('encuesta_did, respuesta_did, ip, fechaCreacion_f, estatus_did, usuario_did', 'required'),
			array('encuesta_did, respuesta_did, estatus_did, usuario_did', 'numerical', 'integerOnly'=>true),
			array('ip', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, encuesta_did, respuesta_did, ip, fechaCreacion_f, estatus_did, usuario_did', 'safe', 'on'=>'search'),
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
			'respuesta' => array(self::BELONGS_TO, 'OpcionesEncuesta', 'respuesta_did'),
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuario_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'encuesta_did' => 'Encuesta',
			'respuesta_did' => 'Respuesta',
			'ip' => 'Ip',
			'fechaCreacion_f' => 'Fecha Creacion F',
			'estatus_did' => 'Estatus',
			'usuario_did' => 'Usuario',
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
		$criteria->compare('encuesta_did',$this->encuesta_did);
		$criteria->compare('respuesta_did',$this->respuesta_did);
		$criteria->compare('ip',$this->ip,true);
		$criteria->compare('fechaCreacion_f',$this->fechaCreacion_f,true);
		$criteria->compare('estatus_did',$this->estatus_did);
		$criteria->compare('usuario_did',$this->usuario_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}