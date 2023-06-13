<?php 
error_reporting(E_ERROR | E_PARSE);
include 'refer.php';
$cat=new users;
$category=$cat->cat_shows();
//print_r($category);

if(isset($_GET['id']))
{
  $conn=new mysqli('localhost','root','','candidate_register');
  $id=$_GET['id'];
  $delete=mysqli_query($conn, "Delete from `jobs` where `job_id`='$id'");
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

        a
        {
          color:black;
          text-decoration:none;
        }

        .btn
        {
          padding: 15px;
          width: 200px;
          margin:10px;
          margin-left:40%;
          background:white;
          border-box: 2px 2px 3px black;
        }
    </style>
</head>
<body>

<?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $jobt=$_POST['jobt'];
      $domain=$_POST['domain'];
      $conn=new mysqli('localhost','root','','candidate_register');
      $qu=mysqli_query($conn,"insert into `jobs` values('','$jobt','$domain')") or die('Error');
    }
    ?>
    <h1 style="font-family:arial;text-align:center;text-shadow: 1px 1px 3px black">Add Jobs</h1>
    <form action="manage_jobs.php" method="post">

    <div class="form-group">
      <label for="text">Job Title</label>
      <input type="text"  name="jobt" class="inp" placeholder="Enter Job Title">
    </div>
<br><br>
    <select class="inp" id="sel1" name="domain">
    
                <option value="">choose category</option>
                <option class="inp" value="Human Resources">Human Resources</option>
                <option class="inp" value="Productions Research and Development">Productions Research and Development</option>
                <option class="inp" value="Operations management">Operations management</option>
                <option class="inp" value="Marketing">Marketing</option>
                <option class="inp" value="Sales and Purchase">Sales and Purchase</option>
                <option class="inp" value="Information Technology">Information Technology</option>
                <option class="inp" value="Security">Security</option>
                <option class="inp" value="Logistics">Logistics</option>
                <option class="inp" value="Import and Export">Import and Export</option>
                <option class="inp" value="Accounting and Finance">Accounting and Finance</option>
                
                		
  </select>
  <br><br>
  <input type="submit" name="submit1" class="btn" value="+Job">
    </form>



     <?php
         $conn=new mysqli('localhost','root','','candidate_register');
         $q= mysqli_query($conn,"Select * from `jobs`") or die('Error');
        
         echo "<table border class='tbl'><tr>
                <th>Job Title</th>
                <th>Category</th>
                <th>Operation</th></tr>";
               while($row = mysqli_fetch_array($q))
               {
                $jid=$row['job_id'];
                $jt=$row['job_title'];
                $c=$row['category'];
                

                
                    echo '<tr><td>'.$jt.'</td><td>'.$c.'</td><td><a href="manage_jobs.php?id='.$jid.'">Remove</a></td></tr>';
              
               }

                  
                
         
            
           
      

        
           


    ?>
</body>
</html>