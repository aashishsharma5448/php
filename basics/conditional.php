<html>
    <title>Conditional statements and loops</title>
    <body>
        <?php
        
            // Conditional Statements 
            if (4>5) {echo "4 is Greater than 5<br>";}
            else {echo "5 is Greater than 4<br>";}  
        
            // for loop
            for ($i=0;$i<5;$i++) {echo $i."&nbsp&nbsp&nbsp&nbsp";}    
            echo "<br>";
        
            // for each loop
            $colors = array("red","Green","Yellow","White");
            foreach($colors as $a){
                if ($a == "red") continue;  
                echo $a."&nbsp&nbsp&nbsp&nbsp";
            }
            echo "<br>";
            
            // for objects like HashMap
            $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");

            foreach($age as $x => $val) {
              echo "$x = $val<br>";
            }
        
            // while loop
            $i = 1;
            while ($i<=5) {
                echo $i."&nbsp;&nbsp;"; 
                $i++;
            }
            echo "<br>";
            // do while loop
            $i=1;
            do {
                echo $i."&nbsp;&nbsp;"; 
                $i++;
            }while ($i!=5);
        
        
        
            // switch statement
            $color = "reds";
            switch ($color){
                case "red": echo "This is red<br>";
                    break;
                case "Green":echo "This is Green <br>";
                    break;
                default: echo "There is No color<br>";
                    break;
                    
            }
        ?>
        
    </body>
</html>