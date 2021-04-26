<html>
    <title>Student Form</title>
    <body>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            StudentId: 
            <input type="number" name = "id">
            <br>
            Student Name : <input type="text" name = "name">
            <br>
            Mobile: <input type="text" name = "mobile">
            <br>
            Address: <input type="text" name="add">
            <br>
            <input type="submit">
        </form>
        
        
        
    <?php 
            try {
                $conn = new PDO('mysql:host=localhost;dbname=Aashish', 'root', '5448');
                //$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'Cannot connect to database: ' . $e->getMessage();
            }

            $status="";
            if ($_SERVER["REQUEST_METHOD"] == "POST"){
                $ID = $_POST['id'];
                $name = $_POST['name'];
                $mobile = $_POST['mobile'];
                $Address = $_POST['add'];
                
                if (empty($ID) || empty($name) || empty($mobile) || empty($Address)){
                    $status = "All fields are compulsory";
                }
                else{
                    if (strlen($name)>=26 || !preg_match("/^[a-zA-Z-'\s]+$/", $name)) {
                        $status = "Please enter a valid name";
                    }
                    else if (strlen($Address)>=101){
                        $status = "Please Enter Valid Address";
                    }
                    else {
                        $sql = "Insert into student values (:id,:name,:mobile,:address);";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute(['id'=>$ID,'name'=>$name,'mobile'=>$mobile,'address'=>$Address]);
                        $status = "Record saved Successfully";
                        $ID = "";
                        $name = "";
                        $mobile = "";
                        $Address = "";
                    }
            }
            }
                
        ?>  
    </body>
</html>