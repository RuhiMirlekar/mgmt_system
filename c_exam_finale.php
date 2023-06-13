
<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    body
    {
      background-image:url('https://img.freepik.com/premium-vector/business-people-analyzing-social-media-marketing-flat-vector_189557-2365.jpg?w=2000');
      background-size:cover;
      
    }

      .container
      {
      display: inline-block;
      text-align:center;
      position:relative;
      top: 200px;
      left:35px;
    }

  
  </style>
<?php
require "refer.php";

$profile=new users;

$profile->cat_shows();
?>
  <title>QUIZ</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script type="text/javascript">
  
  $(document).ready(function() {

    $(document)[0].oncontextmenu = function() { return false; }

    $(document).mousedown(function(e) {
        if( e.button == 2 ) {
            alert('Sorry, this functionality is disabled!');
            return false;
        } else {
            return true;
        }
    });
});
  </script>
</head>
<body>

<div class="container">
 

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
     
      <center><button type="button" class="btn btn-primary" id="btnid" data-toggle="tab" href="#select">Start Quiz</button></center>
	  
	  <div class="col-sm-4"></div>
	  <div class="col-sm-4"><br>
	  <div id="select" class="tab-pane fade">
	  
	  <form method="post" action="show_ques.php">
	  <select class="form-control" id="select" name="cat">
					<option >select category</option>
					<?php 
					foreach($profile->cat as $category)
					{?>
						         <option value="<?php echo $category['id']; ?>"><?php echo $category['category']; ?></option>
							<?php	 } ?>
				                     </select><br>
									 <center><input type="submit"  value="submit" class="btn btn-primary" ></center>
									 </form>
									 
									 
									 </div>
									 </div>
									 <div id="" class="col-sm-4"></div>
    </div>
	
	
	</div>
	</div>
    </div>
	</div>
    
   
  </div>
</div>

</body>
</html>
