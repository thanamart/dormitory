<?php
include 'connectdb.php';
session_start();
if(isset($_GET['action'])){
	if($_GET['action'] == 'edit'){
		$strSQL = "SELECT * FROM videos WHERE video_id = '".$_GET["video_id"]."' ";
		$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
		$objResult = mysql_fetch_array($objQuery);
	}else if($_GET['action'] == 'save_edit'){	
		if($_FILES["filUpload"]["name"] != ""){
		//*** Delete Old File ***//			
		@unlink("vdo/".$_POST["hdnOldFile"]);
			if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"vdo/".$_FILES["filUpload"]["name"]))
			{
				//*** Update New File ***//
				$strSQL = "UPDATE videos ";
				$strSQL .=" SET video_name = '".$_FILES["filUpload"]["name"]."' WHERE video_id = '".$_GET["video_id"]."' ";
				$objQuery = mysql_query($strSQL);		
			}
		}
	}else if($_GET['action'] == 'view'){
		$strSQL = "SELECT * FROM videos WHERE video_id = '".$_GET["video_id"]."' ";
		$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
		$objResult = mysql_fetch_array($objQuery);
	}else if($_GET['action'] == 'delete'){
		$strSQL = "SELECT * FROM videos WHERE video_id = '".$_GET["video_id"]."' ";
		$objQuery = mysql_query($strSQL) or die ("Error Query [".$strSQL."]");
		$objResult = mysql_fetch_array($objQuery);
		
		@unlink("vdo/".$objResult["video_name"]);

		$strSQL = "DELETE FROM videos ";
		$strSQL .="WHERE video_id = '".$_GET["video_id"]."' ";
		$objQuery = mysql_query($strSQL);
	}
}
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php include 'script.php'; ?>
</head>
<body>
<?php include 'topbar.php'; ?>
<?php
	$strSQL1 = "SELECT * FROM videos";
	$objQuery1 = mysql_query($strSQL1) or die ("Error Query [".$strSQL1."]");
?>
<br>
<a href="upload.php">ADD VIDEOS</a>
<br>
<table width="550" border="1">
	<tr>
		<th width="100"> <div align="center">Videos ID </div></th>
		<th width="200"> <div align="center">Name</div></th>
		<th width="50"> <div align="center">&nbsp;</div></th>
		<th width="50"> <div align="center">&nbsp;</div></th>
		<th width="50"> <div align="center">&nbsp;</div></th>
	</tr>
<?php
	while($objResult1 = mysql_fetch_array($objQuery1))
	{
?>
		<tr>
		<td><div align="center"><?=$objResult1["video_id"];?></div></td>
		<td><center><?=$objResult1["video_name"];?></center></td>
		<td><center><a href="myVideos.php?action=edit&video_id=<?=$objResult1["video_id"];?>">Edit</a></center></td>
		<td><center><a href="myVideos.php?action=view&video_id=<?=$objResult1["video_id"];?>">View</a></center></td>
		<td><center><a href="myVideos.php?action=delete&video_id=<?=$objResult1["video_id"];?>">Delete</a></center></td>
		</tr>
<?php
	}
?>
</table>
<br>
<?php
if(isset($_GET['action'])){
	if($_GET['action'] == 'edit'){
?>
		<form name="form1" method="post" action="myVideos.php?action=save_edit&video_id=<?=$_GET["video_id"];?>" enctype="multipart/form-data">
			Edit<input type="file" name="filUpload"><br>
			<input type="hidden" name="hdnOldFile" value="<?=$objResult["video_name"];?>">
			<input name="btnSubmit" type="submit" value="Submit">
		</form>
<?php
	}else if($_GET['action'] == 'view'){
?>
		<h1> <?=$objResult["video_name"];?></h1>
		<div id="container"><a href="http://www.macromedia.com/go/getflashplayer">Get the Flash Player</a> to see this player.</div>
		<script type="text/javascript" src="assets/js/swfobject.js"></script>
		<script type="text/javascript">
			var s1 = new SWFObject("vdo/player.swf","mediaplayer","500","500","8");
			s1.addParam('allowscriptaccess','always');
			s1.addParam("allowfullscreen","true");
			s1.addVariable("file","<?=$objResult["video_name"];?>");
			s1.addVariable('displayheight','240');
			s1.addVariable('autoscroll','true');
			s1.write("container");
		</script>
<?php
	}
}
?>
</body>
</html>