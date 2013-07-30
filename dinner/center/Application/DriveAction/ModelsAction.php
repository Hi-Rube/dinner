<?php
  class ModelsAction extends ModelsDrive
  {
  	public function MysqlStart()
  	{
  		$this->start('Mysql');
  	}
  	public function connectByConfig()
  	{
  		$data=json_decode(file_get_contents(APPLICATION_PATH.'/configs/config.json'),true);
  		return $this->sql->connectsql($data['sqladdress'], $data['sqlname'], $data['sqlpassword'],$data['dbname']);
  	}
  	public function connectSafeByConfig()
  	{
  		$data=json_decode(file_get_contents(APPLICATION_PATH.'/configs/config.json'),true);
  		return $this->sql->connectsqlSafe($data['sqladdress'], $data['sqlname'], $data['sqlpassword'],$data['dbname']);
  	}
  	public function connectsqlDirect($sqlName,$username,$password,$dbname)
  	{
  		return $this->sql->connectsql($sqlName, $username, $password,$dbname);
  	}
  	public function postOrder($order)
  	{
  	    return $this->sql->sqlorder($order);
  	}
  }