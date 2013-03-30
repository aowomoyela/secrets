<?php
class SiteNav {
	
	public static function nav_bar() {
		$nav_bar_elements = array();
		// Construct navigation bar.
		$nav_bar_elements[] = CHtml::link('logout', Yii::app()->createUrl('site/logout'));
		// Construct a <ul>.
		$nav_bar = '<ul>';
		foreach ($nav_bar_elements as $link) {
			$nav_bar.= '<li>'.$link.'</li>';
		}
		$nav_bar.= '</ul>';
		// Return the constructed navigation list.
		return $nav_bar;
	}
	
}
?>