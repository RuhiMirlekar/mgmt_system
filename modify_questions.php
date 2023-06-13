<?php 
include 'E:\XAMPP\htdocs\smarthr\Candidate\refer.php';
$cat=new users;
$category=$cat->cat_shows();
//print_r($category);

if(isset($_GET['id']))
{
  $conn=new mysqli('localhost','root','','quiz_oops');
  $id=$_GET['id'];
  $delete=mysqli_query($conn, "Delete from `questions` where `id`='$id'");
}

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    
    <title>Admin Modify Questions</title>
    <style>
       body
      {
        background-color: powderblue;
        padding: 5%;
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
        table
        {
          width: 100%;
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
          margin-left:40%;
          background:white;
          border-box: 2px 2px 3px black;
        }

        
        a
        {
          color:white;
          text-decoration:none;
        }

        #rm
        {
          background-color: red;
          
        }
    </style>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="..//css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<h1 class="page-header" style="font-family:arial;text-align:center;text-shadow: 1px 1px 3px black">Questionaire Dashboard</h1>

         

        
          <div class="table-responsive">
            <table class="table table-striped">
			<?php

             if(isset($_GET['msg']) && !empty($_GET['msg']))
			 {
				 echo  "<mark>Data inserted successfully</mark>" ;
			 }

			?>
         <form method="post" action="add_quiz.php">    
    <div class="form-group">
      <label for="text">Question</label>
      <input type="text" class="inp" name="qus" placeholder="Enter Question">
    </div>
	  
	  <div class="form-group">
      <label for="text">Option-1</label>
      <input type="text" class="inp" name="op1" placeholder="Enter Option-1 ">
    </div>
	
    <div class="form-group">
      <label for="text">Option-2</label>
      <input type="text" class="inp" name="op2" placeholder="Enter Option-2">
    </div>
	
    <div class="form-group">
      <label for="text">Option-3</label>
      <input type="text" class="inp" name="op3" placeholder="Enter Option-3">
    </div>
	
	<div class="form-group">
      <label for="text">Option-4</label>
      <input type="text" class="inp" name="op4" placeholder="Enter Option-4">
    </div>
	
	<div class="form-group">
      <label for="text">answer</label>
      <input type="text" class="inp"  name="ans" placeholder="Enter answer">
    </div>
	       <div class="form-group">
	   <select class="inp" id="sel1" name="cat">
		<option value="" >choose category</option>
		<?php 
		 foreach($category as $c)
		 {
			 
			 echo "<option value=".$c['id'].">".$c['category']."</option>";
			 
		 }
		?>		
      </select>
    </div>
   <button type="submit" class="btn">Submit</button><br>


  </form>
              </tbody>
            </table>
          </div>


        </div>
      
    <div>

         <h1>Test Questions</h1>
        

         <?php
         
       
		    $conn=new mysqli('localhost','root','','quiz_oops');
         $result = mysqli_query($conn, "SELECT * FROM `questions` ORDER BY `id`") or die('Error');
        

       


         
             echo "<table border><tr>
                <th>SR No</th>
                <th>Questions</th>
                <th>Option1</th>
                <th>Option2</th>
                <th>Option3</th>
                <th>Option4</th>
               
                <th>Delete Question</th>
                
            </tr>";
           
            while($row = mysqli_fetch_array($result)) {
                           

                            $sno = $row['id'];
                            $quest = $row['question'];
                            $op1 = $row['ans1'];
                            $op2 = $row['ans2'];
                            $op3 = $row['ans3'];
                            $op4 = $row['ans4'];
                            $cans = $row['ans'];
                            
                            echo ' 
                            <tr><td>'.$sno.'</td><td>'.$quest.'</td><td>'.$op1.'</td><td>'.$op2.'</td><td>'.$op3.'</td><td>'.$op4.'</td><td id="rm"><a href="modify_questions.php?id='.$sno.'">Remove</a></td></tr>';
            }

            // $results = mysqli_query($conn, "SELECT category.category FROM `category` inner join `questions` on category.id=questions.cat_id ") or die('Error');

            // $row1 = mysqli_fetch_array($results);
            
            // echo $row['cat'];

           echo '</table></div>';
        
    ?>
    <?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
      $noq=$_POST['no_q'];
      $conn=new mysqli('localhost','root','','quiz_oops');
      $qu=mysqli_query($conn,"update `questions` set `no_q`='$noq' where id=1") or die('Error');
    }
    ?>

     <form action="modify_questions.php" method="post">
            <h4>Total Number of Correct questions for the Eligibilty of the Candidate:</h4>
            <input type="text" class="inp" name="no_q" placeholder="Enter a number">
            <input type="submit" value="Submit" class="btn" name="submit">
     </form>
    </div>
    </div>

</body>
</html>