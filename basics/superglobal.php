<html>
    <title>This is Interactive page</title>
    <body>
        <?php
        /*
        $GLOBALS is a PHP super global variable which is used to access global variables from anywhere in the PHP script (also from within functions or methods).

        PHP stores all global variables in an array called $GLOBALS[index].The index holds the name of the variable.
        */
        
            $x = 75; $y = 100;
            
            function addition(){
                $GLOBALS['z'] = $GLOBALS['x']+$GLOBALS['y'];
            }
            addition();
            echo $z."<br>";
        
        
        
        
        ?>
        
        
        <form method="get" action="<?php $_SERVER['PHP_SELF'];?>">
            Name : <input type="text" name="fname">
            <input type="submit">
        </form>
        
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET"){
                $name  = $_REQUEST['fname'];
                if (empty($name)) echo "Name is Empty";
                else echo $name;
            }
        ?>
    </body>
</html>