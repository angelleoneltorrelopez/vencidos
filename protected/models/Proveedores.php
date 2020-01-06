<?php

/**
 * This is the model class for table "proveedores".
 *
 * The followings are the available columns in table 'proveedores':
 * @property integer $idproveedor
 * @property string $nombreprov
 *
 * The followings are the available model relations:
 * @property Asignacion[] $asignacions
 */
class Proveedores extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'proveedores';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idproveedor', 'numerical', 'integerOnly'=>true),
			array('nombreprov', 'required'),
			array('nombreprov', 'unique'),
			array('nombreprov', 'length', 'max'=>75),
			//campos alfa numerico incluye guion y punto
			array('nombreprov',  'match', 'pattern'=>'/^[0-9a-zA-Z\s-.áéíóúÁÉÍÓÚñÑ]+$/'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idproveedor, nombreprov', 'safe', 'on'=>'search'),
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
			'asignacions' => array(self::HAS_MANY, 'Asignacion', 'idproveedor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idproveedor' => 'Id',
			'nombreprov' => 'Nombre',
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

		$criteria->compare('idproveedor',$this->idproveedor,true);
		$criteria->compare('nombreprov',$this->nombreprov,true);

		$session=new CHttpSession;
		$session->open();
		$session['proveedores_record']=$criteria;  //Esto para guardar la criteria en la sesión actual para usarlo posteriormente.

		$sort=new CSort();
        $sort->defaultOrder='nombreprov ASC';
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 10,),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Proveedores the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
