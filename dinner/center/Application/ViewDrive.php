<?php
class ViewDrive {
	protected $viewname;
	public function start($viewname) {
		$this->viewname = $viewname;
	}
	public function display() {
		if (file_exists ( APPLICATION_PATH . '/views/' . $this->viewname . '.phtml' )) {
			include_once APPLICATION_PATH . '/views/' . $this->viewname . '.phtml';
			return 1;
		} else
			return 0;
	}
	public function render($variable, $value) {
		$this->$variable = $value;
	}
	public function renderArray($variable) {
		foreach ( array_keys ( $variable ) as $value )
			$this->$value = $variable [$value];
	}
}


   