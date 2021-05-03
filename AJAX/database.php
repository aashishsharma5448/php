<?php
    try{
        $conn = new PDO('mysql:host=localhost:3307;dbname=netprophets','root','');
    }catch(Exception $e){
        echo "Connection failed".$e->getMessage();
    }
    $sql = "select email from authentication;";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
?>

<html>
    <head>
        <title>AJAX Database page</title>
        <style>
            table,th,td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th,td{
                padding: 5px;
            }
        </style>
    </head>
    
    <body>
        <form action="">
            <select name="Employee names" onchange="showname(this.value)">
                <option>Select an email</option>
                <?php
                    foreach($result as $res){?>
                        <option value="<?php echo $res["email"]; ?>"><?php echo $res["email"]; ?></option>
                        <?php
                    }
                ?>
                
            </select>
        </form>
        <br>
        <div id="demo">Customer info will be listed here...</div>
        
        <script>
            function showname(str){
                var xhttp = new XMLHttpRequest();
                if (str == ""){
                    document.getElementById("demo").innerHTML = "";
                    return;
                }
                
                xhttp.onreadystatechange = function(){
                    if (this.readyState == 4 && this.status == 200){
                        document.getElementById("demo").innerHTML = this.responseText;
                    }
                };
                xhttp.open("GET","getdetails.php?q="+str,true);
                xhttp.send();
            }
        </script>
        
    </body>
</html>