<?php
class ModelsDrive {
   protected $sql;
   public function start($name)
   { 
   	require_once APPLICATION_ENV.'\Sql.php';
   	$this->sql=new Sql($name);
   }
   
   public function connectsql($sqlName,$username,$password,$dbname)
   {
   	$this->sql->connectSql($sqlName, $username, $password,$dbname);
   }
   public function sqlorder($order) {
   	return $this->sql->sqlorder ( $order );
   }
   public function getsql()
   {
   	return $this->sql;
   }  
   public function getlink()
   {
   	return $this->sql->getlink();
   }
}
