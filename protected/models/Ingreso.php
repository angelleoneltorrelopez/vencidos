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
 * @property string $Usuario
 */
class Ingreso extends CActiveRecord
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
			array('idcasa, idproveedor,idproducto', 'numerical', 'integerOnly'=>true),
			array('Usuario', 'length', 'max'=>45),
			array('Politica, Estado', 'length', 'max'=>2),
			array('Caducidad', 'safe'),
			array('Lote', 'length', 'max'=>15),
			array('idproducto, idcasa, idproveedor, Politica, Caducidad, Estado', 'required'),
			array('Caducidad', 'comparar_fechas', 'type' => 'date', 'dateFormat' => 'yyyy-MM-dd'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Id, idproducto, idcasa, idproveedor, Politica, Caducidad, Lote, Estado, Usuario', 'safe', 'on'=>'search'),
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
			'Usuario' => 'Usuario',
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
		$criteria->with = array('casa', 'proveedor', 'producto');
		$criteria->compare('Id',$this->Id,true);
		$criteria->compare('producto.nombre_productos',$this->idproducto,true);
		$criteria->compare('casa.nombrecasa',$this->idcasa,true);
		$criteria->compare('proveedor.nombreprov',$this->idproveedor,true);
		$criteria->compare('Politica',$this->Politica,true);
		$criteria->compare('Caducidad',$this->Caducidad,true);
		$criteria->compare('Lote',$this->Lote,true);
		$criteria->compare('Estado',$this->Estado,true);


		$session=new CHttpSession;
		$session->open();
		$session['ingreso_record']=$criteria;  //Esto para guardar la criteria en la sesión actual para usarlo posteriormente.

    $sort=new CSort();
    $sort->defaultOrder='Caducidad DESC, casa.nombrecasa ASC, producto.nombre_productos ASC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
			'pagination' => array('pageSize' => 10,),

		));
	}

	public function comparar_fechas($attribute,$params) {
		$fec = date("Y/m")."/01";
if(!empty($this->attributes['Caducidad'])) {
if(strtotime($this->attributes['Caducidad']) < strtotime($fec)) {
$this->addError($attribute,'La Fecha de Caducidad No Puede Ser Menor a la Fecha Actual');}
}
}




	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Ingreso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
