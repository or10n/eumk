<?php

/**
 * This is the model class for table "{{contents}}".
 *
 * The followings are the available columns in table '{{contents}}':
 * @property integer $id
 * @property integer $parent
 * @property integer $type_id
 * @property integer $position
 * @property string $title
 *
 * The followings are the available model relations:
 * @property Article[] $articles
 * @property Type $type
 */
class Contents extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Contents the static model class
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
		return '{{contents}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type_id, title', 'required'),
			array('parent, type_id, position', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent, type_id, position, title', 'safe', 'on'=>'search'),
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
			'articles' => array(self::HAS_ONE, 'Article', 'content_id', 'order' => 'position'),
			'type' => array(self::BELONGS_TO, 'Type', 'type_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent' => 'Родитель',
			'type_id' => 'Тип',
			'position' => 'Позиция',
			'title' => 'Заглавие',
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
		$criteria->compare('parent',$this->parent);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('position',$this->position);
		$criteria->compare('title',$this->title,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}