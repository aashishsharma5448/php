<?php
try{
        $conn = new PDO('mysql:host=localhost:3307;dbname=netprophets','root','');
    }catch(Exception $e){
        echo "Connection failed".$e->getMessage();
    }
?>