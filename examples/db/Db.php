<?php 
require_once "koneksi.php";
//$table_1 = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * from TB_BROKER"));
$table_1 = mysql_query($koneksi, "SELECT * from TB_BROKER");
$count_1 = mysql_num_rows($table_1);
if($count_1>0){
    while($row = mysql_fetch_assoc($table_1)){
        $brokerId = $row['broker_id'];
        $secret = $row['secret'];
        $brokers = array(
            $brokerId => array('secret'=>$secret)
        );
    }
}else{
    $brokers = 'You have no broker data listed in your database';
}
print "<pre>";
print_r($brokers);
print "<pre>";
?>