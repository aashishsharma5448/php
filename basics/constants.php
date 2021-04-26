<html>
    <title>To define the Constants in the PHP</title>
    <body>
        <?php
            define("Variablename","Variable value");
            echo Variablename;  // it  gives the output "VARIABLE VALUE"
            
            /*  It simple works like a variable. In this we assign a "VARIABLE VALUE" to the variable "VARIABLENAME" and now we simply use 
                "VARIABLENAME" as a variable and it consists the value "VARIABLE VALUE" 
                in this Case we don not nedd the $ sign to define the variable.
                and we make this variable as a case insensitive or case sensitive by defing the values of boolean true or false
                true means Case Insensitive
                false means Case Sensitive
            */
            
            define ("VARa", "Aashish Sharma",true);
            echo "<Br>".vara;  // it Gives the output Aashish Sharma and it is correct 
        
            define ("Variable","Aashish Sharma",false); // we make it Case Sensitive 
            echo "<br>".Variable;  // it give the value Aashish Sharma  
            //echo "<br>".variable;  //It gives us error because variable does not define 
        
            // by the define keyword we can also declare the arrays 
            define ("arrays",[12,12,15,1,6,8]);
            echo "<br>".arrays[2];
        
            // we can defne Integer Array as well as String array and char array also
            // the scope of Constant functions are used as Globally
            
            function myTest(){
                echo "<br>".vara;
                echo "<br>".arrays[0];
            }
            
            myTest(); // Executions of defined function
        ?>
    </body>
</html>