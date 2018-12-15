<?php
include_once 'autoloader.php';

try{
	$start = new Start();
	$start->init(); //


}
catch (PDOException $e){
    echo "DB is not available";
    var_dump($e->getTrace());
}
catch (Exception $e){
    echo $e->getMessage();
}