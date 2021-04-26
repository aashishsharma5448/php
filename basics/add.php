<!DOCTYPE html>
<html>
<head>
<title>Reset your password</title>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet"
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="webfolder/img/logo.png" rel="icon">
    <link href="webfolder/img/logo.png" rel="apple-touch-icon">
<style>
@import
	url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

body {
	background: #f6f5f7;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 90vh;
	margin: 20px 10px 50px 10px;
}

h1 {
	font-weight: bold;
	margin: 0;
}

h2 {
	text-align: center;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
}

button {
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 100%;
	text-align: center;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

textarea{
    background-color: #eee;
	border: none;
    resize: none;   
    height: 100px;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container {
	background-color: #fff;
	border-radius: 10px;
	box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25), 0 10px 10px
		rgba(0, 0, 0, 0.22);
	position: relative;
	overflow: hidden;
	width: 900px;
	height: 600px;
	max-width: 100%;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.forgot-container {
	right: 0;
	width: 50%;
	z-index: 2;
}

@keyframes show { 0%, 49.99% {
	opacity: 0;
	z-index: 1;
}

	50%,100%
	{
	opacity:1;
	z-index:5;
	}
}
.overlay-container {
	position: absolute;
	top: 0;
	left: 0;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.overlay {
	background: #FF416C;
	background: linear-gradient(to right, #FF4B2B, #FF416C, #ffffff);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: 0 0;
	color: #FFFFFF;
	position: relative;
	height: 100%;
	width: 200%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}
</style>
</head>



<!-- ...............................................body section.....................................-->
<body>

	<div class="container">
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-right">
					<h1>Update the Employee Details</h1>
					<p>Update the Employee by Entering the Employee Id</p>

				</div>
			</div>
		</div>
        <?php
            $status = "";
            try{
                $conn = new PDO('mysql:host=localhost;dbname=Netprophets','root','5448');
            }catch(PDOException $e){
                echo "Connection Failed".$e->getMessage();
            }
        
            if ($_SERVER["REQUEST_METHOD"]="POST"){
                $id=$_POST['empid'];   
                $name = $_POST['name'];
                $email = $_POST['email'];
                $mobile = $_POST['mobile'];
                $address = $_POST['address']; 
                
                $sql = "update emp set name = :name, mobile = :mobile, email = :email,address = ;address where id = :empid;";
                $stmt = $conn->prepare($sql);
                $stmt->execute(['empid'=>$id,'name'=>$name,'email'=>$email,'mobile'=>$mobile,'address'=>$address]);
                $status = "Record updated Successfully";
            }
        ?>
        
		<div class="form-container forgot-container">
			<form action="forgotuser" method = "post">
				<h1>Update Details</h1>
				<br> 
                <input type="number" name="empid" placeholder="EmployeeId">
				<input type="text" name="name" placeholder="Enter Employee Name">
                <input type="text" name="email" placeholder="Enter Employee email">
                <input type="number" name="mobile" placeholder="Enter Employee Mobile">
                <textarea name="address" placeholder="Enter Employee Address"></textarea>
				<span style = "color :green"><?php echo @$status?></span>
                <span style = "color: red"></span>
                <br>
                <br>
				<button>Update</button>
			</form>
		</div>

	</div>




</body>
</html>