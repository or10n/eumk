<?php
$this->breadcrumbs=array(
	'Contents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Contents', 'url'=>array('index')),
	array('label'=>'Manage Contents', 'url'=>array('admin')),
);
?>

<h1>Create Contents</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>