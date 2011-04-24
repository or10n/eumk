<?php

$type_id = $type = Yii::app()->request->getQuery('type', 1);
$type_id = (int)$type_id; 

$titles = CHtml::listData(Type::model()->findAll(),'id','type');

if(!Yii::app()->user->isGuest){
	$this->menu=array(
		array('label'=>'Добавить заголовок', 'url'=>array('create')),
		array('label'=>'Управление', 'url'=>array('admin')),
		array('label'=>'Добавить статью','url'=>array('article/create'))
	);
}

?>

<?php
    
	echo "<h1><center>{$titles["$type_id"]}</center></h1>";	
		
    $parents = CHtml::listData(Contents::model()->findAll('type_id = '.$type_id), 'id','parent');
    
    $list = $this->getTree($parents);

    foreach(CHtml::listData(Contents::model()->findAll('type_id = '.$type_id), 'id','title') as $key=>$value){
      $list[$key] = $list[$key] . ' ' . $value;
    }
    
    if(!$list){
      echo '<h1>Данный раздел пуст</h1>';
    } else {
      echo('
	  <center>
	  <table width="80%" cellspacing="0" cellpadding="4" border="0" class="links">
	  <tr>
		  <td>
		  ');
		  foreach($list as $key=>$value){
			if($parents["$key"] != 0){
			  @$keyy = Article::model()->find('content_id=:content_id', array(':content_id' => $key))->id;
			  /** /
			  $num = substr_count($value, '»');
			  $value = str_replace('»', null, $value);
			  /**/
			  if (stristr($value, '»') == FALSE) {echo('</td></tr><tr><td>');}
			  
			  if($keyy){
				echo "<a href='index.php?r=article/view&id=" . $keyy . "' style=\"margin-left: ".(intval($num)*15)."px;\">$value</a><br>";
			  } else {
				echo "$value<br>";          
			  }
			  unset ($keyy);
			}
		  }
		  echo('
		  </td>
	  </tr>
	  <tr>
		<td>&nbsp;</td>
	  </tr>
	  <tr>
		<td>');
    if($list){
      switch ($type_id) {
            case '1':
              echo '<a href="/_files/МПСИП Программа.pdf"><img src="/images/pdf.jpg">Курс лекций в формате pdf</a>';  
              break;
  
            case '2':
              echo '<a href="/_files/МПСИП Лабораторные работы.pdf"><img src="/images/pdf.jpg">Курс лабораторных работ в формате pdf</a>';  
              break;
            
            case '3':
              echo '<a href="/_files/МПСИП Практические работы.pdf"><img src="/images/pdf.jpg">Курс практических работ в формате pdf</a>';  
              break;          
            
            case '4':
              echo '<a href="/_files/МПСИП Контроль знаний.pdf"><img src="/images/pdf.jpg">Контроль знаний в формате pdf</a>';  
              break;
            
            case '42':
              echo '<a href="/_files/МПСИП Учебная программа.pdf"><img src="/images/pdf.jpg">Учебная программа в формате pdf</a>';  
              break;
			  
            default:
              echo '';
              break;
      }
    }
echo ('		
		</td>
	  </tr>	  
	  </table>
	  </center>');
    }  
    
?>

<?php


	

?>

<?php 
/*
 $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); 
*/
 ?>
