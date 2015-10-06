<?php
$dbname="clima";
$tablename="yali";

$query="SELECT * FROM (SELECT * FROM $tablename  ORDER BY ordenar DESC LIMIT 145) AS TempTable ORDER BY TempTable.ordenar ASC;";
$result=mysql_db_query ($dbname, $query, $link);
?>