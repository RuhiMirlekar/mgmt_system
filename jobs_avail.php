<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .tbl
        {
          padding:0px;
          border-collapse: collapse;
          margin-top:110px;
          width: 100%;
          
        }
        table tr td
        {
          padding: 10px;
         
        }
        table tr{
          width: 100%;
          background:white;
          text-align:center;
        }
        table tr th
        {
          padding: 10px;
        }
        .btn
        {
          padding: 15px;
          width: 200px;
          margin:10px;
          margin-left:40%;
          background:cornflowerblue;
          border-box: 2px 2px 3px black;
        }
    </style>
</head>
<body>
  
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
                

                
                    echo '<tr><td>'.$jt.'</td><td>'.$c.'</td><td><button class="btn" onclick="Apply()">Apply</button></td></tr>';
              
               }

            

               ?>       
                
         
                <script>
               function Apply()
               {
                   alert("You applied for <?php echo $c;?> job!");
                   location.replace("test_candidate.php");
               }
           </script>
           
      

        
           


  
</body>
</html>