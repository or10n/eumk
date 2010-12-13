<?php
$this->breadcrumbs=array(
	'Заголовки'=>array('index'),
	'Управление',
);

$this->menu=array(
	array('label'=>'Оглавление', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('contents-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Управление заголовками</h1>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'contents-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'parent',
		'type_id',
		'position',
		'title',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
