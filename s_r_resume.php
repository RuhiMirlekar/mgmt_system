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
            background-color:powderblue;
        }
         .tbl
        {
          padding:0px;
          border-collapse: collapse;
          margin-top: 100px;
          width: 100%;
          box-shadow: 2px 2px 3px black;
          
        }
        table tr td
        {
          padding: 10px;
         
        }
        table tr{
          width: 100%;
         
        }
        table tr th
        {
          padding: 10px;
          background-color:white;
          
        }

    </style>
</head>
<body>
    <?php
         $conn=new mysqli('localhost','root','','candidate_register');
         $q= mysqli_query($conn,"Select * from `register_login`") or die('Error');
        
         echo "<table border class='tbl'><tr>
                <th>User Name</th>
                <th>Eligible</th>
                <th>Resume</th></tr>";
               while($row = mysqli_fetch_array($q))
               {
                $e=$row['eligible'];
                $uname=$row['username'];
                $resume=$row['c_resume'];

                if($e == 1)
                {
                    echo '<tr bgcolor="green"><td>'.$uname.'</td><td>Eligible</td><td><a href="'.$resume.'">Resume</a></td></tr>';
                }
                else
                {
                    echo '<tr bgcolor="coral"><td>'.$uname.'</td><td>Not Eligible</td><td>No resume</td></tr>';
                }
               }

                  
                
         
            
           
      

        
           


    ?>
   
</body>
</html>