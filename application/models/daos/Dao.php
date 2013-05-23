<?php
class Dao {
    public function __construct($qualifier = NULL, $onlyActive = FALSE) {
        unset($this->table);
        
        if (is_null($qualifier)) 
            return;
            
        $conditional = array();

        if (is_numeric($qualifier))
            $conditional = array('id'=>$qualifier);
        else if (is_array($qualifier))
            $conditional = $qualifier;
        else
            throw new Exception('Invalid type of qualifier given');

        if ($onlyActive)
            $conditional['active'] = 1;
        
        $this->populate($conditional);
    }
    
    public function getObjectArray($qualifier=array(), $paging=null, $onlyActive = false) {
        if (is_null($qualifier))
            $conditional = array();
        else if (is_numeric($qualifier))
            $conditional = array('id'=>$qualifier);
        else if (is_array($qualifier))
            $conditional = $qualifier;
        else
            throw new Exception('Invalid type of qualifier given');

        if ($onlyActive)
            $conditional['active'] = 1;
        
        return $this->populate($conditional, TRUE, $paging);
    }
    
    protected function populate($conditional, $returnArray = FALSE, $paging=NULL) {
        $connection = Db::factory();
        $table = get_class($this);
        
        if (count($conditional) == 0)
            $sql = "select * from {$table}";
        else {
            $sql = "select * from {$table} where ";
            $qualifier = '';

            foreach ($conditional as $column=>$value) {
                if (!empty($qualifier))
                    $qualifier .= ' and ';
                $qualifier .= "`{$column}`=" . $connection->cleanAndQuote($value);
            }

            $sql .= $qualifier;
        }
        
        if ( !is_null($paging) )
            $sql .= $connection->pagingPostfix($paging);
        
        //$logger->debug('Dao: populate: sql='.$sql );
        
        if ($returnArray) {
            $return = $connection->getObjectArray($sql, get_class($this));
            //$logger->debug('DAO: populate: ObjectArray='.print_r($return, true) );
            return $return;
        }
        $connection->getObject($sql, $this);
        //$logger->debug('DAO: populate: properties='.print_r($this, true) );
    }

    public function save() {
        //$logger->info('save');
        if ( isset($this->id) ) {
            //$logger->info('update');
            $this->update();
        }
        else {
            //$logger->info('create');
            $this->create();
        }
    }

    protected function create() {
        $connection = Db::factory();

        $clean = array();
        foreach ((array)$this as $value)
            $clean[] = $connection->cleanAndQuote($value);

        $table = get_class($this);
        $sql = "insert into {$table} (`";
        $sql .= implode('`, `', array_keys((array)$this) );
        $sql .= '`) values (';
        $sql .= implode(', ', $clean);
        $sql .= ')';

        $this->id = $connection->insertGetID($sql);
    }

    protected function update() {
        $connection = Db::factory();

        $table = get_class($this);
        $sql = "update {$table} set ";

        $updates = array();
        foreach ((array)$this as $key=>$value)
            $updates[] = "`{$key}`=" . $connection->cleanAndQuote($value);

        $sql .= implode(',', $updates);
        $sql .= "where id={$this->id}";

        $connection->execute($sql);
    }
}
?>