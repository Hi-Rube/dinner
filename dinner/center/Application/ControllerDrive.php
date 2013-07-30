<?php
class ControllerDrive {
	protected $class;
	protected $Data;
	protected $View;
	public function start($action,$method)
	{
		$this->ControllerOperate($action, $method);
	}
	public function checkURL($action, $method) {                
		if (class_exists ( $action . 'controller' )) {
			$class = new ReflectionClass ( $action . 'controller' );
			$instance = $class->newInstance ();
			if (method_exists ( $instance, $method."Action" )) {
				return 1;
			} else
				return 0;
		} else
			return 0;
	}
	public function errorOperate() {
		require_once APPLICATION_PATH . '/controllers/errorcontroller.php';
		$class = new ReflectionClass ( 'errorcontroller' );
		$instance = $class->newInstance ();
		$instance_method = $class->getMethod ( "init" );
		$instance_method->invoke ( $instance );
	}
	public function ControllerOperate($action, $method) {
		if (file_exists ( APPLICATION_PATH . '/controllers/' . $action . 'controller.php' )) {
			require_once APPLICATION_PATH . '/controllers/' . $action . 'controller.php';
			if ($this->checkURL ( $action, $method )) {
				$this->class = new ReflectionClass ( $action . 'controller' );
				$instance = $this->class->newInstance ();
				$instanceMethod = $this->class->getMethod ( 'init' );
				$instanceMethod->invoke ( $instance );
				$instanceMethod = $this->class->getMethod ( $method."Action" );
				$instanceMethod->invoke ( $instance );
			} else {
				$this->errorOperate ();
			}
		} else
			$this->errorOperate ();
	}	
	public function DataOperate()
	{
		require_once APPLICATION_ENV.'/Data.php';
		$this->Data=new Data();
	}
	public function ViewOperate()
	{
		require_once APPLICATION_ENV.'/Application/ViewDrive.php';
		$this->View=new ViewDrive();
	}
	
	
}