<?php

$type_id = $type = Yii::app()->request->getQuery('type', 1);
$type_id = (int)$type_id; 

$titles = CHtml::listData(Type::model()->findAll(),'id','type');

$this->breadcrumbs=array(
	$titles["$type_id"],
);

$this->menu=array(
	array('label'=>'Добавить заголовок', 'url'=>array('create')),
	array('label'=>'Управление', 'url'=>array('admin')),
);
?>

<?php
        
    $parents = CHtml::listData(Contents::model()->findAll('type_id = '.$type_id), 'id','parent');
    
    $list = $this->getTree($parents);

    foreach(CHtml::listData(Contents::model()->findAll('type_id = '.$type_id), 'id','title') as $key=>$value){
      $list[$key] = $list[$key] . ' ' . $value;
    }
    
    if(!$list){
      echo '<h1>Данный раздел пуст</h1>';
    } else {
      
      
      echo '<h1>Оглавление</h1>';
      
      foreach($list as $key=>$value){
        if($parents["$key"] != 0){
          @$keyy = Article::model()->find('content_id=:content_id', array(':content_id' => $key))->id;
          if($keyy){
            echo "<a href='index.php?r=article/view&id=" . $keyy . "'>$value</a><br>";
          } else {
            
            
            echo "<a href='index.php?r=article/create'>$value</a><br>";
            
                      
          }
          unset ($keyy);
        }
      }
    }  
    
    //echo '<br><h1>Версия для печати</h1>';
    echo '<br><br><a href="">Курс лекций в виде pdf</a>';
    
?>


<?php 
/*
 $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
*/
 ?>
