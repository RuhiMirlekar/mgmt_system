<?php 
include 'E:\XAMPP\htdocs\smarthr\Candidate\refer.php';
$cat=new users;
$category=$cat->cat_shows();
error_reporting(E_ERROR | E_PARSE);
//print_r($category);

if(isset($_GET['id']))
{
  $conn=new mysqli('localhost','root','','candidate_register');
  $id=$_GET['id'];
  $delete=mysqli_query($conn, "Delete from `register_login` where `cid`='$id'");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      body
      {
        background-color: powderblue;
      }
        .inp
        {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: none;
            background-color: white;
            color: black;
            box-shadow: 2px 2px 3px black;


        }
        .tbl
        {
          padding:0px;
          border-collapse: collapse;
          margin: 10px;
          width: 100%;
          
        }
        table tr td
        {
          padding: 10px;
         
        }
        table tr{
          width: 100%;
          background:white;
        }
        table tr th
        {
          padding: 10px;
        }

        .btn
        {
          padding: 15px;
          width: 200px;
          margin: 20px;
          background:white;
          border-box: 2px 2px 3px black;
        }

        
        a
        {
          color:black;
          text-decoration:none;
        }
    </style>
</head>
<body>
    <div class="add_f_user">
        <h1 style="font-family:arial;text-align:center;text-shadow: 1px 1px 3px black">Add Candidate</h1>
        

<?php



$alert=false;
if($_SERVER["REQUEST_METHOD"] == "POST")
{
 
    include 'E:\XAMPP\htdocs\smarthr\dbconnect.php';
   
    $user_name= $_POST["uname"];
    $password = $_POST["pswd"];
  
    $email= $_POST["email"];
    $exists= false;
   

       
    if(($exists == false))
    {
        
    if(is_uploaded_file($_FILES["resume"]["tmp_name"]) && ($_FILES["resume"]["type"] == 'application/pdf') )
    {
        //for resume
        $resume = $_FILES["resume"]["name"];
        $tname = $_FILES["resume"]["tmp_name"];
        $uploadsdir = '../Candidate/resume_folder/';
        $folder_resume= '../Candidate/resume_folder/'.$resume;
        move_uploaded_file($tname, $uploadsdir.'/'.$resume);
    }
        $sql=" INSERT INTO `register_login` (`username`, `password`, `email`, `cadidate_log`,`c_resume`) VALUES ('$user_name', '$password', '$email', current_timestamp(),'$folder_resume')";
        $result= mysqli_query($conn,$sql);
     
        if($result)
        {
          
            $alert=true;
        }



    }
    
   
    if($alert)
    {

      
      if(isset($_POST['submit1']))
      { 
        
        echo "Records Inserted";
      }
    }

    else
    {
      echo "Insertion Failed";
    }


}
?>

  


          <form action="manage_candidate.php" method="post" enctype="multipart/form-data">
          
            <label class="lbl">Enter UserName</label>          
            <input type="text" class="inp" required name="uname" maxlength="20">
            <br><br>
            <label class="lbl">Enter Password</label>
            <input type="password" required name="pswd" class="inp" maxlength="20">
            <br><br>
            <label class="lbl">Enter Email-id</label>
            <input type="email" name="email" class="inp" >
            <br><br>
            <label class="lbl">Attach Resume</label>
            <input type="file" name="resume" class="inp">
            
            <input type="submit" name="submit1" class="btn" value="+Candidate" >
      
          </form>
          
      
    



    </div>

    <div>
        <h2>Candidates</h2>
        <?php
         $conn=new mysqli('localhost','root','','candidate_register');
         $q= mysqli_query($conn,"Select * from `register_login`") or die('Error');
        
         echo "<table border class='tbl'><tr>
                <th>UserName</th>
                <th>Password</th>
                <th>Email-id</th>
                <th>Resume</th>
                <th>Remove</th>
                
                
                </tr>";
               while($row = mysqli_fetch_array($q))
               {
                $id=$row['cid'];
                
                $un=$row['username'];
                $_SESSION['u']=$un;
                $pwd=$row['password'];
                $email=$row['email'];
                $resume=$row['c_resume'];
                

                
                    echo '<tr><td>'.$un.'</td><td>'.$pwd.'</td><td>'.$email.'</td><td><a href="'.$resume.'">Resume</a></td><td><a href="manage_candidate.php?id='.$id.'">Delete</a></td></tr>';
              
               }
    ?>
    </div>
   
</body>
</html>