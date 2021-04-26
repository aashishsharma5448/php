<?php
    include 'connection.php'; 
    if (isset($_POST['details'])){
        $id = $_POST['empid'];
        $sql = "Select * from emp where id  = $id;";
        $stmt = $conn->prepare($sql);
        $stmt->execute(); 
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        print_r ($result);
    }
?>    