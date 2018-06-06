<?php
include 'dbconnection.php';
$sql = "SELECT * FROM news_arabic";
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
  <style>
      .heading {
        color: #8D1B3D;
        font-family: "Times New Roman", Times, serif;
        font-size: 35px;
        font-weight: bold;
    }
    .head {
      height: 10%;
    }
    .desc {
        font-size: 20px;
        font-family: "Times New Roman", Times, serif;
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row content">
    <center>
    <div class="head col-sm-12">
      <h2 class="heading">QCRI- Mega News Project<h2>
    </div>
    <div class="head col-sm-12">
    <a href="manage.php" class="btn btn-info" role="button">Manage Your Sources</a>
    </div>
    <!-- SEARCH BUTTON -->
    <!--
    <div class=" head col-sm-12">
    -->
      <!-- TANYA ADD CODE HERE 
            <form action=# method="post">
          <input type="text" name="Search" value="Search"><br>
          <input type="submit" value="search">
          </form>
     
<?php
$count=0;
if(isset($_POST['search'])){
  while($row = $result->fetch_array(MYSQLI_ASSOC)){
                    foreach ($row[user_name] as $user_name) {
                    $count++ ;
                        if($search== $user_name){
                        echo "The news source you are looking for is in row number" . $count;
                        echo "if statement";

                        }
                        echo "in loop";
                    }
      echo "while";
  }

}
?>  -->
    </div>

    </center>
  
  <div style="max-height:78vh;" class="col-sm-3 sidenav pre-scrollable" >
    <h4>News Sources</h4>
    <form action=# method="post">
      <ul  class="desc nav nav-pills nav-stacked">
      
        <?php
          if ($result->num_rows > 0) {
          // output data of each row
              while($row = $result->fetch_assoc()) { 
        ?>
        <li>
        <span><input type="checkbox" name="check_list[]" value="<?php echo $row["user_name"]?>">
        <a href="display.php?id=<?php echo $row["user_id"]?>">
        <?php echo $row["user_name"]?>
        <img align="right" style="width: 40px; height:40px;" src="<?php echo $row["user_profile_image_url"]?>">
        </span>
        </a>
        </li>
        <?php
          }}
        ?>
      </ul>
  </div>
  <div style="height:5%; position: absolute; float:left; left:0%; bottom:5%" class="col-sm-3 sidenav" >
  <center>
  <input type="submit" name="submit" class="btn btn-primary" value"Submit">
  </form>
  </center>
  </div>
  <div class="col-sm-9">  
    <!-- PAGE CONTENT and PHP CODE WILL BE HERE -->  
    <div class="page-header">
          <h1> Live Twitter Feed </h1>
      </div>
  </div>
    <!-- call tweets.php -->
    <?php include 'tweets_new.php'; ?>
		 
	</div> <!-- end <div class="container"> -->	 
		
		  
  <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
		 

</div>

<footer class="container-fluid">
  <p style="text-align: center; background-color: #555;">Copyright @QCRI</p>
</footer>

</body>
</html>