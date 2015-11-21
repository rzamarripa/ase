<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id
 * @property string $nombre
 * @property string $apPaterno
 * @property string $apMaterno
 * @property string $profesion
 * @property string $domCalle
 * @property string $domNo
 * @property string $domColonia
 * @property string $domCP
 * @property string $domMunicipio
 * @property string $domCiudad
 * @property string $domEstado
 * @property string $domPais
 * @property string $telefono
 * @property string $celular
 * @property string $empresa
 * @property string $tema
 * @property string $usuario
 * @property string $contrasena
 * @property string $foto
 * @property integer $tipoUsuario_did
 * @property integer $estatus_did
 * @property string $fechaCreacion_f
 *
 * The followings are the available model relations:
 * @property Estatus $estatus
 * @property TipoUsuario $tipoUsuario
 * @property Foro[] $foros
 * @property Noticia[] $noticias
 */
class Usuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Usuario the static model class
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
		return 'Usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, apPaterno, usuario, contrasena, correo', 'required'),
			array('usuario, correo','unique'),
			array('tipoUsuario_did, estatus_did', 'numerical', 'integerOnly'=>true),
			array('nombre, apPaterno, apMaterno, profesion, domCalle, domNo, correo, domColonia, domCP, 
							domMunicipio, domCiudad, domEstado, domPais, telefono, celular, empresa, tema, usuario, contrasena', 'length', 'max'=>50),
			array('foto', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, apPaterno, apMaterno, profesion, domCalle, domNo, domColonia, domCP, domMunicipio, domCiudad, domEstado, domPais, telefono, celular, empresa, tema, usuario, contrasena, foto, tipoUsuario_did, estatus_did, fechaCreacion_f', 'safe', 'on'=>'search'),
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
			'tipoUsuario' => array(self::BELONGS_TO, 'TipoUsuario', 'tipoUsuario_did'),
			'foros' => array(self::HAS_MANY, 'Foro', 'usuario_did'),
			'noticias' => array(self::HAS_MANY, 'Noticia', 'usuario_did'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre (s)',
			'apPaterno' => 'Ap. Paterno',
			'apMaterno' => 'Ap. Materno',
			'profesion' => 'Profesión',
			'domCalle' => 'Calle',
			'domNo' => 'No.',
			'domColonia' => 'Colonia',
			'domCP' => 'CP',
			'domMunicipio' => 'Municipio',
			'domCiudad' => 'Ciudad',
			'domEstado' => 'Estado',
			'domPais' => 'País',
			'telefono' => 'Teléfono',
			'celular' => 'Celular',
			'empresa' => 'Empresa',
			'tema' => 'Tema',
			'usuario' => 'Usuario',
			'contrasena' => 'Contraseña',
			'foto' => 'Foto',
			'tipoUsuario_did' => 'Tipo Usuario',
			'estatus_did' => 'Estatus',
			'fechaCreacion_f' => 'Fecha Creación',
			'correo'=>'Correo',
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
		$criteria->compare('apPaterno',$this->apPaterno,true);
		$criteria->compare('apMaterno',$this->apMaterno,true);
		$criteria->compare('profesion',$this->profesion,true);
		$criteria->compare('domCalle',$this->domCalle,true);
		$criteria->compare('domNo',$this->domNo,true);
		$criteria->compare('domColonia',$this->domColonia,true);
		$criteria->compare('domCP',$this->domCP,true);
		$criteria->compare('domMunicipio',$this->domMunicipio,true);
		$criteria->compare('domCiudad',$this->domCiudad,true);
		$criteria->compare('domEstado',$this->domEstado,true);
		$criteria->compare('domPais',$this->domPais,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('empresa',$this->empresa,true);
		$criteria->compare('tema',$this->tema,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('contrasena',$this->contrasena,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('tipoUsuario_did',$this->tipoUsuario_did);
		$criteria->compare('estatus_did',$this->estatus_did);
		$criteria->compare('fechaCreacion_f',$this->fechaCreacion_f,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function obtenerUsuarioActual()
	{
		$usuarioActual = Usuario::model()->find('usuario = :u',array(':u' => Yii::app()->user->name));
		return $usuarioActual;
	}
}