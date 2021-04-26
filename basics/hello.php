<html>
    <title>My first Php</title>
    <body>
        <?php 
            //phpinfo
        
            /* DIFFRENCE BETWEEN ECHO AND PRINT IS
            
                echo and print are more or less the same. They are both used to output data to the screen.

The differences are small: echo has no return value while print has a return value of 1 so it can be used in expressions. echo can take multiple parameters (although such usage is rare) while print can take one argument. echo is marginally faster than print.


*/
            // to define the variables $ is used foreg: $x = 5; $string = "Aashish";
        
        
            $color = "red"; $x = 4 ; $y = 5; // these are the global variables
            echo "<h1 style='color:red'>My shirt color is $color <br></h1>";
            echo ("<h1>Hello this is Aashish sharma<h1>");
            //print $color+$x+$y;       this statement gives an error which shows that string is concatenated with numeric values;
        
            // function declration of global static and local
            function mytest(){
                $localvar = "local variable";
                global $x,  $y, $color; // to make the variable static we use global keyword and define inside the function
                echo "this is local variables $localvar $color<br>"; 
                echo $x+$y."<br>";
            }
            mytest();
            echo "color variable is global variable $color";    
        ?>
        
        
          
    </body>
</html>