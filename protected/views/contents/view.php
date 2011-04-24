<?php
$this->breadcrumbs=array(
	'Заголовки'=>array('index'),
	$model->title,
);

if(!Yii::app()->user->isGuest){
	$this->menu=array(
		array('label'=>'Оглавление', 'url'=>array('index')),
		array('label'=>'Добавить', 'url'=>array('create')),
		array('label'=>'Редактировать', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Управление', 'url'=>array('admin'))
	);
}
?>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'parent',
		'type_id',
		'position',
		'title',
	),
)); ?>
