<div class="form">
	<div class="form_message"><?php echo isset($message) ? $message : ''; ?></div>
	<?php
		echo CHtml::beginForm( Yii::app()->createUrl('admin/edit', array('what'=>'predicament') ), 'post', array()); 
		echo CHtml::errorSummary($predicament);
		echo CHtml::activeHiddenField($predicament, 'predicament_id');
	?>
	
	<div class="form_row">
	<?php
		echo CHtml::activeLabel($predicament,'predicament_name');
		echo CHtml::activeTextField($predicament,'predicament_name');
	?>
	</div>
	
	<div class="form_row">
	<?php
		echo CHtml::activeLabel($predicament,'description');
		echo CHtml::activeTextArea($predicament,'description', array('rows'=>'20', 'cols'=>'75'));
	?>
	</div>
	 
	<div class="form_row submit">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>
	 
	<?php echo CHtml::endForm(); ?>
</div>