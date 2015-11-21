<?php

/**
 * This is the model class for table "Noticia".
 *
 * The followings are the available columns in table 'Noticia':
 * @property integer $id
 * @property integer $usuario_did
 * @property string $titulo
 * @property string $mensaje
 * @property integer $estatus_did
 * @property string $fecha_f
 * @property integer $tipo
 * @property integer $seccion_did
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property Seccion $seccion
 * @property Usuario $usuario
 */
class Noticia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Noticia the static model class
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
		return 'Noticia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('titulo, mensaje, estatus_did', 'required'),
			array('usuario_did, estatus_did, tipo, seccion_did', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>50),
			array('ruta', 'length', 'max'=>500),
			array('fecha_f', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, usuario_did, titulo, mensaje, estatus_did, fecha_f, tipo, seccion_did, ruta', 'safe', 'on'=>'search'),
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
			'seccion' => array(self::BELONGS_TO, 'Seccion', 'seccion_did'),
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
			'usuario_did' => 'Usuario',
			'titulo' => 'Titulo',
			'mensaje' => 'Mensaje',
			'estatus_did' => 'Estatus',
			'fecha_f' => 'Fecha F',
			'tipo' => 'Tipo',
			'seccion_did' => 'Seccion',
			'ruta'=>'Ruta',
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
		$criteria->compare('usuario_did',$this->usuario_did);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('ruta',$this->ruta,true);
		$criteria->compare('mensaje',$this->mensaje,true);
		$criteria->compare('estatus_did',$this->estatus_did);
		$criteria->compare('fecha_f',$this->fecha_f,true);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('seccion_did',$this->seccion_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}