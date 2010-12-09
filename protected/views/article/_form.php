<!-- TinyMCE -->
<script type="text/javascript" src="/js/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
  tinyMCE.init({
    // General options
    mode : "textareas",
    theme : "advanced",
    plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

    // Theme options
    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true,

    // Example content CSS (should be your site CSS)
    content_css : "css/content.css",

    paste_retain_style_properties : "color",
    // Drop lists for link/image/media/template dialogs
    template_external_list_url : "lists/template_list.js",
    external_link_list_url : "lists/link_list.js",
    external_image_list_url : "lists/image_list.js",
    media_external_list_url : "lists/media_list.js",


    // Replace values for the template plugin
    template_replace_values : {
      username : "Some User",
      staffid : "991234"
    }
  });
</script>
<!-- /TinyMCE -->

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