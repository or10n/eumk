<?php
require('./_require/vars.php');
?>
<!--!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//RU">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" type=text/css>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<meta http-equiv="Content-Language" content="ru">
	<script language="javascript">
	function change_color(id){
		var obj = document.getElementById(id);
		obj.src = "<?php echo Yii::app()->request->baseUrl; ?>/images/"+id+".jpg"
	}
	function change_gray(id){
		var obj = document.getElementById(id);
		obj.src = "<?php echo Yii::app()->request->baseUrl; ?>/images/"+id+"_gray.jpg"
	}
	</script>
	
	<?php
	/** /
	?>
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<?php
	/**/
	?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>


<body>
	<table width="100%" cellspacing="3" cellpadding="0" border="0" background="<?php echo Yii::app()->request->baseUrl; ?>/images/background.jpg" class="header_table">
		<tr> 
			<td width="13%" align="center" rowspan="3"><img width="117" height="97" align="middle" src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo_left.png"></td>
		</tr>
		<tr> 
			<td width="70%" valign="middle" align="center" colspan="2">
				<h1 align="center">Электронный учебно-методический комплекс по дисциплине "МПСИП"<br>для специальности: </h1>
				<span style="text-align: center;" class="title"><span style="font-size: 14pt;">1-38 02 03 "Техническое обеспечение безопасности"</span></span>
			</td>
			<td width="12%" align="center" rowspan="3">&nbsp;</td>
		</tr>
		<tr> 
			<td align="center" colspan="2">
				<div id="mainmenu">
						<!--b>Оглавление</b></li> | 
						<a href="./Программа/index.htm">Программа</a> | 
						<a href="./Теория/index.htm">Теория</a> | 
						<a href="./Практика/index.htm">Практика</a> | 
						<a href="./Контроль_знаний/index.htm">Контроль знаний</a> | 
						<a href="./Об авторах/index.htm">Об авторах</a-->
						<?php $this->widget('zii.widgets.CMenu',array(
							'items'=>array(
								array('label'=>'Home', 'url'=>array('/site/index')),				
								array('label'=>'Лекции', 'url'=>array('/contents','type' => '1')),
								array('label'=>'Лабораторные работы', 'url'=>array('/contents','type' => '2')),
								array('label'=>'Практические работы', 'url'=>array('/contents','type' => '3')),        
								array('label'=>'Контроль знаний', 'url'=>array('/contents','type' => '4')),
								array('label'=>'Разделы', 'url'=>array('/type')),        
								array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
								array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
							),
						)); ?>
				</div>&nbsp;
			</td>
		</tr>
	</table>


	<div class="container" id="page">

		<center>
			<table class="links">
				<tr><td>
					<?php 
					$this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,));
					?>
				</td></tr>
			</table>
		</center>

		<?php echo $content; ?>

		<?php
		require_once('./_require/footer.php');
		?>
	</div>

</body>
</html>
<!-- 
	Belarusian State University of Informatics and Radioelectronics, 
	Faculty of Computer-Aided Design, 
	The Department of Radioelectronic Facilities, 
	(c) 2010 - 2011
	
	programming - Randa Alexander - or10n(at)tut.by 
	programming - Plahotya Yaroslav - decss(at)miromax.org
	content - Sergey Graholsky
    content - Evgeny Buldyk
-->