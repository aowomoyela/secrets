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
			$return_array['text'] = "<p>A Secret told&mdash;<br />Ceases to be a Secret&mdash;then&mdash;<br />A Secret&mdash;kept&mdash;<br />That&mdash;can appal but One&mdash;";
			$return_array['text'].= "<p>Better of it&mdash;continual be afraid&mdash;<br />Than it&mdash;<br />And Whom you told it to&mdash;beside&mdash;</p>";
			$return_array['text'].= "<p><cite>(Emily Dickinson)</cite></p>";

		}
		
		// Return the array.
		return $return_array;
	}
	
}
?>