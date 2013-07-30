<?php
 class ControllerAction extends ControllerDrive
 {
 	public function getGet($name)
 	{
 		$this->DataOperate();
 		return $this->Data->getGet($name);
 	}
 	public function getPost($name)
 	{
 		$this->DataOperate();
 		return $this->Data->getPost($name);
 	}
 	
 	public function loadView($name)
 	{
 		$this->ViewOperate();
 		$this->View->start($name);
 	}
 	public function render($variable,$value)
 	{
 		$this->View->render($variable, $value);
 	}
 	public function renderArray($variable)
 	{
 		$this->View->renderArray($variable);
 	}
 	
 	public function display()
 	{
 		if ($this->View->display()==0)
 			$this->errorOperate();
 	}
 	
 	public function includeSqlFile($name)
 	{
 		require_once APPLICATION_PATH.'/models/'.$name.'models.php';
 	}
 }
