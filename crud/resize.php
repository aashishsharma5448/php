<?php

    function process($files){
        
        $filename = $files['name'];
        $fileerror = $files['error'];
        $filetemp = $files['tmp_name'];
        move_uploaded_file($filetemp,$filename);
    
        $original = imagecreatefromjpeg($filename);
        $width    = imagesx($original);
        $height   = imagesy($original);
        $resizedlow = imagecreatetruecolor(100,100);
        imagecopyresampled($resizedlow,$original,0,0,0,0,100,100,$width,$height);
        imagejpeg($resizedlow,"low".$filename);
        
        //medium file
        $resizedlow = imagecreatetruecolor(600,600);
        imagecopyresampled($resizedlow,$original,0,0,0,0,600,600,$width,$height);
        imagejpeg($resizedlow,"med".$filename);

    
        
    }   

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_FILES['image'])){
            $files = $_FILES['image'];
            
            $filename = $files['name'];
            $fileerror = $files['error'];
            $filetemp = $files['tmp_name'];
            
            $ext = explode ('.',$filename);
            $filecheck = strtolower(end($ext));
            $fileextstored = array('png','jpg','jpeg');
            
            if (in_array($filecheck,$fileextstored)){
                process($files,500);
                $e = $files['name'];
                echo "<img src='lowimage.jpg'>";
                echo "<img src='medimage.jpg'>";
            }
        }
    }
        
            
            
if ($ext = 'png') {
                processpng($destinationfile,"200","low",$filetemp);
                processpng($destinationfile,"400","med",$filetemp);
                processpng($destinationfile,"600","high",$filetemp);
            }
            elseif($ext == 'jpg' || $ext == 'jpeg'){
                processjpg($destinationfile,"200","low",$filetemp);
                processjpg($destinationfile,"400","med",$filetemp);
                processjpg($destinationfile,"600","high",$filetemp);                                  
            }
            
            
            
        }
        else {
            echo "Only JPEG, JPG and PNG files are allowed<br>";
        }
    } */
?>




<html>
    <body>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="image"><br>
        <input type="submit" value="submit">
        </form>
    </body>
</html>