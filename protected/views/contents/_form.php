<script type="text/javascript">

$(document).ready(function(){              
    $('#Contents_parent').load('/index.php?r=contents/dropdown&type=1');
    $('#Contents_type_id').change(function(){
        $('#Contents_parent').load('/index.php?r=contents/dropdown&type='+$('#Contents_type_id').val());       
    }) 
});
</script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contents-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>


  <div class="row" id="type">
    <?php echo $form->labelEx($model,'type_id'); ?>
    <?php echo $form->dropDownList($model,'type_id', CHtml::listData(Type::model()->findAll(), 'id','type') ); ?>
    <?php echo $form->error($model,'type_id'); ?>
  </div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent'); ?>
		
		<?php 
	   	
  		$parents = CHtml::listData(Contents::model()->findAll(), 'id','parent');
      
      $list = $this->getTree($parents);
  
      foreach(CHtml::listData(Contents::model()->findAll(), 'id','title') as $key=>$value){
        $list[$key] = $list[$key] . ' ' . $value;
      }
      echo $form->dropDownList($model,'parent', $list );  
    ?>
    
		<?php echo $form->error($model,'parent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position'); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->