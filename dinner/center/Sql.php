<?php
class Sql {
	protected $sql;
	public function __construct($sqlname) {
		if (file_exists(APPLICATION_ENV . '/Sql/' . $sqlname . 'Drive.php')) {
			require_once 'Sql/' . $sqlname . 'Drive.php';
			$obj = $sqlname . 'Drive';
			$this->sql = new $obj ();
		}
	}
	public function getSql() {
		return $this->sql;
	}
	public function connectSql($sqlName, $username, $password,$dbname) {
		return $this->sql->connectSql ( $sqlName, $username, $password ,$dbname);
	}
	public function sqlorder($order) {
		return $this->sql->sqlorder ( $order );
	}
	public function connectsqlSafe($sqlName,$username,$password,$dbname)
	{
		return $this->sql->connectsqlSafe($sqlName,$username,$password,$dbname);
	}
	public function connectsqlSafeExec($order)
	{
		$this->sql->connectsqlSafeExec($order);
	}
	public function connectsqlSafePrepare($order)
	{
	    return $this->sql->connectsqlSafePrepare($order);
	}
	public function connectsqlSafeExecute()
	{
		return $this->sql->connectsqlSafeExecute();
	}
	public function connectsqlSafeBindParam($parameter,$variable)
	{
		return $this->sql->connectsqlSafeBindParam($parameter,$variable);
	}
	public function getlink()
	{
		return $this->sql->getlink();
	}
}