<html>  
<head>  
    <title>PHP login system</title>  
    
    <link rel = "stylesheet" type = "text/css" href = "style.css">   
</head> 

</style>
<body>
    <style>
        body {
            background-color: #9e6666;
            
        }
        
        #frm {
            background-color: white;
            border: 1px solid #ccc;
            margin: 0 auto;
            width: 300px;
            padding: 20px;
        }
        
        h1 {
            text-align: center;
            color: blue;
        }
        
        label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }
        
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        
        input[type="submit"] {
            background-color: blue;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 3px;
            cursor: pointer;
        }
        
        input[type="submit"]:hover {
            background-color: darkblue;
        }
        
        .error {
            color: red;
            margin-bottom: 10px;
        }
    </style>          
            
    <div id = "frm">  
        <h1>Login</h1>  
        <form name="f1" action = "authentication.php" onsubmit = "return validation()" method = "POST" >
            
            <p>  
                <label> UserName: </label>  
                <input type = "text" id ="user" name  = "user" />  
            </p>  
            <p>  
                <label> Password: </label>  
                <input type = "password" id ="pass" name  = "pass" />  
            </p>  
            <p>  
                
                <input type =  "submit" id = "btn" value = "Login" />  
            </p> 
          
        </form>  
    </div>     
    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>
        
</body>  

</html>  