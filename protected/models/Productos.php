<?php

/**
 * This is the model class for table "productos".
 *
 * The followings are the available columns in table 'productos':
 * @property integer $idproductos
 * @property string $nombre_productos
 *
 * The followings are the available model relations:
 * @property Casa $idcasa0
 */
class Productos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'productos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_productos', 'required'),
			array('nombre_productos', 'length', 'max'=>50),
			array('nombre_productos', 'unique'),
			//campos alfa numerico incluye guion y punto
			array('nombre_productos',  'match', 'pattern'=>'/^[0-9a-zA-Z\s-.áéíóúÁÉÍÓÚñÑ]+$/'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idproductos, nombre_productos', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idproductos' => 'Id',
			'nombre_productos' => 'Productos',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;


		$criteria->compare('idproductos',$this->idproductos,true);
		$criteria->compare('nombre_productos',$this->nombre_productos,true);



		$session=new CHttpSession;
		$session->open();
		$session['Productos_record']=$criteria;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array('defaultOrder'=>'nombre_productos ASC'),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Productos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
