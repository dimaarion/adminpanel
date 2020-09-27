<?php
class DSelect
{
    public $db;
    public $tables;


    public function __construct($tables)
    {
        $this->db = new Database();
        $this->tables = $tables;



    }

    public function queryRow($where, $id)
    {

        $where = $where.'=?';
        $tables = $this->tables;
        $arr =  $this->db->getRow("SELECT * FROM $tables WHERE $where", [$id]);
        $this->db->Disconnect();
        return $arr;
    }

    public function queryRows()
    {
        $tables = $this->tables;
        $arr =  $this->db->getRows("SELECT * FROM $tables");
        $this->db->Disconnect();
        return $arr;
    }

    public function queryRowsLimit($category, $unlinck, $min = 0, $max = 5)
    {
        if(!$category){
            $category = '/' ;
        }
        $tables = $this->tables;
        if($unlinck !== 'page'){
            $arr =  $this->db->getRows("SELECT * FROM $tables WHERE  category = '$category' AND unlinck = '$unlinck'  LIMIT $min, $max");
        }else{
            $arr =  $this->db->getRows("SELECT * FROM $tables WHERE  category = '$category' LIMIT $min, $max");
        }

        $this->db->Disconnect();
        return $arr;
    }

    public function queryRowJ($wheres,$id)
    {
        $tables = $this->tables;
        $arr =  $this->db->getRow("SELECT * FROM $tables WHERE $wheres",[$id]);
        $this->db->Disconnect();
        return $arr;
    }


}
