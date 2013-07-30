<?php
class MysqlDrive {
	protected $link;
	protected $sqlcode;
	protected $stmt;
	public function connectSql($sqlName, $username, $password,$dbname) {
		$this->link = mysql_connect ( $sqlName, $username, $password );
		if (! $this->link)
			return 'Could not connect: ' . mysql_error ();
		else
		{
			mysql_select_db($dbname,$this->link);
			return $this->link;		
		}
	}
	public function sqlorder($order) {
		$return=mysql_query ( $order, $this->link );
		if (!$return)
			return "Could not do order:".mysql_errno();
		else
			return $return;
	}
	
	public function connectsqlSafe($sqlName,$username,$password,$dbname)
	{
		$this->link=new PDO('mysql:host='.$sqlName.';dbname='.$dbname.'', $username, $password);
		return $this->link;
	}
	public function connectsqlSafeExec($order)
	{
		$this->link->exec($order);
	}
	public function connectsqlSafePrepare($order)
	{
		$this->sqlcode=$order;
		$this->stmt=$this->link->prepare($order);
		return $this->stmt;
	}
	public function connectsqlSafeExecute()
	{	    
		$this->stmt->execute();
	    return $this->stmt->fetchAll();
	}
	public function connectsqlSafeBindParam($parameter,$variable)
	{
		$this->stmt->bindParam($parameter, $variable);
	}
	
	public function getlink()
	{
		return $this->link;
	}
}