<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *
        {
            color:rgb(44, 102, 209);
            font-family: papyrus;
            font-weight: bolder; 
        }
        body
        {
            background-color: #0e033b;
            
           
        }
        .part1
        {
            
            background-color:#d8b7ed;
            display: inline-block;
            height: 590px;
            
            width:30%;
        }

        .part_2
        {
            
            background-color: rgba(255, 255, 255,0);
            display:block;
            height: 590px;
            width:70%;
            float: right;
        }

        .r1,.r2
        {
            display:block;
            
            text-align: center;
            
           
            height:280px;
            margin:10px;

        }

        .p1,.p2,.p3,.p4
        {
            display:inline-block;
            width:45%;
            height:80%;
            background-color:#94f2c0;
            font-size:25px;
            margin:19px;

        }
        .options
        {
            text-align: center;
        }
        .options button
        {
            background-color:#d8b7ed; /* Green */
            border: none;
            color:rgb(44, 102, 209);
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
            width: 100%;
            display: block;
        }
        .options button:hover 
        {
            background-color: #cecece;
        }
        
        .p1:hover,.p2:hover,.p3:hover,.p4:hover
        {
            box-shadow: 4px 4px 3px white;
        }
        
        span
        {
            font-size: 25px;
           
            
        }


        
    </style>

</head>
<body>

    <div class="part1">
        <div class="logo">
            <img src="logo_shr.png" alt="logo" width="100%" height="30%">
            
        </div>
        
        <div class="options">
           
           <script>
            function db()
            {
                location.replace("profile.php");
            }
            function db1()
            {
                
                location.replace("candidate_login.php");

            }
           </script>
           
            <span>Welcome To Your Dashboard,  <?php
            session_start();

            echo $_SESSION['name'];
            ?>!</span><br><br> 
            <button onclick="db()">Profile</button>
            <button onclick="db1()">Log Out</button> 
            
        </div>
       
    </div>

    <div class="part_2">

        <div class="r1">
            <div class="p1"> <span>JOBS AVAILABLE </span>
            <br>
            
            <br>
            <a href="jobs_avail.php">Click here to View</a>
            </div>
            <div class="p2">
                <span>TEST DETAILS</span>
                <br>
                <br>
                <a href="test_candidate.php">Test and test details</a>
            </div>
        </div>

        <div class="r2">
           
            <div class="p4">
            <span>RESUME</span>
                <br>
                <?php
    
          
    include 'E:\XAMPP\htdocs\smarthr\dbconnect.php'; 

    
     
         
         $q_f="SELECT `c_resume` FROM `register_login` where `username`='{$_SESSION["name"]}'";
         $exe_f=mysqli_query($conn,$q_f);
         $row =mysqli_fetch_assoc($exe_f);
         $r4=implode($row);
     
         
     
     
     
     
     ?>
              <a href="<?php
              echo $r4;
              ?>">Resume Uploaded</a>
           
            </div>
        </div>

    </div>

</body>
</html>