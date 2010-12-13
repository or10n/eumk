<?php
$this->breadcrumbs=array(
	'Заголовки'=>array('index'),
	'Создание',
);

$this->menu=array(
	array('label'=>'Оглавление', 'url'=>array('index')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Создать заголовок</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>