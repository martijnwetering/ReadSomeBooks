<html>
<head>
    <title>Perfect PHP Pagination</title>
</head>
<body>
<?php
$dbhost = 'localhost';
$dbuser = 'root'; // Database Username
$dbpass = 'rootpassword'; // Databse Password
$record_limit = 10; // No of Record Want to show in one page

$connection = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $connection )
{
    die('Could not connect to database: ' . mysql_error());
}
mysql_select_db('test_db');
/* Get total number of records */
$sql = "SELECT count(emp_id) FROM employee ";
$query = mysql_query( $sql, $connection );
if(! $query )
{
    die('Could not get data: ' . mysql_error());
}
$result = mysql_fetch_array($query, MYSQL_NUM );
$rec_count = $result[0];

if( isset($_GET{'pageno'} ) )
{
    $pageno = $_GET{'pageno'} + 1;
    $offset = $record_limit * $pageno ;
}
else
{
    $pageno = 0;
    $offset = 0;
}
$left_record = $rec_count - ($pageno * $record_limit);

$sql = "SELECT * FROM employee LIMIT $offset, $record_limit";

$query = mysql_query( $sql, $connection );
if(! $query )
{
    die('Could not get data: ' . mysql_error());
}
while($result = mysql_fetch_array($query, MYSQL_ASSOC))
{
    echo "EMP ID :{$result['emp_id']}  <br /> ".
        "EMP NAME : {$result['emp_name']} <br /> ".
        "EMP SALARY : {$result['emp_salary']} <br /> ".
        "--------------------------------<br>";
}

if( $pageno > 0 )
{
    $last_record = $pageno - 2;
    echo "<a href="$_PHP_SELF?pageno=$last_record">Last 10 Records</a> |";
   echo "<a href="$_PHP_SELF?pageno=$pageno">Next 10 Records</a>";
}
else if( $pageno == 0 )
{
    echo "<a href="$_PHP_SELF?pageno=$pageno">Next 10 Records</a>";
}
else if( $left_record < $record_limit )
{
    $last_record = $pageno - 2;
    echo "<a href="$_PHP_SELF?pageno=$last_record">Last 10 Records</a>";
}
mysql_close($connection);
?>