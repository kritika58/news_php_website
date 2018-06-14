<?php
   include 'dbconnection.php';
   $sql = "SELECT * FROM news_arabic";
   $result = $conn->query($sql);
   global $my_final_sources;
   $my_final_sources=array();
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>QCRI-Mega News Project</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="scroll.css">
      <link rel="stylesheet" type="text/css" href="navbar.css">
      <link rel="icon" type="image/png" href="favicon.gif">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- jQuery library -->
      <script src="libs/js/jquery.js"></script>
      <!-- bootstrap JavaScript -->
      <script src="libs/js/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="libs/js/bootstrap/docs-assets/js/holder.js"></script>
      <style>
         .heading {
         font-family: "Times New Roman", Times, serif;
         font-weight: bold;
         font-size:200%;
         float:left;
         }
         .gsize {
         font-size: 35px;
         }
         .desc {
         font-size: 20px;
         font-family: "Times New Roman", Times, serif;
         }
         .hnav {
         padding-left:0;
         margin-bottom:0;
         list-style:none
         }
         .hnav>li {
         position:relative;
         display:block
         }
         .hnav>li>a {
         position:relative;
         display:block;
         padding:10px 15px
         }
         .hnav>li>a:focus,.hnav>li>a:hover {
         text-decoration:none;
         }
         .panel-actions {
         margin-top: -20px;
         margin-bottom: 0;
         text-align: right;
         }
         .panel-actions a {
         color:#333;
         }
         .panel-fullscreen {
         display: block;
         z-index: 9999;
         position: fixed;
         width: 100%;
         height: 100%;
         top: 0;
         right: 0;
         left: 0;
         bottom: 0;
         overflow: auto;
         }
      </style>
      <script>
         $(document).ready(function () {
         //Toggle fullscreen
         $("#panel-fullscreen").click(function (e) {
             e.preventDefault();
             
             var $this = $(this);
         
             if ($this.children('i').hasClass('glyphicon-resize-full'))
             {
                 $this.children('i').removeClass('glyphicon-resize-full');
                 $this.children('i').addClass('glyphicon-resize-small');
             }
             else if ($this.children('i').hasClass('glyphicon-resize-small'))
             {
                 $this.children('i').removeClass('glyphicon-resize-small');
                 $this.children('i').addClass('glyphicon-resize-full');
             }
             $(this).closest('.panel').toggleClass('panel-fullscreen');
         });
         });
         
      </script>
   </head>
   <body>
      <nav class="navbar navbar-dark bg-dark justify-content-between">
         <a class="heading navbar-brand">QCRI- Mega News Project</a>
         <form class="form-inline">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" value="search">Search</button>
            <a class="btn btn-default my-2 my-sm-0" href="http://localhost/English%20website/index.php">EN</a>
         </form>
      </nav>
      <!-- SEARCH BUTTON -->
      <!-- TANYA ADD CODE HERE 
         <form action=# method="post">
         <input type="text" name="Search" value="Search"><br>
         <input type="submit" value="search">
         </form>
         -->
      <?php
         $count=0;
         if(isset($_POST['search'])){
           $user_name1=$_POST['search'];
           while($row = $result->fetch_array(MYSQLI_ASSOC)){
                 foreach ($row[user_name] as $user_name1) {
                 $count++ ;
                     if($search== $user_name1){
                     echo "The news source you are looking for is in row number" . $count;
                     echo "if statement";
         
                     }
                     echo "in loop";
                 }
                echo "while";
           }
         
         }
         ?> 
      <div class="col-sm-3 sidenav" >
         <div style="max-height:78vh;" class= "pre-scrollable">
         <p class="desc">News<span style="float:left"><img style="width:35px;height:35px;" src="favicon.gif"></span></p>         
            <ul class="nav nav-tabs">
               <li id="all" class="active"><a data-toggle="tab" href="#home">All</a></li>
               <li id="select" ><a data-toggle="tab" href="#menu1">Select</a></li>
               <li id="my_list"><a data-toggle="tab" href="#menu2">My List</a></li>
            </ul>
            <div class="tab-content">
               <div id="home" class="tab-pane fade in active">
                  <form id="form1" action="<?=$_SERVER['PHP_SELF'];?>" method="post">
                     <ul  class="desc hnav">
                        <br>
                        <center>
                           <input type="submit" class="btn btn-primary" name="select" value="Add to my list">
                        </center>
                        <br>
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
                  </form>
               </div>
               <div id="menu1" class="tab-pane fade msize">
                  <br>
                  <form id="form3" action="<?=$_SERVER['PHP_SELF'];?>" method="POST" >
                     <select class="form-control" name="country" required>
                        <option value="qa">Qatar</option>
                        <option value="sa">Saudi Arabia</option>
                        <option value="ae">UAE</option>
                        <option value="kw">Kuwait</option>
                        <option value="gb">UK</option>
                        <option value="us">USA</option>
                     </select>
                     <br>
                     <select class="form-control" name="category" required>
                        <h2>Please select a category</h2>
                        <option value="General">General</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Sports">Sports</option>
                        <option value="Science">Science</option>
                        <option value="Health">Health</option>
                        <option value="Economy">Economy</option>
                     </select>
                     <br>
                     <center>
                        <input type="submit" name="apply" class="btn btn-primary" value="Apply">
                     </center>
                  </form>
                  <form id="form4" action="<?=$_SERVER['PHP_SELF'];?>" method="POST" >
                  <br>
                     <center>
                        <input type="submit" name="add" class="btn btn-primary" value="Add to my list">
                     </center>
                     <?php if(isset($_POST['apply'])){ ?>
                     <script>
                        $(document).ready(function() {
                        
                          $("#home").removeClass();
                          $("#menu1").removeClass();
                          $("#menu2").removeClass();
                          $("#all").removeClass();
                          $("#select").removeClass();
                          $("#my_list").removeClass();
                        
                        $("#menu1").addClass("tab-pane fade in active");
                        $("#home").addClass("tab-pane fade msize");
                        $("#menu2").addClass("tab-pane fade msize");
                        
                        $("#select").addClass("active");                
                        
                        });
                     </script>
                     <?php } ?>
                     <?php if(isset($_POST['select'])){ ?>
                     <script>
                        $(document).ready(function() {
                        
                          $("#home").removeClass();
                          $("#menu1").removeClass();
                          $("#menu2").removeClass();
                          $("#all").removeClass();
                          $("#select").removeClass();
                          $("#my_list").removeClass();
                        
                        $("#menu2").addClass("tab-pane fade in active");
                        $("#home").addClass("tab-pane fade msize");
                        $("#menu1").addClass("tab-pane fade msize");
                        
                        $("#my_list").addClass("active");                
                        
                        });
                     </script>
                     <?php } ?>
                     <?php if(isset($_POST['add'])){ ?>
                     <script>
                        $(document).ready(function() {
                        
                          $("#home").removeClass();
                          $("#menu1").removeClass();
                          $("#menu2").removeClass();
                          $("#all").removeClass();
                          $("#select").removeClass();
                          $("#my_list").removeClass();
                        
                        $("#menu2").addClass("tab-pane fade in active");
                        $("#home").addClass("tab-pane fade msize");
                        $("#menu1").addClass("tab-pane fade msize");
                        
                        $("#my_list").addClass("active");                
                        
                        });
                     </script>
                     <?php } ?>
                     <?php if(isset($_POST['delete'])){ ?>
                     <script>
                        $(document).ready(function() {
                        
                          $("#home").removeClass();
                          $("#menu1").removeClass();
                          $("#menu2").removeClass();
                          $("#all").removeClass();
                          $("#select").removeClass();
                          $("#my_list").removeClass();
                        
                        $("#menu2").addClass("tab-pane fade in active");
                        $("#home").addClass("tab-pane fade msize");
                        $("#menu1").addClass("tab-pane fade msize");
                        
                        $("#my_list").addClass("active");                
                        
                        });
                     </script>
                     <?php } ?>
                     <?php 
                        if(isset($_POST['apply'])){
                        $selected_country = $_POST['country'];
                        if ($selected_country=='qa')
                        {
                          $country_name='Qatar';
                        }
                        else if ($selected_country=='sa')
                        {
                          $country_name='Saudi Arabia';
                        }
                        else if ($selected_country=='ae')
                        {
                          $country_name='UAE';
                        }
                        else if ($selected_country=='gb')
                        {
                          $country_name='UK';
                        }
                        else if ($selected_country=='us')
                        {
                          $country_name='USA';
                        }
                        else if ($selected_country=='kw')
                        {
                          $country_name='Kuwait';
                        }
                        $selected_category = $_POST['category'];
                        $sql1 = "SELECT * FROM news_arabic WHERE country_code='".$selected_country."' AND Category='".$selected_category."' ";
                        $result1 = $conn->query($sql1);
                        echo '<p class=\'desc\'>You have selected '.mysqli_num_rows($result1).' sources from '.$country_name.' in '.$selected_category.' category.</p>';
                        
                        echo "<ul  class='desc hnav'>";		
                        $i=0;
                        while ($row1 = $result1->fetch_array(MYSQLI_ASSOC))
                        {
                            $uname[]=$row1["user_name"];
                            $id[]=$row1["user_id"];
                            $img[]=$row1["user_profile_image_url"];
                            echo "<li>";
                            echo "<span><input type=\"checkbox\" name=\"check_list1[]\" value=$uname[$i]>
                            <a href=\"display.php?id=$id[$i]?>\">$uname[$i]
                            <img align=\"right\" style=\"width: 40px; height:40px;\" src=$img[$i]>
                            </span>
                            </a>
                            </li>";  
                     $i++;
                     }
                     }
                     echo "</ul>";
                  ?>
                  </form>
               </div>
               <div id="menu2" class="tab-pane fade msize">
                  <br>
                  <?php 
                     if(isset($_POST['select'])){
                       if(!empty($_POST['check_list'])){
                         foreach($_POST['check_list'] as $selected){
                         $sql = "INSERT INTO my_sources (user_name)
                         VALUES ('".$selected."')";
                     
                         $result = mysqli_query($conn,$sql);
                         }                
                       }
                       
                         $sql_f = "SELECT * FROM my_sources,news_arabic WHERE my_sources.user_name=news_arabic.user_name";
                           $result_f = mysqli_query($conn,$sql_f);
                     
                           if ($result_f->num_rows > 0) {
                             // output data of each row
                             echo "<ul  class='desc hnav'>";
                                 while($row_f = $result_f->fetch_assoc()) { 
                     
                     
                           $uname_f=$row_f["user_name"];
                           $id_f=$row_f["user_id"];
                           $img_f=$row_f["user_profile_image_url"];
                           echo "<li>";
                           echo "<span><input type=\"checkbox\" name=\"check_list_f[]\" value=$uname_f checked>
                           <a href=\"display.php?id=$id_f?>\">$uname_f
                          <img align=\"right\" style=\"width: 40px; height:40px;\" src=$img_f>
                          </span>
                          </a>
                          </li>";  
                  }
                  }
                  }
                  ?>
                  <?php 
                     if(isset($_POST['add'])){
                       if(!empty($_POST['check_list1'])){
                           foreach($_POST['check_list1'] as $selected){
                             $sql = "INSERT INTO my_sources (user_name)
                             VALUES ('".$selected."')";
                         
                             $result = mysqli_query($conn,$sql);
                             echo "inserted ".$selected;
                         
                         }
                           $sql_f = "SELECT * FROM my_sources,news_arabic WHERE my_sources.user_name=news_arabic.user_name";
                             $result_f = mysqli_query($conn,$sql_f);
                     
                             if ($result_f->num_rows > 0) {
                               // output data of each row
                               echo "<ul  class='desc hnav'>";
                                   while($row_f = $result_f->fetch_assoc()) { 
                     
                     
                             $uname_f=$row_f["user_name"];
                             $id_f=$row_f["user_id"];
                             $img_f=$row_f["user_profile_image_url"];
                             echo "<li>";
                             echo "<span><input type=\"checkbox\" name=\"check_list_f[]\" value=$uname_f checked>
                             <a href=\"display.php?id=$id_f?>\">$uname_f
                            <img align=\"right\" style=\"width: 40px; height:40px;\" src=$img_f>
                            </span>
                            </a>
                            </li>";  
                  }
                  }
                  }
                  }
                  ?>
                  <?php 
                     if(isset($_POST['delete'])){
                       if(!empty($_POST['check_list_f'])){
                         // Loop to store and display values of individual checked checkbox.
                           $k=count($my_final_sources);
                           foreach($_POST['check_list_f'] as $selected){
                             if ($my_final_sources[$k]=$selected)
                             {
                               unset($my_final_sources[$k]);
                             }
                             $k++;
                         
                         }
                         foreach($my_final_sources as $name){
                           echo $name;
                           $sql_f = "SELECT * FROM news_arabic WHERE user_name='".$name."' ";
                             $result_f = mysqli_query($conn,$sql_f);
                     
                             if ($result_f->num_rows > 0) {
                               // output data of each row
                               echo "<ul  class='desc hnav'>";
                                   while($row_f = $result_f->fetch_assoc()) { 
                     
                     
                             $uname_f=$row_f["user_name"];
                             $id_f=$row_f["user_id"];
                             $img_f=$row_f["user_profile_image_url"];
                             echo "<li>";
                             echo "<span><input type=\"checkbox\" name=\"check_list_f[]\" value=$uname_f checked>
                             <a href=\"display.php?id=$id_f?>\">$uname_f
                  <img align=\"right\" style=\"width: 40px; height:40px;\" src=$img_f>
                  </span>
                  </a>
                  </li>";  
                  }
                  }
                  }
                  }
                  }
                  ?>
                  <br>
                  <center>
                     <input type="submit" name="delete" class="btn btn-danger" value="Delete">
                  </center>
                  </form>
               </div>
            </div>
         </div>
         <hr>
      </div>
      <!-- PAGE CONTENT and PHP CODE WILL BE HERE -->  
      <div class="col-sm-9">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">Live Twitter Feed</h3>
               <ul class="list-inline panel-actions">
                  <li><a href="#" id="panel-fullscreen" role="button" title="Toggle fullscreen">
                     <i class="glyphicon glyphicon-resize-full"></i></a>
                  </li>
               </ul>
            </div>
            <div class="panel-body">
               <!-- <a style="width:100%;background-color: gray;" href="manage.php" 
                  class="btn btn-primary btn-block" role="button">Manage Your Sources</a> -->
               <?php include 'tweets.php'; ?>
            </div>
         </div>
      </div>
      <!-- call tweets.php -->
      </div> <!-- end <div class="container"> -->	 
      </div>
   </body>
</html>