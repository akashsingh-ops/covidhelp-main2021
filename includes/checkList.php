<?php
require_once('database.php');
class CheckList
{
    public static function generateQuery($arr)
    {
        $q = "SELECT vendor_id, orgname";
        foreach ($arr as $item) {
            $q .= ', `' . $item . '_available`, `' . $item . '_total`';
        }
        $q .= ', orgphoneno FROM (SELECT vendor_id';
        foreach ($arr as $item) {
            $q .= ", max(case when (resource_name='$item') then available else NULL end) as '" . $item . "_available'";
            $q .= ", max(case when (resource_name='$item') then total else NULL end) as '" . $item . "_total'";
        }
        $q .= " FROM resources group by vendor_id order by vendor_id) as res INNER JOIN vendor ON res.vendor_id = vendor.id";
        return $q;
    }

    public static function searchItems($arr)
    {
        global $database;
        $q = self::generateQuery($arr);
        $stmt = $database->query($q);
        return $stmt->fetchAll();

    }

}
