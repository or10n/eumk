<?php
$this->breadcrumbs=array(
	'Articles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Article', 'url'=>array('index')),
	array('label'=>'Create Article', 'url'=>array('create')),
	array('label'=>'Update Article', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Article', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Article', 'url'=>array('admin')),
);
?>

<h1>Просмотр материала "<?php echo $model->content_id; ?>"</h1>

<?php

  echo $model->text;

?>



<?php /*
  $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'content_id',
		'text',
	),
));  
 */
?>