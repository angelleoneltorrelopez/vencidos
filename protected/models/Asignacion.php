<?php

/**
 * This is the model class for table "asignacion".
 *
 * The followings are the available columns in table 'asignacion':
 * @property integer $idasignacion
 * @property integer $idcasa
 * @property integer $idproveedor
 * @property integer $politica
 * @property string $regDate
 *
 * The followings are the available model relations:
 * @property Casa $idcasa0
 * @property Proveedores $idproveedor0
 */
class Asignacion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'asignacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcasa, idproveedor, politica', 'required'),
			array('idcasa, idproveedor, politica', 'numerical', 'integerOnly'=>true),
			array('regDate', 'safe'),
			array('idasignacion, idcasa, idproveedor, politica, regDate', 'safe', 'on'=>'search'),
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
			'casa' => array(self::BELONGS_TO, 'Casa', 'idcasa'),
			'proveedor' => array(self::BELONGS_TO, 'Proveedores', 'idproveedor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idasignacion' => 'Id',
			'idcasa' => 'Casa',
			'idproveedor' => 'Proveedor',
			'politica' => 'Politica',
			'regDate' => 'Reg Date',
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
		$criteria->together = true;
		$criteria->with = array('casa', 'proveedor');
		$criteria->compare('idasignacion',$this->idasignacion);
		$criteria->compare('casa.nombrecasa',$this->idcasa,true);
		$criteria->compare('proveedor.nombreprov',$this->idproveedor,true);
		$criteria->compare('politica',$this->politica,true);
		$criteria->compare('regDate',$this->regDate,true);

		$session=new CHttpSession;
		$session->open();
		$session['Asignacion_record']=$criteria; 
		//Esto para guardar la criteria en la sesión actual para usarlo posteriormente.
		//$session['Asignacion_record']->order = 'casa.nombrecasa ASC, proveedor.nombreprov';

        $sort=new CSort();
       $sort->defaultOrder='casa.nombrecasa ASC, proveedor.nombreprov';
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
	 * @return Asignacion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
