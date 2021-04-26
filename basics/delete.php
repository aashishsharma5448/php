<?php

    include 'connection.php';
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $empid = $_POST['empid'];
            $sql = "delete from authentication where id = $empid;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count>0){
                $message = "Profile deleted Succesfully";
            }
    }
?>

<html>
    <head>
        <title>Delete a profile</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
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
                padding-top: 25vh;	
            }
            form{
                background: #fff;
            }
            .form-container{
                border-radius: 10px;
                padding: 30px;
            }
        </style>
    </head>
 
    <body>

        <section class="container-fluid">
            <section class="row justify-content-center">
                <section class="col-12 col-sm-6 col-md-4">
                    <form class="form-container" method="post">
                        
                        <div class="form-group input-icons">
                            <h4 class="text-center font-weight-bold"> Delete a profile </h4>
                            <label>Enter Employee ID </label>
                            <input type="text" class="form-control" name="empid" placeholder="Enter EmployeeId">
                        </div>
                        
                        <input type="submit" class="btn btn-primary btn-block" value="submit" name="submit">
                        <label class="text-success"><?php 
                            
                            if(isset($message)){
                                echo $message;
                            }
                            
                            $message = "";?></label>
                        <div class="form-footer">
                          <p><a href="adminhome.php">Return to main page</a></p>
                        </div>
                    </form>
                </section>
            </section>
        </section>

    </body>
</html>
