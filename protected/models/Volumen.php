<?php

/**
 * This is the model class for table "Volumen".
 *
 * The followings are the available columns in table 'Volumen':
 * @property integer $id
 * @property integer $coleccion_did
 * @property integer $tipoClasificacion_did
 * @property string $nombre
 * @property integer $mesInicial
 * @property integer $anoInicial
 * @property integer $mesFinal
 * @property integer $anoFinal
 * @property integer $estatus_did
 *
 * The followings are the available model relations:
 * @property ArchivoHistorico[] $archivoHistoricos
 * @property Coleccion $coleccion
 */
class Volumen extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Volumen the static model class
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
		return 'Volumen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('coleccion_did, tipoClasificacion_did, estatus_did', 'required'),
			array('coleccion_did, tipoClasificacion_did, mesInicial, anoInicial, mesFinal, anoFinal, estatus_did', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, coleccion_did, tipoClasificacion_did, nombre, mesInicial, anoInicial, mesFinal, anoFinal, estatus_did', 'safe', 'on'=>'search'),
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
			'archivoHistoricos' => array(self::HAS_MANY, 'ArchivoHistorico', 'volumen_did'),
			'coleccion' => array(self::BELONGS_TO, 'Coleccion', 'coleccion_did'),
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
			'tipoClasificacion_did' => 'Tipo Clasificacion',
			'nombre' => 'Nombre',
			'mesInicial' => 'Mes Inicial',
			'anoInicial' => 'Ano Inicial',
			'mesFinal' => 'Mes Final',
			'anoFinal' => 'Ano Final',
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
		$criteria->compare('tipoClasificacion_did',$this->tipoClasificacion_did);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('mesInicial',$this->mesInicial);
		$criteria->compare('anoInicial',$this->anoInicial);
		$criteria->compare('mesFinal',$this->mesFinal);
		$criteria->compare('anoFinal',$this->anoFinal);
		$criteria->compare('estatus_did',$this->estatus_did);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function tieneExpediente()
	{
    if($this->tieneExpediente_did == 1){
	    return true;
    }else{
	    return false;
    }
	}
}