<?php
class Database {
    private $dsn = "mysql:host=localhost;dbname=store4;charset=utf8";
    private $user = "shah";
    private $password = "";
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