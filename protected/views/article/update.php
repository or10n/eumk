<?php
$this->breadcrumbs=array(
	'Статьи'=>array('index'),
	Contents::model()->findByPk($model->content_id)->title=>array('view','id'=>$model->id),
	'Редактирование',
);

$this->menu=array(
	array('label'=>'Просмотр списка', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Просмотреть', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Редактирование статьи "<?php echo Contents::model()->findByPk($model->content_id)->title; ?>"</h1>

<?php echo $this->renderPartial('_form2', array('model'=>$model)); ?>