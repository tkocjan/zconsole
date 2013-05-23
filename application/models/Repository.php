<?php

abstract class Application_Model_Repository 
        implements Application_Model_IRepository {
    
    protected $_entityClassName;
    protected $_tableName;
    protected $_dbAdapter;
    
    public function __construct(Db $dbAdapter = null) {
        if (is_null($dbAdapter)) {
            $this->_dbAdapter = Db::factory();
        } 
        else {
            $this->_dbAdapter = $dbAdapter;
        }
        
        if (!isset($_entityClassName))
            $_entityClassName = 'stdClass';
        
        if (!isset($_tableName))
            throw new Exception(__CLASS__.': $_tableName must be initialized');
    }
    
    abstract public function create();
    abstract public function findOne($id);
    abstract public function findManyBy($array);
    abstract public function persist($entity);
    abstract public function remove($entity);
}
