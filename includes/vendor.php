<?php
require_once('database.php');
class Vendor
{
	public $id;
	public $orgname;
	public $orgemail;
	// public $orgpass;
	public $orgphoneno;
	public $orgaddress;
	public $orgtype;
	public $orgcity;
	public $status;

	public static function select_query($id='')
	{
	global $database;
	$q=$id?"select * from vendor where id={$id}":"select * from vendor";
	$result=$database->query($q);
	return $result;
	}

	public static  function find_all_vendor()
	{
		$vendor=[];
		global $database;
		$q="select * from vendor";
		$stmt=$database->query($q);
		$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
	}

// 	$stmt = $pdo->prepare("SELECT * FROM users LIMIT :limit, :offset");
// $stmt->execute(['limit' => $limit, 'offset' => $offset]); 
// $data = $stmt->fetchAll();
// // and somewhere later:
// foreach ($data as $row) {
//     echo $row['name']."<br />\n";
// }

	public static  function find_vendor_by_id($id)
	{
		global $database;
		$result=self::select_query($id);
		// $row=mysqli_fetch_assoc($result);
		$row=$result->fetch();
		return $row?self::getObject($row):false;
	}


	public function check_email_already_exists()
	{
		global $database;
		$q="select * from vendor where orgemail=?";
		$result=$database->query($q,array($this->orgemail));
		if($result->rowCount()>0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function create()
	{
	global $database;
	$q="insert into vendor(orgname,orgemail,orgphoneno,orgaddress,orgtype,orgcity) values(?,?,?,?,?,?)";

	    $result=$database->query($q,array($this->orgname,$this->orgemail,$this->orgphoneno,$this->orgaddress,$this->orgtype,$this->orgcity));

	    return $result;

	}

public function delete()
	{
		global $database;
		$q="delete from vendor where id=".$this->id;
		$result=$database->query($q);
		return $database->connection->affected_rows?1:0;

	}


	public static function getObject($row)
	{
		$vendor=new Vendor();
		foreach ($row as $key => $value) {
		if($vendor->checkKey($key))
				{
				$vendor->{$key}=$value;
				}
			}
		return $vendor;
	}

	public  function checkKey($key)
	{
		$properties=get_object_vars($this);
		return array_key_exists($key, $properties);
	}


}
?>