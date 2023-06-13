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
            font-family: papyrus;
            font-weight: bolder;
        }
        body
        {
            background-color:  #0e033b;
            overflow-y: hidden;
        }
        .head
        {
            text-align: center;
            color:white;
          padding-top: 1px;
         
            
        }
        .p1
        {
            
            background-color:rgba(255, 255, 255,0.7);
            display: inline-block;
            height: 590px;
            position:absolute;
            left:2px;
            width:20%;
            text-align: center;

        }
        .p2
        {
            
           background-color:rgba(255, 255, 255,0.5);
            display:block;
            height: 590px;
            width:80%;
            float: right;
            text-align: center;
            position:relative;
            top:0px;
           
        }
        .p2_in
        {
            align-items: center;
            text-align: center;
            display: inline-block;
            width:50%;
            height:60%;
            position:relative;
            top:10%;
            border: 2px solid white;
            background-color: rgba(255, 255, 255,0.5);
            padding: 20px;
        }

        .p1 button
        {
            background-color:rgba(255, 255, 255,0); /* Green */
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
        .p1 button:hover 
        {
            background-color:rgba(255, 255, 255,0.2);
        }
    </style>

</head>
<body>
    <div class="head">
        <span><h2>Welcome to the Test, <?php
            session_start();

            echo $_SESSION['name'];?>
            </h2></span>
    </div>
    <div class="p1">
        <script>
            function db()
            {
                location.replace("Dashboard_candidate.php");
            }
        </script>
     
   
        <button onclick="db()" name="btn">Dashboard</button>

    </div>
<!-- for domain -->

    <div class="p2">
        <div class="p2_in">
        <?php
       
            // if($_SERVER["REQUEST_METHOD"] == "POST")
            // {
            //     $d=$_POST['field'];
            //     $_SESSION['field']=$d;

              
               
            // }
            
         
?>
            <span><H4><u>Test Details</u></H4></span>
            <span>Time Duration:</span>
            <span>20 mins</span><br><br>
            <span>If found malpracticing, the respective candidate would be logged out of the account.</span><br><br>
                <form action="c_exam_finale.php" method="post">
                 
                
          
<br><br >
                    <input type="checkbox" name="abc" required>
                    <span>I agree to the terms and conditions</span>
                    <br><br>
                    <input type="submit" name="submit" value="Proceed for test">
                </form>

        </div>
    </div>
</body>
</html>