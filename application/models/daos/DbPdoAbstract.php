<?php
abstract class DbPdoAbstract extends Db
{
    protected $pdo;

    protected function __construct($dsn, $user, $pass, $options = NULL) {
        try {
            $this->pdo = new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            //$logger->info('PDOException: __construct: ' . $e->getMessage());
            throw $e;
        }
    }

    public function cleanAndQuote($string)
    {
        try {
            $return = $this->pdo->quote($string);
        } catch (PDOException $e) {
            //$logger->info('PDOException: clean: ' . $e->getMessage());
            throw $e;
        }
        return $return;
    }

    public function getArray($query)
    {
        try {
            $stmt = $this->pdo->query($query);
        } catch (PDOException $e) {
            //$logger->info('PDOException: getArray,query: ' . $e->getMessage());
            throw $e;
        }
        
        if (!$stmt) {
            return array();
        }
        
        try {
            $return = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            //$logger->info('PDOException: getArray,fetchAll: ' . $e->getMessage());
            throw $e;
        }
            
        return $return;
    }

    public function getObject($query, $obj = NULL) {
        if ($obj == NULL)
            $obj = new stdClass;
        try {
            $stmt = $this->pdo->query($query);
        } catch (PDOException $e) {
            //$logger->info('getRowsAsObjects,query: PDOException: ' . $e->getMessage());
            throw $e;
        }
        
        if (!$stmt) {
            return FALSE;
        }
        
        try {
            $stmt->setFetchMode(PDO::FETCH_INTO, $obj);
            $return = $stmt->fetch();
            $stmt->closeCursor();
        } catch (PDOException $e) {
            //$logger->info('getRowsAsObjects,fetch: PDOException: ' . $e->getMessage());
            throw $e;
        }
            
        return $return;
    }
    
    public function getObjectArray($query, $className = 'stdClass') {
        try {
            $stmt = $this->pdo->query($query);
        } catch (PDOException $e) {
            //$logger->info('getRowsAsObjects,query: PDOException: ' . $e->getMessage());
            throw $e;
        }
        
        if (!$stmt) {
            return array();
        }
        
        try {
            $raw = $stmt->fetchAll(PDO::FETCH_CLASS, $className);
        } catch (PDOException $e) {
            //$logger->info('getRowsAsObjects,fetchAll: PDOException: ' . $e->getMessage());
            throw $e;
        }
        
        if (count($raw) == 0 || !isset($raw[0]->id) )
            return $raw;
        
        $processed = array();
        foreach ($raw as $key=>$value) {
            $processed[$value->id] = $value;
        }
        unset($raw);
            
        return $processed;        
    }
    
    public function execute($query)
    {
        try {
            $numRows = $this->pdo->exec($query);
        } catch (PDOException $e) {
            //$logger->info('PDOException: execute: ' . $e->getMessage());
            throw $e;
        }
        
        return $numRows;
    }

    public function insertGetID($query)
    {
        $this->execute($query);
        try {
            $id = $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            //$logger->info('PDOException: insertGetId: ' . $e->getMessage());
            throw $e;
        }
        
        return $id;
    }
}
?>