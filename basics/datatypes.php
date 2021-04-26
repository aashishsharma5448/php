<html>
    <title>Data types in PHP</title>
    <body>
        
        <?php
            /*      PHP supports the following data types:
                        String
                        Integer
                        Float (floating point numbers - also called double)
                        Boolean
                        Array
                        Object
                        NULL
                        Resource*/
        $x = 18101999;    // Integer Types
        var_dump($x);
        echo "<br>";
        $a = 10.12; // float and double
        var_dump($a);
        echo "<br>";
        $str = "Aashish Sharma";  // String types
        var_dump($str);
        echo "<br>";    
        $boolean = true;        // boolean types
        var_dump($boolean);
        echo "<br>";
        $arr = array(1,2,3,4,56);
        var_dump($arr);
        echo "<br>";
        $array = array("Aashish","Sharma");
        var_dump($array);
        
        // string data types and it's shortcut functions
        echo "<br>".strlen($str);   // to count the length of an string
        echo "<br>".str_word_count($str);   // to count the word in string 
        echo "<br>".strrev($str);    // to reverse the Whole String
        echo "<br>".strpos("hello world!", "wo");    // to find the "wo" exist in string  so output is 6 because it is at place of 6
        echo "<br>".str_replace("Sharma","Vats", $str); // to replace a word in string by another word 
        
        
        /*              1 word is the word is to be changed
                        2 word is the word with whom it to be changed
                        3 is the String in which the word is changed
                        */
        
        
        
        
        // Integer Data types
        echo "<br>".$x*$a;    // x is Integer type but a is float so result is in float types and stores in float
        echo "<br>".PHP_INT_MAX;    // It displays the maximum value of Integer which is 9223372036854775807
        echo "<br>".PHP_INT_MIN;    // It displays the minimum value of Integer which is -9223372036854775808
        echo "<br>".PHP_INT_SIZE."<br>";   // It displays the size of Integer in bytes which is 8
        echo var_dump(is_int($x))."<br>"; // It checks that given data types is Integer type or not so it Gives bool(true) or bool(false);
        echo var_dump(is_long($x))."<br>";// It is same as Integer but it is Extension of integer types;
        
        
        // float data types
        echo "<br>".PHP_FLOAT_MAX; // it shows the maximum value of float which is 1.7976931348623E+308
        echo "<br>".PHP_FLOAT_MIN; // it shows the minimum value of float which is 2.2250738585072E-308
        echo "<br>".-PHP_FLOAT_MAX; // The smallest representable negative floating point number which is -1.7976931348623E+308
        echo "<br>".PHP_FLOAT_EPSILON; // It shows the smallest positive number
        echo "<br>".PHP_FLOAT_DIG."<br>";  // The number of decimal digits that can be rounded into a float and back without precision loss
        
        
        // return min and max functions
        echo (min(0,1,3,8,-6));  // it return -6
        echo "<br>".(max(0,1,3,8,-6));  // it returns 8 
        
        // Math Functions
        echo "<br>".rand();      // it generates the random integer value;
        echo "<br>".abs(-6.7);   // it returns the positive value which is 6.7
        echo "<br>".sqrt(64);    // it return the square root of 64
        echo "<br>".rand(10,100);// It generates the random number between 10 to 100
        echo "<br>".round(0.667);// It is used to round of the numbers so it gives 1s
        
        
        ?>
        
        
        
        
    
    </body>
</html>