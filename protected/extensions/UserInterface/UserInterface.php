<?php
class UserInterface {
	
	public static function flavor_text() {
		// Set up an array of a set format.
		$return_array = array(
			'title'=>'',
			'text'=>'',
			'image'=>'',
		);
		
		// Complicated flavor-text determination yet to be determined.
		if ( Yii::app()->user->isGuest ) { /* Maybe I'll provide these values later. */ }
		else {
			
			$return_array['title'] = "...";
			$return_array['text'] = "<p>Old volumes shake their vellum heads<br />And tantalize, just so.</p>";
			
		}
		
		// Return the array.
		return $return_array;
	}
	
}
?>