<?php
class Database {
    private $dsn = "mysql:host=localhost;dbname=store;charset=utf8";
    private $user = "root";
    private $password = "root";
    public $PDO;
    function __construct() {
        try{
			$this->PDO = new PDO($this->dsn, $this->user, $this->password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} catch(PDOException $e){
			echo $e->getMessage();
		}
    }
    public function connect() {
        return $this->PDO;
    }
}

?>