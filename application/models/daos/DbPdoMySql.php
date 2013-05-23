<?php
class DbPdoMySql extends DbPdoAbstract implements SingletonInterface
{
    protected static $instance = null;

    public static function getInstance() {
        if (is_null(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    protected function __construct() {
        $dsn = 'mysql:host='.DB_HOSTNAME.';port='.DB_PORT.';dbname='.DB_DATABASE;
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        
        parent::__construct($dsn, DB_USERNAME, DB_PASSWORD, $options);
    }
}
?>