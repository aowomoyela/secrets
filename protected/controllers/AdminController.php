<?php
class AdminController extends Controller {
	/********************************************/
	/* Behavioral and administrative functions. */
	/********************************************/
	// Apply filters
	public function filters() {
		$filters = array();
		// Restrict access to administrators.
		$filters[] = array('application.filters.AdminAuthFilter');
		return $filters;
	}
	
	// Control access.
	public function accessRules() {
		return array(
			//Deny access to anonymous ('?') users
			array('deny',
				'users' => array('?'),
			),
			
			//Allow access to authenticated ('?') users
			array('allow',
				'actions' => array(
					'edit',
					'list',
				),
				'users' => array('@'),
			),
			
			//Restrict all access not otherwise specified
			array('deny',
				'users' => array('*'),
			),
		);

	}
	
	/**************************/
	/* Actions, at long last. */
	/**************************/
	
	public function actionIndex() {
		// Landing page.
		$this->layout = 'admin_default';
		$this->render('index');
	}
	
	public function actionEdit() {
		// What are we editing?
	}
	
	public function actionList() {
		// What are we listing?
	}
	
	public function actionDebug() {
		$this->layout = 'admin_default';
		$this->render('debug');
	}
	
}
?>