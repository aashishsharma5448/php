<?php   
    include 'connection.php';

    if (isset($_POST['addemp'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];
        $files = $_FILES['files'];
        
        
        
        
        
        
        
        
        if (empty($id) || empty($name) || empty($mobile) || empty($address) || empty($email) || empty($files)){
                    $status = "All fields are compulsory";
            }
        else {
            if(strlen($name) >= 26 || !preg_match("/^[a-zA-Z-'\s]+$/", $name)) { $status = "Please enter a valid name";} 
            else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) { $status = "Please enter a valid email";}
            else if (strlen($address) >= 101) { $status = "Please enter a valid Address";}
            else if (strlen($id)>=6){ $status = "Please Enter the Valid Employee ID.";}
            else if (strlen($mobile)>=11){ $status ="Please Enter the Mobile Number";}
            else{
                $sql = "Insert into emp values (:id, :name, :email, :mobile ,:address,:image);";
                $stmt = $conn->prepare($sql);
    $stmt->execute(['id'=>$id,'name'=>$name,'mobile'=>$mobile,'email'=>$email,'address'=>$address,'image'=>$destinationfile]);
                echo "Data saved Successful";
                }
            }
        }  
        
?>