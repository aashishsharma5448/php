<!DOCTYPE html>
<html>
<head>
	<title>Employee Portal</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    
</head>
    
    
    
    <!--................................................. body section...........................-->
<body>

<div class="container" id="container">
<div class="form-container addnewemp-container">
    
    <!--...................................... Add Employee section..........................-->

<form action="insert.php" method="post" enctype="multipart/form-data">
    <h1>Add New Employee</h1>
	<span>Enter the details of Employee</span>
    <br>
    <br>
    <input type="number" name="id" placeholder="Employee Id">
	<input type="text" name="name" placeholder="Name">
	<input type="email" name="email" placeholder="Email">
    <input type="text" name="mobile" placeholder="Mobile">
    <input type="file" name="files" id="file">
    <textarea type="text" name="address" placeholder="Address"></textarea>
    <br>   
    
    <span id='message'><?php echo @$status?></span>
    <br>
	<input type="submit" value="Submit" name="addemp">
</form>
</div>
    
    <!--...................................... Employee details section..........................-->
<div class="form-container check-container">
	<form action="fetch.php" method="post">
		<h1>Enter EmployeeId</h1>
        <span>Check your's Employee Details</span>
        <br>
        <br>
        <input type="number" name="empid" placeholder="Employee Id">  
        <br>
        <br>    
        <img src="D://xampp/htdocs/crud/uploads/<?php echo (!empty($result)?$result[5]:""); ?>" style="width: 90px; height: 90px;">
        <label style="text-align:right;">Name :&nbsp;&nbsp; <?php echo (!empty($result)?$result[1]:"");?></label>
        <label>Email :<?php echo (!empty($result)?$result[2]:"");?></label>
        <label>Mobile :<?php echo (!empty($result)?$result[3]:"");?></label>
        <label>Address :<?php echo (!empty($result)?$result[4]:"");?></label>
        <span id='message'><?php echo @$printmsg?></span>
        
        <a href="Update.php">Edit the details</a>

        <input type="submit" value="Submit" name="details" >
	</form>
</div>
    
    
    
    <!--...................................... Lay Section..........................-->
<div class="overlay-container">
	<div class="overlay">
		<div class="overlay-panel overlay-left">
			<h1>Welcome Back!</h1>
			<p>Check the details of Employee by Employee Id.</p>
			<button class="ghost" id="checkempdetails">Check Employee Details</button>
		</div>
		<div class="overlay-panel overlay-right">
			<h1>Hello</h1>
			<p>Enter the details of Employee to be a part of Netprophets Cyberworks Pvt. Ltd. family.</p>
			<button class="ghost" id="addnewemp">Add new Employee</button>
		</div>
	</div>
</div>
</div>

<script type="text/javascript">
	const signUpButton = document.getElementById('addnewemp');
	const signInButton = document.getElementById('checkempdetails');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});
	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>


</body>
</html>
    
    
    
    