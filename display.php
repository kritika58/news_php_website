<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>News Source</title>
<style>
table {
    border-collapse: collapse;
    width: 70%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
</head>
<body>

<?php
include 'dbconnection.php';
$id= $_GET["id"];
?>

<?php
$sql = "SELECT * FROM details,id_name WHERE details.user_id='$id' && id_name.id=details.user_id"; 
$rs = $conn->query($sql);
// $rs = mysql_query($sql, $conn) or die ('Problem with query'.mysql_error());
while ($row = mysqli_fetch_array($rs)) {
?>
<center>
<table border="1" summary="Summary">
<tr>
    <td>ID</td>
    <td><?php echo $row["user_id"]?></td>
</tr>
<tr>
    <td>User Screen Name</td>
    <td><?php echo $row["user_screen_name"]?></td>
</tr>
<tr>
    <td>User Name</td>
    <td><?php echo $row["user_name"]?></td>
</tr>
<tr>
    <td>URL</td>
    <td><a target="_blank" href="<?php echo $row["user_expanded_url"]?>"><?php echo $row["user_expanded_url"]?></a></td>
</tr>
<tr>
    <td>Facebook Page</td>
    <td><a target="_blank" href="<?php echo $row["Facebook Page"]?>"><?php echo $row["Facebook Page"]?></a></td>
</tr>
<tr>
    <td>RSS Feed Link</td>
    <td><a target="_blank" href="<?php echo $row["RSS Feed link"]?>"><?php echo $row["RSS Feed link"]?></a></td>
</tr>
<tr>
    <td>User Display URL</td>
    <td><a target="_blank" href="<?php echo $row["user_display_url"]?>"><?php echo $row["user_display_url"]?></a></td>
</tr>
<tr>
    <td>User Verified</td>
    <td><?php echo $row["user_verified"]?></td>
</tr>
<tr>
    <td>News Source</td>
    <td><?php echo $row["newssource"]?></td>
</tr>
<tr>
    <td>News Source Confidence</td>
    <td><?php echo $row["newssource:confidence"]?></td>
</tr>
<tr>
    <td>User Creation Time</td>
    <td><?php echo $row["user_created_at"]?></td>
</tr>
<tr>
    <td>Description</td>
    <td><?php echo $row["user_description"]?></td>
</tr>
<tr>
    <td>Follower Count</td>
    <td><?php echo $row["user_followers_count"]?></td>
</tr>
<tr>
    <td>Favourites Count</td>
    <td><?php echo $row["user_favourites_count"]?></td>
</tr>
<tr>
    <td>Friends Count</td>
    <td><?php echo $row["user_friends_count"]?></td>
</tr>
<tr>
    <td>Geo Enabled</td>
    <td><?php echo $row["user_geo_enabled"]?></td>
</tr>
<tr>
    <td>Language</td>
    <td><?php echo $row["user_lang"]?></td>
</tr>
<tr>
    <td>Listed Count</td>
    <td><?php echo $row["user_listed_count"]?></td>
</tr>
<tr>
    <td>Location</td>
    <td><?php echo $row["user_location"]?></td>
</tr>
<tr>
    <td>Profile Image</td>
    <td><img src="<?php echo $row["user_profile_image_url"]?>"></td>
</tr>
<tr>
    <td>Statuses Count</td>
    <td><?php echo $row["user_statuses_count"]?></td>
</tr>
<tr>
    <td>Time Zone</td>
    <td><?php echo $row["user_time_zone"]?></td>
</tr>
<tr>
    <td>User URL</td>
    <td><a href="<?php echo $row["user_url"]?>"><?php echo $row["user_url"]?></a></td>
</tr>

</table>
</center>
<?php } ?>
</body>
</html>