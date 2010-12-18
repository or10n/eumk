<?php
$this->breadcrumbs=array(
	'Заголовки',
);

$this->menu=array(
	array('label'=>'Добавить заголовок', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<h1>Оглавление</h1>

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
          echo "<a href='index.php?r=article/view&id=" . $keyy . "'>$value</a><br>";
        } else {
          
          
          echo "<a href='index.php?r=article/create'>$value</a><br>";
          
                    
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
