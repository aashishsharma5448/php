<?php
    include 'connection.php';
    if (isset($_POST['submit'])){
        $name = $_POST['Name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $role = $_POST['role'];
        $files = $_FILES['image'];
        $address = $_POST['address'];
        $password = $_POST['pwd'];
        $cpassword = $_POST['cpwd'];
        
        if (empty($name) || empty($email) || empty($mobile) || empty($role) || empty($files) || empty($address) || empty($cpassword) || empty($password)){
            $message = "All fields are compulsory";
        }
        else{
            if ($cpassword != $password){
                $message = "Password does not match";
            }
            else{
                $filename = $files['name'];
                $fileerror = $files['error'];
                $filetemp = $files['tmp_name'];

                $ext = explode ('.',$filename);
                $filecheck = strtolower(end($ext));
                $fileextstored = array('png','jpg','jpeg');

                if (in_array($filecheck,$fileextstored)){
                    $destination = "webfolder/img/".$filename;
                    move_uploaded_file($filetemp,$destination);
                }
                $sql = "insert into authentication(Name,email,mobile,password,image,role,address) values
                ('$name','$email',$mobile,'$password','$destination','$role','$address');";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $count = $stmt->rowCount();
                if ($count>0){
                    $message = "Updated succesfully";
                }
                $name = "";
                $email = "";
                $mobile = "";
                $role = "";
                $files = "";
                $address = "";
                $password = "";
                $cpassword = "";
            }
            header("location:login.php");
        }
    }

?>


<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     
        <link rel="stylesheet" href="css/login_style.css">
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        <style>
            body{
                background-image: linear-gradient(rgba(0,0,0,0.4),rgba(0,0,0,0.4)),url(bg-2.jpg);
                background-position: center;
                background-size: cover;
                padding-top:10vh;	
            }
            form{
                background: #fff;
            }
            .form-container{
                border-radius: 10px;
                padding: 5px 30px 2px 30px;
                
            }
            textarea{
                resize: none;
            }
        </style>
    </head>
 
    <body>

        <section class="container-fluid">
            <section class="row justify-content-center">
                <section class="col-12 col-sm-8 col-md-8">
                    <form class="row g-3 form-container" method="post"  enctype="multipart/form-data">
                        <div class="col-md-12 form-group">
                            <h4 class="text-center font-weight-bold"> SignUp </h4>
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" placeholder="Enter your name" name="Name">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" placeholder="Enter your email" name="email">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Mobile</label>
                            <input type="text" class="form-control" placeholder="Enter your mobile" name="mobile">
                        </div>
                        
                        <div class="col-md-6 form-group">
                            <label>Profile Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" placeholder="Enter password" name="pwd">
                        </div>
                        
                        <div class="col-md-6 form-group">
                          <label>Confirm Password</label>
                         <input type="password" class="form-control" placeholder="Confirm password" name="cpwd">
                        </div>
                        <div class="col-md-12 form-group">
                                <label>Select your Role  </label>
                                <select class="form-control" name="role">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                        </div>
                        
                        <div class="col-md-12 form-group">
                            <label>Address</label>
                            <textarea class="form-control" name="address"></textarea>
                        </div>
                        <div class="col-md-12 form-group">
                            <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
                            <label class="text-danger"><?php if(isset($message)){
                                    echo $message;}?>
                            </label>
                        </div>
                        
                        
                        <div class="col-md-12 form-footer">
                          <p> have an account <a href="login.html">Login</a> here</p>

                        </div>
                    </form>
                </section>
            </section>
        </section>

    </body>
</html>