<?php
try{
        $conn = new PDO('mysql:host=localhost:3307;dbname=netprophets','root','5448');
    }catch(Exception $e){
        echo "Connection failed".$e->getMessage();
    }
?>