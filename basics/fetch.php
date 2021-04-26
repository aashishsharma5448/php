<?php
include 'connection.php';
    function fetch($empid){
        $sql = "select * from emp where id = :empid;";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['empid'=>$empid]);          
        $result = $stmt->fetch(PDO::FETCH_BOTH);
        return $result;
    }
?>