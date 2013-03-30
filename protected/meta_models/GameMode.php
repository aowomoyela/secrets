<?php
class GameMode {
	protected $mode = 'secrets';
	protected $submode = null;
	
	public function get($request) {
		$allowed = array('mode', 'submode');
		if ( in_array('request', $allowed) ) { return $this->$request; }
		else { return null; }
		
	}
	
	public function getHeader() {
		if ( is_null($this->submode) ) {
			// Select the header of the dominant mode.
			switch( $this->mode ) {
				case 'secrets':
				default:
					return 'a secret to [ tell ? hide ]';
				break;
			}
		} else {
			// Select the header of the submode.
			switch ( $this->submode ) {
				default:
					return "...";
				break;
			}
		}
	}
}
?>