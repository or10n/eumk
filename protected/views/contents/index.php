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
        @$keyy = Article::model()->find('content_id=:content_id', array(':content_id' => $key))->id;
        if($keyy){
          echo "<a href='/index.php?r=article/view&id=" . $keyy . "'>$value</a><br>";
        } else {
          echo "$value<br>";          
        }
        unset ($keyy);
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
