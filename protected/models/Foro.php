<?php

/**
 * This is the model class for table "Foro".
 *
 * The followings are the available columns in table 'Foro':
 * @property integer $id
 * @property string $autor
 * @property string $titulo
 * @property string $mensaje
 * @property string $fecha_f
 * @property integer $respuestas
 * @property integer $identificador
 * @property string $ult_respuesta
 * @property integer $estatus_did
 * @property integer $usuario_did
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property Usuario $usuario
 */
class Foro extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Foro the static model class
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
		return 'Foro';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('autor, titulo, mensaje, fecha_f, respuestas, identificador', 'required'),
			array('respuestas, identificador, estatus_did, usuario_did', 'numerical', 'integerOnly'=>true),
			array('autor', 'length', 'max'=>50),
			array('titulo', 'length', 'max'=>100),
			array('ult_respuesta', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, autor, titulo, mensaje, fecha_f, respuestas, identificador, ult_respuesta, estatus_did, usuario_did', 'safe', 'on'=>'search'),
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
			'autor' => 'Autor',
			'titulo' => 'Titulo',
			'mensaje' => 'Mensaje',
			'fecha_f' => 'Fecha F',
			'respuestas' => 'Respuestas',
			'identificador' => 'Identificador',
			'ult_respuesta' => 'Ult Respuesta',
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
		$criteria->compare('autor',$this->autor,true);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('mensaje',$this->mensaje,true);
		$criteria->compare('fecha_f',$this->fecha_f,true);
		$criteria->compare('respuestas',$this->respuestas);
		$criteria->compare('identificador',$this->identificador);
		$criteria->compare('ult_respuesta',$this->ult_respuesta,true);
		$criteria->compare('estatus_did',$this->estatus_did);
		$criteria->compare('usuario_did',$this->usuario_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}