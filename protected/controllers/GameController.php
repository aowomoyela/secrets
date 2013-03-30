<?php
class GameController extends Controller {
	/********************************************/
	/* Behavioral and administrative functions. */
	/********************************************/
	
	public function filters() {
		$filters = array();
		return $filters;
	}

	public function accessRules() {
		return array(
			//Deny access to anonymous ('?') users
			array('deny',
				'actions' => array(
					'predicament',
				),
				'users' => array('?'),
			),
			
			//Allow access to authenticated ('?') users
			array('allow',
				'actions' => array(
					'predicament',
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
	
	public function actionPredicament() {
		$predicament = Predicament::model()->findByPk( Yii::app()->user->model->current_predicament );
		$this->layout = 'secret_default';
		$this->render('predicament', array('predicament'=>$predicament) );
	}
}
?>