<?php

/**
 * This is the model class for table "ArchivoHistoricoDetalle".
 *
 * The followings are the available columns in table 'ArchivoHistoricoDetalle':
 * @property integer $Id_Archivo
 * @property integer $Consecutivo
 * @property string $imagen
 * @property string $NombreArchivo
 * @property string $Comentario
 * @property string $thumbnail
 *
 * The followings are the available model relations:
 * @property ArchivoHistorico $idArchivo
 */
class ArchivoHistoricoDetalle extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ArchivoHistoricoDetalle the static model class
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
		return 'ArchivoHistoricoDetalle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('imagen', 'file', 
        'types'=>'jpg, gif, png, bmp, jpeg',
            'maxSize'=>1024 * 1024 * 10, // 10MB
                'tooLarge'=>'El archivo es más grande de 10MB. Por favor suba uno más pequeño.',
            'allowEmpty' => true
         ),
			array('Id_Archivo, Consecutivo, imagen, NombreArchivo, Comentario', 'required'),
			array('Id_Archivo, Consecutivo', 'numerical', 'integerOnly'=>true),
			array('NombreArchivo', 'length', 'max'=>40),
			array('thumbnail', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id_Archivo, Consecutivo, imagen, NombreArchivo, Comentario, thumbnail', 'safe', 'on'=>'search'),
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
			'archivo' => array(self::BELONGS_TO, 'ArchivoHistorico', 'Id_Archivo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Id_Archivo' => 'Id Archivo',
			'Consecutivo' => 'Consecutivo',
			'imagen' => 'Imagen',
			'NombreArchivo' => 'Nombre Archivo',
			'Comentario' => 'Comentario',
			'thumbnail' => 'Thumbnail',
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

		$criteria->compare('Id_Archivo',$this->Id_Archivo);
		$criteria->compare('Consecutivo',$this->Consecutivo);
		$criteria->compare('imagen',$this->imagen,true);
		$criteria->compare('NombreArchivo',$this->NombreArchivo,true);
		$criteria->compare('Comentario',$this->Comentario,true);
		$criteria->compare('thumbnail',$this->thumbnail,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}