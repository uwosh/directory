#!/usr/bin/php
<?php
require_once("config.php");
$db = mysqli_init();
$db->real_connect($hostname, $user, $password, $database);
$query = $db->prepare ("select distinct dept from directory_geninfo order by dept");
$query->execute();
$query->bind_result($dept);
while($query->fetch()){
    print $dept . "\n";
}

?>