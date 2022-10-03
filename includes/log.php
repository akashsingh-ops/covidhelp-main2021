<?php
require('database.php');
class Log
{
    public $log_id;
    public $resource_name;
    public $one_unit_size;
    public $measuring_unit;
    public $modified_at;
    public $updated_by;
    public $vendor_id;
    public $resource_id;
    public $total;
    public $available;
    public $action;

     //function for selecting result whether id is provided or not
     public static function select_query($id='')
     {
     global $database;
     $q=$id?"select * from log_table where id={$id}":"select * from log_table";
     $result=$database->query($q);
     return $result;
     }

     public static  function find_all_logs()
     {
         $logs=[];
         global $database;
         $result=self::select_query();
         while ($row=$result->fetch_assoc()) {
             $logs[]=self::getObject($row);
         }
         return !empty($logs)?$logs:false;
     }

     public static  function find_user_by_id($id)
	{
		global $database;
		$result=self::select_query($id);
		$row=$result->fetch_assoc();
		return $row?self::getObject($row):false;
	}

    public static function getObject($row)
	{
		$log=new Log();
		foreach ($row as $key => $value) {
		if($log->checkKey($key))
				{
				$log->{$key}=$value;
				}
			}
		return $log;
	}

	public  function checkKey($key)
	{
		$properties=get_object_vars($this);
		return array_key_exists($key, $properties);
	}
}
$log=new Log();