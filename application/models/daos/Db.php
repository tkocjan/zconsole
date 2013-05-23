<?php
abstract class Db
{
    public static function factory($type=DB_INTERFACE)
    {
        return call_user_func(array($type, 'getInstance'));
        //return call_user_func(array('MySqliCient', 'getInstance'));
    }

    abstract public function execute($query);
    abstract public function getArray($query);
    abstract public function insertGetID($query);
    abstract public function cleanAndQuote($string);
    abstract public function getObject($query, $obj);
    abstract public function getObjectArray($query, $className);

    //giving a default for MySql, better override if yours is diff
    public function pagingPostfix($paging=NULL) {
        if ( is_null($paging) )
            return '';
        
        $post = '';
        if ( !empty($paging->sidx) ) {
            $post = ' ORDER BY '. $paging->sidx. ' ';
            if ( empty($paging->sord) )
                $post .= ' ASC ';
            else {
                $post .= ' '.$paging->sord.' ';
            }
        }
        if ( empty($paging->page) ) {
            if ( !empty($paging->limit) ) {
                $post .= ' LIMIT '.$paging->limit.' ';
            }
            return $post;
        }
        
        if ( !empty($paging->limit) ) {
            $post .= ' LIMIT '.($paging->page-1)*$paging->limit.','.$paging->limit;
        }
        return $post;
    }
}
?>