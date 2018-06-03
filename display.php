<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="icon" type="image/png" href="https://excellence.qa/wp-content/uploads/2016/12/qatar-foundation.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>News Source</title>
    <style>
    #menu1 {
        width:95%;
        height:95%;
        position:absolute;
    }
    .heading {
        color: #8D1B3D;
        font-family: "Times New Roman", Times, serif;
        font-size: 35px;
        font-weight: bold;
    }
    .desc {
        font-size: 20px;
        font-family: "Times New Roman", Times, serif;
    }
    ul.social-network {
    list-style: none;
    display: inline;
    margin-left: 0 !important;
    padding: 0;
    }
    @media (max-width: 769px){
    .social-circle li a {
    display: inline-block;
    position: relative;
    margin: 0 auto 10px auto;
    border-radius: 19px;
    text-align: center;
    width: 38px;
    height: 38px;
    font-size: 16px;
    -moz-border-radius: 19px;
    -webkit-border-radius: 19px;
    }
    .social-circle li a {
    display: inline-block;
    position: relative;
    margin: 0 auto 10px auto;
    -moz-border-radius: 25px;
    -webkit-border-radius: 25px;
    border-radius: 25px;
    text-align: center;
    width: 50px;
    height: 50px;
    font-size: 20px;
    
    }
    }
    .glyphicon {
    font-size: 35px;
    color: #8D1B3D;
    }
    li {
        float:left;
    }
    </style>
    
</head>
<body style="bgcolor:"#a2a276"">
    <?php
    include 'dbconnection.php';
    $id= $_GET["id"];
    ?>
        <div class="container" >
  
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
            <li><a data-toggle="tab" href="#menu1">Source</a></li>
        </ul>
            <?php 
            $sql = "SELECT * FROM news_arabic WHERE user_id='$id'"; 
            $rs = $conn->query($sql);
            $row = mysqli_fetch_array($rs);
            ?>
                <div class="tab-content">

                <div id="home" class="tab-pane fade in active">  
                    <img align="left" style="width: 55px; height:55px;" src="<?php echo $row["user_profile_image_url"]?>"> 
                    <h3 class="heading"><?php echo $row["user_name"]?>/<?php echo $row["user_screen_name"]?></h3>  
                    <hr>
                    <p class="desc"><?php echo $row["user_description"]?></p>
                    <br>
                    <center>
                    <ul class="social-network social-circle">
                        <li><a href="<?php echo $row["RSS Feed link"]?>" target="_blank" class="icoRss" title="Rss"><i class="glyphicon fa fa-rss"></i></a>
                        </li>
                        <li>
                            <?php $fb= "https://www.facebook.com/".$row["Facebook Page (https://www.facebook.com/)"]?><a href=<?php echo $fb ?> target="_blank" class="icoFacebook" title="Facebook"><i class="glyphicon fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <?php $tw="https://twitter.com/".$row["user_screen_name"] ?><a href=<?php echo $tw ?> target="_blank" class="icoTwitter" title="Twitter"><i class="glyphicon fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <?php $wiki="https://ar.wikipedia.org/wiki/".$row["Wikipedia page (https://ar.wikipedia.org/wiki/)"] ?><a href=<?php echo $wiki ?> target="_blank" class="icoWikipedia" title="Wikipedia"><i class="glyphicon fa fa-wikipedia-w"></i></a>
                        </li>
                    </ul>
                    <center>
                </div>

                <div id="menu1" class="tab-pane fade">
                <iframe src="<?php echo $row["user_expanded_url"]?>" height=95% width=95% frameborder="0" gesture="media" allow="encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>


</body>
</html>