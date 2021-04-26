<?php 
    include 'connection.php';
    session_start();
    if (isset($_SESSION["username"])){
        $username = $_SESSION["username"];
        $sql = "select * from authentication where email = '$username';";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    if (isset($_POST['update'])){
        $id = $_POST['empid'];
        $name = $_POST['name'];
        $mob = $_POST['mobile'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        
        if (empty($name) || empty($mob) || empty($email) || empty($address)){
            $message = "All fields are required to fill";
        }
        else{
            $sql = "update authentication set Name = '$name', mobile = $mob, email = '$email', address = '$address' where id = $id;";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $count = $stmt->rowCount();
            if ($count>0){
                $message = "Updated succesfully";
            }
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Home page</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    
    <style>
        img{
            height: 30vh;
            width: 30vh;
            text-align: center;  
            border-radius: 50%
        }
    </style>
    <link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
	integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
	crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script src="https://code.iconify.design/1/1.0.7/iconify.min.js"></script>

  <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
    <link href="webfolder/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
     <link href="webfolder/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
     <link href="webfolder/lib/animate/animate.min.css" rel="stylesheet">
     <link href="webfolder/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
     <link href="webfolder/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
     <link href="webfolder/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
    <link href="webfolder/css/style.css" rel="stylesheet">
</head>

<body>
  <!--==========================
  Header
  ============================-->
  <header id="header">
    <div class="container">

      <div class="logo float-left">
        <h1 class="text-light"><a class="scrollto"><span>Welcome to Portal</span></a></h1>
      </div>

      <nav class="main-nav float-right d-none d-lg-block nav-menu">
        <ul>
            <li class="drop-down"><?php echo $result['Name'];?>
                <?php 
                
                if ($result['role'] == "admin"){?>
                    <ul>
                        <li><a href="table.php">Update and delete profile</a></li>
                        <li><a href = "logout.php">Logout</a></li>
                    </ul>
                <?php }
                else{ ?>
                    <ul>
                        <li><a href = "logout.php">Logout</a></li>
                    </ul>
                <?php } 
                ?>
            </li>
          </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!--=============================================Intro Section==========================================-->
  <section id = "intro" class="clearfix">
    <div class="container-fluid ">
      <div class="row justify-content-center align-self-center">
            <div class="col-md-12 intro-info order-md-first order-last"><br>
                <h2 class="row justify-content-center">Delete, Update and view<span>&nbsp;any profile of an employee </span></h2>
            </div>
        </div>
      </div>
            
      <div class="container">
        <div class="col-md-12 intro-img order-md-last order-first">
            
				
            <form method="post" >
	
					
                <br><br>
                <?php 
                
                if ($result['role'] == "admin"){?>
                    <div class="form-row">
                            <div class="col-md-4">
                                <div class="col-md-12 mb-3" style="text-align: center;">

                                    <img src="<?php echo $result['image'];?>">
                                </div>
                            </div>
                        <div class="col-md-2"></div>
                            <div class = "col-md-5">
                                <div class="col-md-12 mb-3" data-aos="fade-up">
                                    <label class="col-md-6">Emp ID: </label>
                                    <label><?php echo $result['Id'];?></label>
                                </div>
                                <div class="col-md-12 mb-3" data-aos="fade-up">
                                    <label class="col-md-6">Name: </label>.
                                    <label><?php echo $result['Name'];?></label>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="col-md-6">Mobile: </label>
                                    <label><?php echo $result['mobile'];?></label>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label class="col-md-6">Email: </label>
                                    <label><?php echo $result['email'];?></label>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="col-md-6">Address: </label>
                                    <label><?php echo $result['address'];?></label>
                                </div>
                            </div>
                    </div>
            </form>
                <?php }
                else{ ?>
                <form method="post">    
                <br><br>
                <div class="form-row">
                        <div class="col-md-2">
                            <div class="col-md-12 mb-3" style="text-align: center;">
                                <img src="<?php echo $result['image'];?>">
                            </div>
                        </div>
                    <div class="col-md-2"></div>
                        <div class = "col-md-8">
                            <div class="col-md-12 mb-3" data-aos="fade-up">
                                <label class="col-md-2">Emp ID: </label>
                                <input name="empid" value="<?php echo $result['Id'];?>" class="col-md-8" readonly>
                            </div>
                            <div class="col-md-12 mb-3" data-aos="fade-up">
                                <label class="col-md-2">Name: </label>.
                                <input value="<?php echo $result['Name'];?>" class="col-md-8" name="name">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="col-md-2">Mobile: </label>
                                <input value="<?php echo $result['mobile'];?>" class="col-md-8" name="mobile">
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="col-md-2">Email: </label>
                                <input value="<?php echo $result['email'];?>" class="col-md-8" name="email">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="col-md-2">Address: </label>
                                <textarea style="resize:none;" class="col-md-8" name="address"><?php echo $result['address'];?></textarea>
                            </div>
                            <div class="col-md-12 mb-3" style="text-align:right;">
                                <input type = "submit" class="btn btn-primary form-control" name="update" value="Update">
                                <br>
                                <label class="text-success"><?php 
                                    if(isset($message)){
                                        echo $message;
                                    }?></label>
                            </div>
                        </div>
                </div>
            </form>
                
            <?php }?>
           
          </div>
      </div>
    </section>
</body>
</html>
