<?php
require_once('database.php');
class Resources
{
    public $resource_id;
    public $resource_name;
    public $one_unit_size;
    public $measuring_unit;
    public $total;
    public $available;
    public $vendor_id;

    //function for selecting result whether id is provided or not
    public static function select_query($id='')
	{
	global $database;
	$q=$id?"select * from resources where id={$id}":"select * from resources";
	$result=$database->query($q);
	return $result;
	}

    public static  function find_all_resources()
	{
		$resources=[];
		global $database;
		$result=self::select_query();
		while ($row=$result->fetch()) {
			$resources[]=self::getObject($row);
		}
		return !empty($resources)?$resources:false;
	}

    public static  function find_resource_by_id($id)
	{
		global $database;
		$result=self::select_query($id);
		$row=$result->fetch();
		return $row?self::getObject($row):false;
	}

	public static function find_resource_by_name($resource_name)
	{
		$total=0;
		$available=0;
		global $database;
		$q="select sum(total) as total,sum(available) as available from resources where resource_name=?";
		$result=$database->query($q,array($resource_name));
		$row=$result->fetch();
		$total=$row['total'];
		$available=$row['available'];
		return array($total,$available);
	}

	public static function find_resources_by_vendor_id($vendor_id)
	{
		$resources=[];
		global $database;
		$q="select * from resources where vendor_id=?";
		$result=$database->query($q,array($vendor_id));
		while ($row=$result->fetch()) {
			$resources[]=self::getObject($row);
		}
		return $resources;

	}

    public static function getObject($row)
	{
		$resource=new Resources();
		foreach ($row as $key => $value) {
		if($resource->checkKey($key))
				{
				$resource->{$key}=$value;
				}
			}
		return $resource;
	}
	public static function update_resource_available_item($available,$resource_id)
	{
		global $database;
		$q="update resources set available=? where resource_id=?";
		$result=$database->query($q,array($available,$resource_id));
		if($result->rowCount()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public static function save_resource($resource_name,$one_unit_size,$measuring_unit,$total,$available,$vendor_id)
	{
		global $database;
		$q="insert into resources(resource_name,one_unit_size,measuring_unit,total,available,vendor_id) values(?,?,?,?,?,?)";
		$result=$database->query($q,array($resource_name,$one_unit_size,$measuring_unit,$total,$available,$vendor_id));
		if($result->rowCount()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	public  function checkKey($key)
	{
		$properties=get_object_vars($this);
		return array_key_exists($key, $properties);
	}

}
$resource=new Resources();