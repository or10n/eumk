<?php
$this->breadcrumbs=array(
	'Статьи'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Список', 'url'=>array('index')),
	array('label'=>'Создать', 'url'=>array('create')),
	array('label'=>'Редактировать', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>


<h1>Просмотр материала "<?php echo Contents::model()->findByPk($model->content_id)->title; ?>"</h1>

<?php
  echo "<hr width=90% size=1 color=black />";
  echo $model->text;
  echo "<hr width=90% size=1 color=black />";

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