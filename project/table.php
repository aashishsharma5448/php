<?php
    include 'connection.php';
    session_start();

    if (isset($_SESSION["username"])){
        $username = $_SESSION["username"];
        $sql = "select * from authentication where email = '$username';";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch(PDO::FETCH_ASSOC);
    }



    $sql = "select * from authentication;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $results = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>User records</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    
    
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
        <h1 class="text-light"><a href="#intro" class="scrollto"><span>Records of Netprophets Cyberworks</span></a></h1>
      </div>

      <nav class="main-nav float-right d-none d-lg-block nav-menu">
        <ul>
            <li class="drop-down"><a href=""><?php echo $res['Name']; ?></a>
            <ul>
                <li><a href = "adminhome.php">Home</a></li>
                <li><a href = "logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
      </nav><!-- .main-nav -->
      
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" class="clearfix">
    <div class="container-fluid d-flex h-100">
      <div class="col-md-12 row justify-content-center align-self-center">
        <div class="col-md-3 intro-info order-md-first order-last">
          <h2>User <span>records</span></h2>
        </div>
  
        <div class="col-md-9 intro-img order-md-last order-first">
            <div class="Section-title">
                <h2>Update and Delete the User Records</h2>
            </div>
            <form>
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">EmpId</th>
							<th scope="col">Name</th>
							<th scope="col">Mobile</th>
							<th scope="col">Email</th>
                            <th scope="col">Address</th>
                            <th scope="col">Update and Delete</th>
						</tr>
					</thead>
                    
					<tbody>
                        <?php
                            foreach($results as $result){
                                $id = $result['Id'];
                                $encryption = openssl_encrypt($id, "AES-128-CTR", "role", 0, '1234567891011121');
                                $encyp = openssl_encrypt($res['Name'], "AES-128-CTR", "role", 0, '1234567891011121');
                                
                                ?>
						<tr>
                            
							<td><?php echo $result['Id'];?></td>
							<td><?php echo $result['Name'];?></td>
							<td><?php echo $result['mobile'];?></td>
							<td><?php echo $result['email'];?></td>
                            <td><?php echo $result['address'];?></td>
                            <td><a href="update.php?id=<?php echo $encryption?>?name=<?php echo $encyp ?>">Click here</a></td>
                            <?php }?>
                            </tr>
                    </tbody>
				</table>
            </form>

			</div>
      </div>

    </div>
  </section><!-- #intro -->

  <main id="main">

   
  
  <!-- JavaScript Libraries -->
  <script src="webfolder/lib/jquery/jquery.min.js"></script>
  <script src="webfolder/lib/jquery/jquery-migrate.min.js"></script>
  <script src="webfolder/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="webfolder/lib/easing/easing.min.js"></script>
  <script src="webfolder/lib/mobile-nav/mobile-nav.js"></script>
  <script src="webfolder/lib/wow/wow.min.js"></script>
  <script src="webfolder/lib/waypoints/waypoints.min.js"></script>
  <script src="webfolder/lib/counterup/counterup.min.js"></script>
  <script src="webfolder/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="webfolder/lib/isotope/isotope.pkgd.min.js"></script>
  <script src="webfolder/lib/lightbox/js/lightbox.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="webfolder/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
      <script src="webfolder/js/main.js"></script>
    </main>

</body>
</html>
