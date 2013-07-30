<?php
class Application {
	protected $_environment;
	protected $_operating;
	protected $_applicationini;
	protected $_applicationPath;
	public function __construct($applicationPath, $configsPath) {
		$this->_applicationini = $configsPath;
		$this->_applicationPath = $applicationPath;
		$this->getURLData ();
	}
	public function run() {
		require_once APPLICATION_ENV . '/Application/ControllerDrive.php';
		require_once APPLICATION_ENV . '/Application/ViewDrive.php';
		require_once APPLICATION_ENV . '/Application/ModelsDrive.php';
		require_once APPLICATION_ENV . '/Application/DriveAction/ControllerAction.php';
		require_once APPLICATION_ENV . '/Application/DriveAction/ModelsAction.php';
		$application = new ControllerDrive ();
		$application->start ( $this->_operating ['action'], $this->_operating ['method'] );
	}
	protected function getURLData() {
		$this->_environment ['host'] = $_SERVER ['HTTP_HOST'];
		$path = explode ( '?', $_SERVER ['REQUEST_URI'] );
		$this->_environment ['path'] = $path [0];
		 if ($this->_environment ['path'][strlen($this->_environment ['path'])-1]=='/')
		   	$this->_environment['path']=substr($this->_environment['path'], 0,strlen($this->_environment ['path'])-1);
		$operate = explode ( '/', $this->_environment ['path'] );
		if (count ( $operate ) == 3) {
			$this->_operating ['action'] = $operate [count ( $operate ) - 2];
			$this->_operating ['method'] = $operate [count ( $operate ) - 1];
		} else if (strcmp ( $operate [count ( $operate ) - 3], "index.php" ) == 0) {
			$this->_operating ['action'] = $operate [count ( $operate ) - 2];
			$this->_operating ['method'] = $operate [count ( $operate ) - 1];
		} else {
			$this->_operating ['action'] = $operate [count ( $operate ) - 1];
			$this->_operating ['method'] = "index";
		}
		if ($this->_operating ['action']=='') {
			$this->_operating ['action'] = "index";
			$this->_operating ['method'] = "index";
		}
	}
}