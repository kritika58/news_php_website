<?php
include 'dbconnection.php';
$sql = "SELECT user_id,user_name,user_profile_image_url FROM news_arabic";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>QCRI- News Mega Project</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" src="index_style.css">
  <link rel="icon" type="image/png" href="https://excellence.qa/wp-content/uploads/2016/12/qatar-foundation.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- jQuery library -->
  <script src="libs/js/jquery.js"></script>
  <!-- bootstrap JavaScript -->
  <script src="libs/js/bootstrap/dist/js/bootstrap.min.js"></script>
		<script src="libs/js/bootstrap/docs-assets/js/holder.js"></script>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
  <div class="col-sm-3 sidenav ScrollStyle">
      <h4>News Sources</h4>
      <form action=# method="post">
      <ul  class="nav nav-pills nav-stacked">
      
      <?php
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) { ?>
            <li>
            <span><input type="checkbox" name="check_list[]" value="<?php echo $row["user_name"]?>"><a href="display.php?id=<?php echo $row["user_id"]?>">
            <?php echo $row["user_name"]?></span>
            <img align="right" style="width: 30px; height:30px;" src="<?php echo $row["user_profile_image_url"]?>">
            </a>
            </li>
            <?php }} ?>
      </ul><br>
      <input type="submit" name="submit" class="btn btn-success" value"Submit">
            </form>
            <?php
    if(isset($_POST['submit'])){//to run PHP script on submit
    if(!empty($_POST['check_list'])){
    // Loop to store and display values of individual checked checkbox.
    foreach($_POST['check_list'] as $selected){
    echo $selected."</br>";
    }
    }
    }
    ?>

<!--      
-->      
    </div>

    <div class="col-sm-9">
	
      
 
        <!-- PAGE CONTENT and PHP CODE WILL BE HERE -->  
        <div class="page-header">
            <h1> Live Twitter Feed </h1>
        </div>
			</div>
			 
<!-- call tweets.php -->
<?php include 'tweets.php'; ?>
		 
		</div> <!-- end <div class="container"> -->
		 
		
		
		 
		
		  
		<!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		 

      
      
	  
	  
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p style="text-align: center; background-color: #555;">Copyright @QCRI</p>
</footer>

</body>
</html>