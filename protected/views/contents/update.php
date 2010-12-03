<?php
$this->breadcrumbs=array(
	'Contents'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Contents', 'url'=>array('index')),
	array('label'=>'Create Contents', 'url'=>array('create')),
	array('label'=>'View Contents', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Contents', 'url'=>array('admin')),
);
?>

<h1>Update Contents <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>