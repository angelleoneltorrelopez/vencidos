<?php

/**
 * This is the model class for table "ingreso".
 *
 * The followings are the available columns in table 'ingreso':
 * @property integer $Id
 * @property integer $idproducto
 * @property integer $idcasa
 * @property integer $idproveedor
 * @property string $Politica
 * @property string $Caducidad
 * @property string $Estado
 */
class Reporte extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ingreso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcasa,idproveedor,idproducto', 'numerical', 'integerOnly'=>true),
			array('Politica, Estado', 'length', 'max'=>2),
			array('Caducidad', 'safe'),
			array('Lote', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, idproducto, idcasa, idproveedor, Politica, Caducidad, Lote, Estado', 'safe', 'on'=>'search'),
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
			'producto' => array(self::BELONGS_TO, 'Productos', 'idproducto'),
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
			'Id' => 'ID',
			'idproducto' => 'Nombre',
			'idcasa' => 'Casa',
			'idproveedor' => 'Proveedor',
			'Politica' => 'Politica',
			'Caducidad' => 'Caducidad',
			'Lote' => 'Lote',
			'Estado' => 'Estado',
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
		$criteria2 = new CDbCriteria;
		$criteria3 = new CDbCriteria;
		$criteria4 = new CDbCriteria;
		$criteria5 = new CDbCriteria;
		$criteria6 = new CDbCriteria;


$variable = $this->Caducidad;
$year = 0;
$year = (int) date("Y");
$criteria->compare('Estado',"0",true);
$criteria->order = "Politica";
$resultado = substr($variable, 0, 4);

		if($variable == $resultado."-01-01"){

     $criteria->compare('Caducidad',$resultado."-01-01",true);
   	 	$criteria->addCondition("(Politica=0 OR Politica=-1) AND Estado=0");
	 $criteria2->compare('Caducidad',$resultado."-02-01",true);
	 	$criteria2->addCondition("Politica=1 AND Estado=0");
	 $criteria3->compare('Caducidad',$resultado."-03-01",true);
	 	$criteria3->addCondition("Politica=2 AND Estado=0");
	 $criteria4->compare('Caducidad',$resultado."-04-01",true);
	 	$criteria4->addCondition("Politica=3 AND Estado=0");
	 $criteria5->compare('Caducidad',$resultado."-05-01",true);
	 $criteria5->addCondition("Politica=4 AND Estado=0");
	 $criteria6->compare('Caducidad',$resultado."-06-01",true);
	 $criteria6->addCondition("Politica=5 AND Estado=0");
}


	if($variable == $resultado."-02-01"){

	 $criteria->compare('Caducidad',$resultado."-02-01",true);
   $criteria->addCondition("(Politica=0 OR Politica=-1) AND Estado=0");
 	 $criteria2->compare('Caducidad',$resultado."-03-01",true);
 	 $criteria2->addCondition("Politica=1 AND Estado=0");
 	 $criteria3->compare('Caducidad',$resultado."-04-01",true);
 	 $criteria3->addCondition("Politica=2 AND Estado=0");
 	 $criteria4->compare('Caducidad',$resultado."-05-01",true);
 	 $criteria4->addCondition("Politica=3 AND Estado=0");
 	 $criteria5->compare('Caducidad',$resultado."-06-01",true);
 	 $criteria5->addCondition("Politica=4 AND Estado=0");
 	 $criteria6->compare('Caducidad',$resultado."-07-01",true);
 	 $criteria6->addCondition("Politica=5 AND Estado=0");
}

if($variable == $resultado."-03-01"){
 $criteria->compare('Caducidad',$resultado."-03-01",true);
 $criteria->addCondition("(Politica=0 OR Politica=-1) AND Estado=0");
 $criteria2->compare('Caducidad',$resultado."-04-01",true);
 $criteria2->addCondition("Politica=1 AND Estado=0");
 $criteria3->compare('Caducidad',$resultado."-05-01",true);
 $criteria3->addCondition("Politica=2 AND Estado=0");
 $criteria4->compare('Caducidad',$resultado."-06-01",true);
 $criteria4->addCondition("Politica=3 AND Estado=0");
 $criteria5->compare('Caducidad',$resultado."-07-01",true);
 $criteria5->addCondition("Politica=4 AND Estado=0");
 $criteria6->compare('Caducidad',$resultado."-08-01",true);
 $criteria6->addCondition("Politica=5 AND Estado=0");
}

if($variable == $resultado."-04-01"){
 $criteria->compare('Caducidad',$resultado."-04-01",true);
 $criteria->addCondition("(Politica=0 OR Politica=-1) AND Estado=0");
 $criteria2->compare('Caducidad',$resultado."-05-01",true);
 $criteria2->addCondition("Politica=1 AND Estado=0");
 $criteria3->compare('Caducidad',$resultado."-06-01",true);
 $criteria3->addCondition("Politica=2 AND Estado=0");
 $criteria4->compare('Caducidad',$resultado."-07-01",true);
 $criteria4->addCondition("Politica=3 AND Estado=0");
 $criteria5->compare('Caducidad',$resultado."-08-01",true);
 $criteria5->addCondition("Politica=4 AND Estado=0");
 $criteria6->compare('Caducidad',$resultado."-09-01",true);
 $criteria6->addCondition("Politica=5 AND Estado=0");
}

if($variable == $resultado."-05-01"){
 $criteria->compare('Caducidad',$resultado."-05-01",true);
 $criteria->addCondition("(Politica=0 OR Politica=-1) AND Estado=0");
 $criteria2->compare('Caducidad',$resultado."-06-01",true);
 $criteria2->addCondition("Politica=1 AND Estado=0");
 $criteria3->compare('Caducidad',$resultado."-07-01",true);
 $criteria3->addCondition("Politica=2 AND Estado=0");
 $criteria4->compare('Caducidad',$resultado."-08-01",true);
 $criteria4->addCondition("Politica=3 AND Estado=0");
 $criteria5->compare('Caducidad',$resultado."-09-01",true);
 $criteria5->addCondition("Politica=4 AND Estado=0");
 $criteria6->compare('Caducidad',$resultado."-10-01",true);
 $criteria6->addCondition("Politica=5 AND Estado=0");
}

if($variable == $resultado."-06-01"){
 $criteria->compare('Caducidad',$resultado."-06-01",true);
 $criteria->addCondition("(Politica=0 OR Politica=-1) AND Estado=0");
 $criteria2->compare('Caducidad',$resultado."-07-01",true);
 $criteria2->addCondition("Politica=1 AND Estado=0");
 $criteria3->compare('Caducidad',$resultado."-08-01",true);
 $criteria3->addCondition("Politica=2 AND Estado=0");
 $criteria4->compare('Caducidad',$resultado."-09-01",true);
 $criteria4->addCondition("Politica=3 AND Estado=0");
 $criteria5->compare('Caducidad',$resultado."-10-01",true);
 $criteria5->addCondition("Politica=4 AND Estado=0");
 $criteria6->compare('Caducidad',$resultado."-11-01",true);
 $criteria6->addCondition("Politica=5 AND Estado=0");
}

if($variable == $resultado."-07-01"){
 $criteria->compare('Caducidad',$resultado."-07-01",true);
 $criteria->addCondition("(Politica=0 OR Politica=-1) AND Estado=0");
 $criteria2->compare('Caducidad',$resultado."-08-01",true);
 $criteria2->addCondition("Politica=1 AND Estado=0");
 $criteria3->compare('Caducidad',$resultado."-09-01",true);
 $criteria3->addCondition("Politica=2 AND Estado=0");
 $criteria4->compare('Caducidad',$resultado."-10-01",true);
 $criteria4->addCondition("Politica=3 AND Estado=0");
 $criteria5->compare('Caducidad',$resultado."-11-01",true);
 $criteria5->addCondition("Politica=4 AND Estado=0");
 $criteria6->compare('Caducidad',$resultado."-12-01",true);
 $criteria6->addCondition("Politica=5 AND Estado=0");
}

if($variable == $resultado."-08-01"){
 $criteria->compare('Caducidad',$resultado."-08-01",true);
 $criteria->addCondition("(Politica=0 OR Politica=-1) AND Estado=0");
 $criteria2->compare('Caducidad',$resultado."-09-01",true);
 $criteria2->addCondition("Politica=1 AND Estado=0");
 $criteria3->compare('Caducidad',$resultado."-10-01",true);
 $criteria3->addCondition("Politica=2 AND Estado=0");
 $criteria4->compare('Caducidad',$resultado."-11-01",true);
 $criteria4->addCondition("Politica=3 AND Estado=0");
 $criteria5->compare('Caducidad',$resultado."-12-01",true);
 $criteria5->addCondition("Politica=4 AND Estado=0");
 $criteria6->compare('Caducidad',$year = 1 + (int) $resultado."-01-01",true);
 $criteria6->addCondition("Politica=5 AND Estado=0");
}

if($variable == $resultado."-09-01"){
 $criteria->compare('Caducidad',$resultado."-09-01",true);
 $criteria->addCondition("(Politica=0 OR Politica=-1) AND Estado=0");
 $criteria2->compare('Caducidad',$resultado."-10-01",true);
 $criteria2->addCondition("Politica=1 AND Estado=0");
 $criteria3->compare('Caducidad',$resultado."-11-01",true);
 $criteria3->addCondition("Politica=2 AND Estado=0");
 $criteria4->compare('Caducidad',$resultado."-12-01",true);
 $criteria4->addCondition("Politica=3 AND Estado=0");
 $criteria5->compare('Caducidad',$year = 1 + (int) $resultado."-01-01",true);
 $criteria5->addCondition("Politica=4 AND Estado=0");
 $criteria6->compare('Caducidad',$year = 1 + (int) $resultado."-02-01",true);
 $criteria6->addCondition("Politica=5 AND Estado=0");
}

if($variable == $resultado."-10-01"){
 $criteria->compare('Caducidad',$resultado."-10-01",true);
 $criteria->addCondition("(Politica=0 OR Politica=-1) AND Estado=0");
 $criteria2->compare('Caducidad',$resultado."-11-01",true);
 $criteria2->addCondition("Politica=1 AND Estado=0");
 $criteria3->compare('Caducidad',$resultado."-12-01",true);
 $criteria3->addCondition("Politica=2 AND Estado=0");
 $criteria4->compare('Caducidad',$year = 1 + (int) $resultado."-01-01",true);
 $criteria4->addCondition("Politica=3 AND Estado=0");
 $criteria5->compare('Caducidad',$year = 1 + (int) $resultado."-02-01",true);
 $criteria5->addCondition("Politica=4 AND Estado=0");
 $criteria6->compare('Caducidad',$year = 1 + (int) $resultado."-03-01",true);
 $criteria6->addCondition("Politica=5 AND Estado=0");
}

if($variable == $resultado."-11-01"){
 $criteria->compare('Caducidad',$resultado."-11-01",true);
 $criteria->addCondition("(Politica=0 OR Politica=-1) AND Estado=0");
 $criteria2->compare('Caducidad',$resultado."-12-01",true);
 $criteria2->addCondition("Politica=1 AND Estado=0");
 $criteria3->compare('Caducidad',$year = 1 + (int) $resultado."-01-01",true);
 $criteria3->addCondition("Politica=2 AND Estado=0");
 $criteria4->compare('Caducidad',$year = 1 + (int) $resultado."-02-01",true);
 $criteria4->addCondition("Politica=3 AND Estado=0");
 $criteria5->compare('Caducidad',$year = 1 + (int) $resultado."-03-01",true);
 $criteria5->addCondition("Politica=4 AND Estado=0");
 $criteria6->compare('Caducidad',$year = 1 + (int) $resultado."-04-01",true);
 $criteria6->addCondition("Politica=5 AND Estado=0");
}

if($variable == $resultado."-12-01"){
 $criteria->compare('Caducidad',$resultado."-12-01",true);
 $criteria->addCondition("(Politica=0 OR Politica=-1) AND Estado=0");
 $criteria2->compare('Caducidad',$year = 1 + (int) $resultado."-01-01",true);
 $criteria2->addCondition("Politica=1 AND Estado=0");
 $criteria3->compare('Caducidad',$year = 1 + (int) $resultado."-02-01",true);
 $criteria3->addCondition("Politica=2 AND Estado=0");
 $criteria4->compare('Caducidad',$year = 1 + (int) $resultado."-03-01",true);
 $criteria4->addCondition("Politica=3 AND Estado=0");
 $criteria5->compare('Caducidad',$year = 1 + (int) $resultado."-04-01",true);
 $criteria5->addCondition("Politica=4 AND Estado=0");
 $criteria6->compare('Caducidad',$year = 1 + (int) $resultado."-05-01",true);
 $criteria6->addCondition("Politica=5 AND Estado=0");
}
/*
		$criteria->compare('Id',$this->Id);
		$criteria->compare('Nombre',$this->Nombre,true);
		$criteria->compare('Casa',$this->Casa,true);
		$criteria->compare('Proveedor',$this->Proveedor,true);
		$criteria->compare('Politica',$this->Politica,true);
		//$criteria->compare('Caducidad',$this->Caducidad,true);

$criteria6->order = 'Casa ASC';
$criteria5->order = 'Casa ASC';
$criteria4->order = 'Casa ASC';
$criteria3->order = 'Casa ASC';
*/

$criteria5->mergeWith($criteria6,'OR');
$criteria4->mergeWith($criteria5,'OR');
$criteria3->mergeWith($criteria4,'OR');
$criteria2->mergeWith($criteria3,'OR');
$criteria->mergeWith($criteria2,'OR');
$criteria->together = true;
$criteria->with = array('casa','proveedor', 'producto');
$criteria->order = 'Caducidad ASC, casa.nombrecasa ASC, producto.nombre_productos ASC';
$session=new CHttpSession;
$session->open();
$session['Reporte_record']=$criteria;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,

		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Reporte the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
