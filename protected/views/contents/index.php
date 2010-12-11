<?php
$this->breadcrumbs=array(
	'Contents',
);

$this->menu=array(
	array('label'=>'Create Contents', 'url'=>array('create')),
	array('label'=>'Manage Contents', 'url'=>array('admin')),
);
?>

<h1>Contents</h1>

<?php

    $parents = CHtml::listData(Contents::model()->findAll(), 'id','parent');
    
    $list = $this->getTree($parents);

    foreach(CHtml::listData(Contents::model()->findAll(), 'id','title') as $key=>$value){
      $list[$key] = $list[$key] . ' ' . $value;
    }
    
    foreach($list as $key=>$value){
      //if($key != 1)
        echo "<a href='/index.php?r=contents/view&id=$key'>$value</a><br>";
      
    }
  
?>


<?php 
/*
 $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
*/
 ?>
