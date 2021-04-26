<?php
    function insertdata($array){
        $sql = "Insert into emp values (".$array[0].",".$array[1].",".$array[2].",".$array[3].",".$array[4].",".$array[5].");";
        $sql->execute();
    }

?>