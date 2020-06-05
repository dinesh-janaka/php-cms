<?php ob_start();

 //secure way to connect to databse 
$db['db_host'] = 'localhost';
$db['db_user'] = 'root';
$db['db_pass'] = 'mysql';
$db['db_name'] = 'cms';

foreach($db as $key => $value){
    // make uppercase constants
    define(strtoupper($key), $value);
    
    
}



$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//$connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

/*    if($connection){
        echo "we are connected";
    }

*/
?>