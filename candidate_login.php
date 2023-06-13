<!-- Radhe Krishna -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SmartHR</title>
    <link rel="stylesheet" href="frontend.css" />
    <style>
      *
      {
        font-family:'Papyrus';
        font-weight:bolder;
      }
    </style>
</head>
<body>
  <div class="container">
    <div class="form_container">
      <div class="box login">
        <h2>
          Already have an account?
        </h2>
        <button class="login_btn">Log In</button>
      </div>

      <div class="box register">
        <h2>
          Don't have an account?
        </h2>
        <button class="register_btn">Register</button>
      </div>
      <!-- login form -->
      <div class="form_box">
        <div class="form login_form">

        <!-- login code of php -->
 <script>
        
        function login()
        {
        <?php

        $login=false;
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
          session_start();
          
            include 'E:\XAMPP\htdocs\smarthr\dbconnect.php';
            $username = $_POST["username"];
            $password = $_POST["password"];
          
          
                $sql="select * from `register_login` where username='$username' AND password='$password'";
                $result= mysqli_query($conn,$sql);
                $num= mysqli_num_rows($result);   //to count no of rows

                if($num== 1)
                {
                    $login=true;
                    $_SESSION['name']=$username;
                }
                
                
            

                
            

        }
      ?>
               
              
 }

</script>

          <form action="candidate_login.php" method="post">
            <h3>Login</h3>
            <input type="text" placeholder="UserName" name="username">
            <input type="password" placeholder="Password" name="password">
            <input type="submit" name="submit" value="Sign In" onclick="login()">
            <a href="#" class="forgot">Forgot Password</a>
<br><br>
            
        <?php
            if( $login==true and isset($_POST['submit']))
            {
             
                 //  To redirect form on a particular page
                    header("Location:Dashboard_candidate.php");
               
               
                
            }
            else
           
            {
              echo '<font color="red">Invalid Credentials</font>';
             
            }
           
            
            
        ?>
          </form>
        </div>



        <!-- registration form -->
        <div class="form register_form">

<!-- registration code for php -->
<script>

  function register()
  {
<?php



$alert=false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
 
    include 'E:\XAMPP\htdocs\smarthr\dbconnect.php';
    $user_name= $_POST["uname"];
    $password = $_POST["pswd"];
    $cpassword= $_POST["cpswd"];
    $email= $_POST["email"];
    $exists= false;

    if(is_uploaded_file($_FILES["resume"]["tmp_name"]) && ($_FILES["resume"]["type"] == 'application/pdf') )
    {
        //for certifications
        $resume = $_FILES["resume"]["name"];
        $tna_me = $_FILES["resume"]["tmp_name"];
        $u_ploadsdir = '../Candidate/resume_folder';
        $res='../Candidate/resume_folder/'.$resume ;
        move_uploaded_file($tna_me, $u_ploadsdir.'/'.$resume);
    }
    
    if(($password == $cpassword) AND ($exists == false))
    {
        $sql=" INSERT INTO `register_login` (`username`, `password`, `email`, `cadidate_log`,`c_resume`) VALUES ('$user_name', '$password', '$email', current_timestamp(),'$res')";
        $result= mysqli_query($conn,$sql);

        if($result)
        {
          $_SESSION['u_name']=$user_name;
            $alert=true;
        }



    }
    
   
    if($alert)
    {

      
      if(isset($_POST['submit1']))
      {
       
        // $_SESSION['emailid']=$email;
        //  To redirect form on a particular page
          header("Location:candidate_login.php");
      }
    }

    else
    {
      echo '<font color="red">Please fill all the details</font>';
    }


}
?>
alert("Please Login after the registration");
  }
</script>

          <form action="candidate_login.php" method="post" enctype="multipart/form-data">
            <h3>Register</h3>
            <input type="text" placeholder="UserName" name="uname" maxlength="20">
            <input type="password" placeholder="Password" name="pswd" maxlength="20">
            <input type="password" placeholder="Confirm Password" name="cpswd" maxlength="20">
            
            <input type="email" placeholder="Email-Id" name="email">
            <label>Attach Resume</label>
            <input type="file" name="resume" >
            <input type="submit" name="submit1" value="Sign Up" onclick="register()">
      
          </form>
          
        </div>

      </div>
    


  </div>
  </div>
  <!-- js code for transitions -->
  <script>
    const login_btn=document.querySelector('.login_btn');
    const register_btn=document.querySelector('.register_btn');
    const form_box=document.querySelector('.form_box');
    const body=document.querySelector('body')

    register_btn.onclick= function()
    {
      form_box.classList.add('active');
      body.classList.add('active');
    }

    login_btn.onclick= function()
    {
      form_box.classList.remove('active');
      body.classList.remove('active');
    }
  </script>
</body>
</html>