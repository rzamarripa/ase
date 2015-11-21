<?php

/**
 * This is the model class for table "Archivo".
 *
 * The followings are the available columns in table 'Archivo':
 * @property integer $id
 * @property integer $num
 * @property integer $tipoDocumentoId
 * @property integer $año
 * @property string $folio
 * @property string $comentarioEnte
 * @property integer $enteFiscalizableId
 * @property string $demandado
 * @property string $comentario
 * @property string $denunciante
 * @property integer $periodoId
 * @property string $resultado
 * @property string $observacion
 * @property string $numeroPliego
 * @property string $PFISR
 * @property string $importe
 * @property string $fecha
 * @property integer $estatus
 *
 * The followings are the available model relations:
 * @property ArchivoDetalle[] $archivoDetalles
 * @property EnteFiscalizable $enteFiscalizable
 * @property Periodo $periodo
 * @property TiposDocumento $tipoDocumento
 */
class Archivo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Archivo the static model class
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
		return 'Archivo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('num', 'required'),
			array('num, tipoDocumentoId, año, enteFiscalizableId, periodoId, estatus', 'numerical', 'integerOnly'=>true),
			array('folio, numeroPliego, PFISR', 'length', 'max'=>50),
			array('resultado, fecha', 'length', 'max'=>10),
			array('importe', 'length', 'max'=>18),
			array('comentarioEnte, demandado, comentario, denunciante, observacion', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, num, tipoDocumentoId, año, folio, comentarioEnte, enteFiscalizableId, demandado, comentario, denunciante, periodoId, resultado, observacion, numeroPliego, PFISR, importe, fecha, estatus', 'safe', 'on'=>'search'),
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
			'archivoDetalles' => array(self::HAS_MANY, 'ArchivoDetalle', 'archivoId'),
			'enteFiscalizable' => array(self::BELONGS_TO, 'EnteFiscalizable', 'enteFiscalizableId'),
			'periodo' => array(self::BELONGS_TO, 'Periodo', 'periodoId'),
			'tipoDocumento' => array(self::BELONGS_TO, 'TiposDocumento', 'tipoDocumentoId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'num' => 'Num',
			'tipoDocumentoId' => 'Tipo Documento',
			'año' => 'Año',
			'folio' => 'Folio',
			'comentarioEnte' => 'Comentario Ente',
			'enteFiscalizableId' => 'Ente Fiscalizable',
			'demandado' => 'Demandado',
			'comentario' => 'Comentario',
			'denunciante' => 'Denunciante',
			'periodoId' => 'Periodo',
			'resultado' => 'Resultado',
			'observacion' => 'Observacion',
			'numeroPliego' => 'Numero Pliego',
			'PFISR' => 'Pfisr',
			'importe' => 'Importe',
			'fecha' => 'Fecha',
			'estatus' => 'Estatus',
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
		$criteria->compare('num',$this->num);
		$criteria->compare('tipoDocumentoId',$this->tipoDocumentoId);
		$criteria->compare('año',$this->año);
		$criteria->compare('folio',$this->folio,true);
		$criteria->compare('comentarioEnte',$this->comentarioEnte,true);
		$criteria->compare('enteFiscalizableId',$this->enteFiscalizableId);
		$criteria->compare('demandado',$this->demandado,true);
		$criteria->compare('comentario',$this->comentario,true);
		$criteria->compare('denunciante',$this->denunciante,true);
		$criteria->compare('periodoId',$this->periodoId);
		$criteria->compare('resultado',$this->resultado,true);
		$criteria->compare('observacion',$this->observacion,true);
		$criteria->compare('numeroPliego',$this->numeroPliego,true);
		$criteria->compare('PFISR',$this->PFISR,true);
		$criteria->compare('importe',$this->importe,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('estatus',$this->estatus);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}