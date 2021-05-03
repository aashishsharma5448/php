<?php
try{
    $conn = new PDO('mysql:host=localhost:3307;dbname=netprophets','root','');   
}catch(Exception $e){
    echo "Connection failed".$e->getMessage();
}

$email = $_GET['q'];
$sql = "select * from authentication where email = '$email';";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
foreach($result as $res){
    echo "<table>";
    echo "<tr>";
    echo "<th>EmployeeID</th>";
    echo "<td>" . $res["Id"]. "</td></tr>";
    echo "<tr><th>Name</th>";
    echo "<td>" . $res["Name"] . "</td></tr>";
    echo "<tr><th>Mobile</th>";
    echo "<td>" . $res["mobile"] . "</td></tr>";
    echo "<tr><th>Email</th>";
    echo "<td>" . $res["email"] . "</td></tr>";
    echo "<tr><th>Role</th>";
    echo "<td>" . $res["role"] . "</td></tr>";
    echo "<tr><th>Address</th>";
    echo "<td>" . $res["address"] . "</td></tr>";
    echo "</table>";
}
?>