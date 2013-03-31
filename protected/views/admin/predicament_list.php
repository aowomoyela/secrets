<?php
	echo "<ul>";
	foreach ($predicaments as $predicament) {
		echo '<li><a href="';
		echo Yii::app()->createUrl('admin/edit', array('what'=>'predicament', 'predicament_id'=>$predicament->get('predicament_id')));
		echo '">'.$predicament->get('predicament_name').'</a></li>';	
	}
	echo "</ul>";
?>