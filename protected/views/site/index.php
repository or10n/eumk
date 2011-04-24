<?php 
require('./_require/vars.php');

$this->pageTitle=Yii::app()->name;
?>

<center>
<table class="img_content" border="0" cellpadding="4" cellspacing="0">
	<tr> 
		<td width=25% align=center>
			<em><a href="" target="_blank" title="Программа дисциплины (Откроется в новом окне)">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/program_gray.jpg" id="program" width="220" height="270" border="0" onMouseOver="javascript:change_color('program')" onMouseOut="javascript:change_gray('program')">
				<center>Программа дисциплины</center>	  
			</a></em>
		</td>
		<td width=25% align=center>
			<em><a href="/index.php?r=contents&type=1">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/theory_gray.jpg" id="theory" width="220" height="270" border="0" onMouseOver="javascript:change_color('theory')" onMouseOut="javascript:change_gray('theory')">
				<center>Теория по курсу</center>
			</a></em>
		</td>
		<td width=25% align=center>
			<em><a href="/index.php?r=contents&type=3">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/practice_gray.jpg" id="practice" width="220" height="270" border="0" onMouseOver="javascript:change_color('practice')" onMouseOut="javascript:change_gray('practice')">
				<center>Практика</center>
			</a></em>
		</td>
		<td width=25% align=center>
			<em><a href="index.php?r=contents&type=4">
				<img src="<?php echo Yii::app()->request->baseUrl; ?>/images/question_gray.jpg" id="question" width="220" height="270" border="0" onMouseOver="javascript:change_color('question')" onMouseOut="javascript:change_gray('question')">
				<center>Контроль знаний</center>
			</a></em>
		</td>
	</tr>
	<tr>
		<td><center><em>Рабочая программа дисциплины</em></center></td>
		<td><center><em>Материалы для теоретического изучения дисциплины</em></center></td>
		<td><center><em>Материалы для практических занятий, лабораторного практикума по дисциплине</em></center></td>
		<td><center><em>Дополнительные средства для проверки усвоения материала, контроля полученных знаний</em></center></td>
	</tr>
</table>
</center>
