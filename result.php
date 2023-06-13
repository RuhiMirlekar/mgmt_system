<?php 
include("refer.php");
error_reporting(E_ERROR | E_PARSE);
$ans=new users;
$answer=$ans->answer($_POST);
?>
<!DOCTYPE HTML>
<html lang="UFT-8">
<head>
<meta charset="UTF-8">
<title>answer</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>
<body>
      <center>
	  <?php
	    $total_qus=$answer['right']+$answer['wrong']+$answer['no_answer'];
		$attempt_qus=$answer['right']+$answer['wrong'];
	  ?>
	  <div class="container">
	  <div class="col-sm-2"></div>
	  <div class="col-sm-8">
  <h2>Quiz Result</h2>
                        
  <table class="table table-bordered">
    <?php
      $conn=new mysqli('localhost','root','','quiz_oops');
      $result = mysqli_query($conn, "SELECT * FROM `questions` ORDER BY `id`") or die('Error');

      $row = mysqli_fetch_array($result);
      $noq= $row['no_q'];
    
    ?>
    <thead>
      <tr>
        <th>Total no. of Question:</th>
        <th><?php echo $total_qus; ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Attemped Questions:</td>
        <td><?php echo $attempt_qus; ?></td>
      </tr>
      <tr>
        <td>Correct:</td>
        <td><?php echo $answer['right'].", ".($answer['right']*100)/($total_qus)."%"; 
        $_SESSION['score']=$answer['right'];
        ?></td>
      </tr>
      <tr>
        <td>Incorrect:</td>
        <td><?php echo $answer['wrong']; ?></td>
      </tr>
      <tr>
        <td>Eligibilty</td>
        <td><?php 
        
        if($answer['right'] >= $noq)
        {
          echo '<font color="green">Eligible</font>';
          $eligibile=1;
        }
        else
        {
          echo '<font color="red">Not Eligible</font>';
          $eligibile=0;
        }
        ?></td>
      </tr>
    </tbody>
    <?php
    session_start();
    $uname=$_SESSION['name'];
      if($eligibile==1)
      {
        $conn=new mysqli('localhost','root','','candidate_register');
        $qu=mysqli_query($conn,"update `register_login` set `eligible`=1 where `username`='$uname'") or die('Error');
      }
      else
      {
        $conn=new mysqli('localhost','root','','candidate_register');
        $qu=mysqli_query($conn,"update `register_login` set `eligible`=0 where `username`='$uname'") or die('Error');
      }
      
    ?>
  </table>
        <script>
          function db()
          {
            location.replace("Dashboard_candidate.php");
          }
        </script>

        <button onclick="db()">Dashboard</button>
</div>
    <div class="col-sm-8"></div>
</div>
	  
	  
	  
	  </center>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>