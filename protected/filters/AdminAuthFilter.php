<?php
class AdminAuthFilter extends CFilter {

	protected function preFilter($filterChain) { // Logic applied before the action is run.
		// If the user is not an administrator, redirect them to somewhere safe.
		// Hacky, for now.  I'll expand this later.
		if ( Yii::app()->user->isGuest ) {
			Yii::app()->request->redirect( Yii::app()->createUrl('site/login') );
		} elseif ( Yii::app()->user->Id != 1 ) {
			Yii::app()->request->redirect( Yii::app()->createUrl('game/predicament') );
		} else { return true; }
	}
	
	
}
?>