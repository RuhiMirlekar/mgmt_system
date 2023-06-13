<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body {
  align-items: center;
  background-color: cornflowerblue;
  display: flex;
  justify-content: center;
  height: 100vh;
  overflow-y:hidden;
}

.form {
  background-color: rgba(255,255,255);
  
  box-sizing: border-box;
  height: 500px;
  padding: 20px;
  width: 320px;
}

.title {
  color: black;
  font-family: sans-serif;
  font-size: 36px;
  font-weight: 600;
  margin-top: 30px;
}

.subtitle {
  color: black;
  font-family: sans-serif;
  font-size: 16px;
  font-weight: 600;
  margin-top: 10px;
}

.input-container {
  height: 50px;
  position: relative;
  width: 100%;
}

.ic1 {
  margin-top: 40px;
}

.ic2 {
  margin-top: 30px;
}

.input {
  background-color:white;
  border-radius: 12px;
  border: 0.2px solid black;
  box-sizing: border-box;
  color: black;
  font-size: 18px;
  height: 100%;
  outline: 0;
  padding: 4px 20px 0;
  width: 100%;
  box-shadow: 1px 1px 2px black;
}

.submit {
  background-color: #08d;
  border-radius: 12px;
  border: 0;
  box-sizing: border-box;
  color: #eee;
  cursor: pointer;
  font-size: 18px;
  height: 50px;
  margin-top: 38px;
  // outline: 0;
  text-align: center;
  width: 100%;
}

.submit:active {
  background-color: #06b;
}

    </style>

</head>
<body>
<div class="form">
    <script>
        function a_login()
        {
            <?php

        $login=false;
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
         // session_start();
          
            include 'E:\XAMPP\htdocs\smarthr\dbconnect.php';
            $username = $_POST["username"];
            $password = $_POST["password"];
          
          
                $sql="select * from admin_login where username='$username' AND password='$password'";
                $result= mysqli_query($conn,$sql);
                $num= mysqli_num_rows($result);   //to count no of rows

                if($num== 1)
                {
                    $login=true;
                   // $_SESSION['name']=$username;
                }
                
                
            

                
            

        }
      ?>
        }
    </script>
    <form action="#" method="post">
            <div class="title">Welcome Admin!</div>
            <div class="subtitle">Let's Login!</div>
            <div class="input-container ic1">
                <input id="firstname" name="username" class="input" type="text" placeholder=" UserName" />
                
            
            </div>
            <div class="input-container ic2">
                <input id="lastname" name="password" class="input" type="password" placeholder="Password " />
                
            
            </div>
            
            <input type="submit" name="submit" value="Proceed" class="submit" onclick="a_login()"/>
    </form>
    <?php
            if($login == true && isset($_POST['submit']))
            {
             
                 //  To redirect form on a particular page
                    header("Location:admin_dashboard.php");
                  
               
               
                
            }
            else
           
            {
              echo '<font color="red">Invalid Credentials</font>';
             
            }
           
            
            
        ?>
    </div>
</body>
</html>