<?php

/**
 * This is the model class for table "ArchivoHistorico".
 *
 * The followings are the available columns in table 'ArchivoHistorico':
 * @property integer $id
 * @property integer $coleccion_did
 * @property integer $volumen_did
 * @property string $expediente
 * @property string $Folio
 * @property string $UbicaciónFisica
 * @property string $NumeroPatrimonio
 * @property integer $estatus_did
 * @property string $fechaRecepcion_f
 * @property string $fechaDigitalizacion_f
 * @property string $fechaVerficacion_f
 * @property integer $recepciono
 * @property integer $digitalizo
 * @property integer $verifico
 *
 * The followings are the available model relations:
 * @property ArchivoHistorico $id0
 * @property ArchivoHistorico $archivoHistorico
 * @property Coleccion $coleccion
 * @property Estatus $estatus
 * @property Volumen $volumen
 * @property ArchivoHistoricoDetalle[] $archivoHistoricoDetalles
 */
class ArchivoHistorico extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ArchivoHistorico the static model class
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
		return 'ArchivoHistorico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('coleccion_did, volumen_did, estatus_did', 'required'),
			array('coleccion_did, volumen_did, estatus_did, recepciono, digitalizo, verifico', 'numerical', 'integerOnly'=>true),
			array('expediente, NumeroPatrimonio', 'length', 'max'=>50),
			array('Folio', 'length', 'max'=>30),
			array('UbicaciónFisica, fechaRecepcion_f, fechaDigitalizacion_f, fechaVerficacion_f', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, coleccion_did, volumen_did, expediente, Folio, UbicaciónFisica, NumeroPatrimonio, estatus_did, fechaRecepcion_f, fechaDigitalizacion_f, fechaVerficacion_f, recepciono, digitalizo, verifico', 'safe', 'on'=>'search'),
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
			'id0' => array(self::BELONGS_TO, 'ArchivoHistorico', 'id'),
			'archivoHistorico' => array(self::HAS_ONE, 'ArchivoHistorico', 'id'),
			'coleccion' => array(self::BELONGS_TO, 'Coleccion', 'coleccion_did'),
			'estatus' => array(self::BELONGS_TO, 'Estatus', 'estatus_did'),
			'volumen' => array(self::BELONGS_TO, 'Volumen', 'volumen_did'),
			'archivoHistoricoDetalles' => array(self::HAS_MANY, 'ArchivoHistoricoDetalle', 'Id_Archivo'),
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
			'volumen_did' => 'Volumen',
			'expediente' => 'Expediente',
			'Folio' => 'Folio',
			'UbicaciónFisica' => 'Ubicación Fisica',
			'NumeroPatrimonio' => 'Numero Patrimonio',
			'estatus_did' => 'Estatus',
			'fechaRecepcion_f' => 'Fecha Recepcion F',
			'fechaDigitalizacion_f' => 'Fecha Digitalizacion F',
			'fechaVerficacion_f' => 'Fecha Verficacion F',
			'recepciono' => 'Recepciono',
			'digitalizo' => 'Digitalizo',
			'verifico' => 'Verifico',
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
		$criteria->compare('volumen_did',$this->volumen_did);
		$criteria->compare('expediente',$this->expediente,true);
		$criteria->compare('Folio',$this->Folio,true);
		$criteria->compare('UbicaciónFisica',$this->UbicaciónFisica,true);
		$criteria->compare('NumeroPatrimonio',$this->NumeroPatrimonio,true);
		$criteria->compare('estatus_did',$this->estatus_did);
		$criteria->compare('fechaRecepcion_f',$this->fechaRecepcion_f,true);
		$criteria->compare('fechaDigitalizacion_f',$this->fechaDigitalizacion_f,true);
		$criteria->compare('fechaVerficacion_f',$this->fechaVerficacion_f,true);
		$criteria->compare('recepciono',$this->recepciono);
		$criteria->compare('digitalizo',$this->digitalizo);
		$criteria->compare('verifico',$this->verifico);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}