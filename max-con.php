<?php

define('DB_HOST','127.0.0.1');
define('DB_USER','cwabalic_admin');
define('DB_PASSWORD','1sampai9');
define('DB_NAME','information_schema');

$mysqli = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
// Check connection
if ($mysqli -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
    exit();
}
echo "========================================================<br>";
echo "TOTAL Koneksi<br>";
echo "--------------------------------------------------------<br>";
$rs = $mysqli->query("SELECT host,count(host) FROM processlist GROUP BY host");
$data = mysqli_fetch_assoc($rs);
echo "<pre>";
print_r($data);
echo "</pre>";
echo "========================================================<br>";
// ====================================
echo "TOTAL Thread Connected<br>";
echo "--------------------------------------------------------<br>";
$rs = $mysqli->query("SELECT variable_value FROM GLOBAL_STATUS WHERE variable_name='threads_connected'");
$data = mysqli_fetch_assoc($rs);
echo "<pre>";
print_r($data);
echo "</pre>";
echo "========================================================<br>";
// =====================================
echo "Listing Proses<br>";
echo "--------------------------------------------------------<br>";
$rs = $mysqli->query("SELECT host,command,info FROM processlist");
while($row=mysqli_fetch_assoc($rs)){
    $processlist[] = $row['host'].' '.$row['command'].' '.$row['info'];
}
echo "<pre>";
print_r($processlist);
echo "</pre>";
echo "========================================================<br>";
// =====================================
echo "Max Connection<br>";
echo "--------------------------------------------------------<br>";
$rs = $mysqli->query("show variables like 'max_connections'");
$data = mysqli_fetch_assoc($rs);
echo "<pre>";
print_r($data);
echo "</pre>";
echo "========================================================<br>";
// =====================================
echo "Max User Connection<br>";
echo "--------------------------------------------------------<br>";
$rs = $mysqli->query("show variables like 'max_user_connections'");
while($row=mysqli_fetch_assoc($rs)){
    $data[] = $row;
}
echo "<pre>";
print_r($data);
echo "</pre>";
echo "========================================================<br>";

?>
