<script type="text/javascript" src="/js/tiny_mce/tiny_mce.js"></script>

<script type="text/javascript">
tinyMCE.init({
  mode : "textareas"
});
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'article-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'content_id'); ?>

		<?php
    // это быдло код. сюда лучше не смотреть :(
    $titles = CHtml::listData(Contents::model()->findAll(), 'id','title');
    $parents = CHtml::listData(Contents::model()->findAll(), 'id','parent');
    
    $input = $parents;
    
    global $last;
    global $titles;
    global $list;
    
    $pref = '';
    foreach($input as $key=>$value){    
        if(@!$last[$key]){
          @$list[$key] = "{$titles[$key]}"; 
          tree($input,$key,$pref,$list);
        }
    }
    
    function tree($input,$parent,$pref,$list){
      
      global $last;
      global $list;
      
      if($parent != 0){
      $dir = $pref . ' *';
      $last[$parent] = 1;
      
      foreach($input as $key=>$value){
        if($value == $parent){
          $list[$key] = "$dir " . @$titles[$key];
          tree($input,$key,$pref. ' *',$list);      
        } 
      }
      }
      

    }     
    foreach(CHtml::listData(Contents::model()->findAll(), 'id','title') as $key=>$value){
      $list[$key] = $list[$key] . ' ' . $value; 
    }     
		echo $form->dropDownList($model,'content_id', $list ); 
		 
		?>

		<?php echo $form->error($model,'content_id'); ?>
	</div>

  <div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>20, 'cols'=>100)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->