<html>
    <head>
        <title>First page of PHP in AJAX</title>
        
        <body>
            <h>The XMLHttpRequest Object</h>
            
            <h3>Start typing a name in the input field given below</h3>
            <p>Suggestion:<span id="hint"></span></p>
            <p>First name: <input type="text" id="name" onkeyup="showhints(this.value)"></p>
            
            <script>
                function showhints(str){
                    var xhttp = new XMLHttpRequest();
                    if (str.length == 0){
                        document.getElementById("hint").innerHTML = "";
                        return;
                    }
                    xhttp.onreadystatechange = function(){
                        if (this.readyState == 4 && this.status == 200){
                            document.getElementById("hint").innerHTML = this.responseText;
                        }
                    };
                    xhttp.open("GET","hint.php?q="+str, true);
                    xhttp.send();   
                }
            </script>
            
        </body>
    </head>
</html>