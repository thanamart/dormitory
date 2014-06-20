<?php
include 'connectdb.php';
session_start();
if(isset($_POST['Submit']) || isset($_GET['user_id'])){
	$strSQL = "";
	$Search = "";
	$Search2 = "";
	if(isset($_POST['Submit'])){
		$Search = $_POST['Search'];
		$Search2 = $_POST['Search2'];
	}else if(isset($_GET['user_id'])){
		$Search = $_GET['Search'];
		$Search2 = $_GET['Search2'];
	}
	$strSQL = "select * from users where ".$Search2." like '%".$Search."%' ";	
	$objQuery = mysql_query($strSQL);
	if ($objQuery === FALSE) {
		die(mysql_error()); // TODO: better error handling
	}
	$objResult1 = mysql_fetch_array($objQuery);
}
	if(isset($_GET['user_id'])){
		$strSQL = "SELECT * FROM users where user_id = " . $_GET['user_id'];
		$objQuery = mysql_query($strSQL);
		if ($objQuery === FALSE) {
			die(mysql_error()); // TODO: better error handling
		}
		$objResult = mysql_fetch_array($objQuery);
	}
?>
<html>
    <head>
        <title></title>
		<?php include 'script.php'; ?>
    </head>
    <body>
		<?php include 'topbar.php'; ?>
		<div class="row">
		<form name="form1" method="post" action="search.php">
			<h3>ค้นหา :</h3>
			<table width="100%" >
				<tr>
					<td width="30%">
						<div align="left">
							<select name="Search2">
							<?php if(!isset($_POST['Search2'])){ $Search2 = "user_id"; } else { $Search2 = $_POST['Search2']; } ?>
								 <option value="user_id" <?php if($Search2=="user_id"){ ?>selected<?php }?>>รหัสผู้ใช้งาน (default) </option>
								 <option value="name" <?php if($Search2=="name"){ ?>selected<?php }?>>ชื่อ</option>
								 <option value="lastname" <?php if($Search2=="lastname"){ ?>selected<?php }?>>นามสกุล</option>
							</select>
						</div>
					</td>
					<td width="30%">
						<input name="Search" type="text" size="20" value="<?php if(isset($Search)){ echo $Search; } ?>">
					</td>
					<td width="40%"><input type="submit" name="Submit" value="search"> ตามรหัสผู้ใช้งาน,ชื่อ, นามสกุล</td>
				</tr>
			</table>
		</form>
		</div>
		<div class="row">
		<?php if((isset($_POST['Submit']) && isset($objResult1)) || isset($_GET['user_id'])){ ?>
			<table border="1" style="width: 300px">
				<thead>
					<tr>
						<td>User Id</td>
						<td>Name</td>
						<td>Lastname</td>
					</tr>
				</thead>
				<tbody>
					<tr onclick="document.location='search.php?user_id=<?=$objResult1['user_id']; ?>&Search=<?=$Search;?>&Search2=<?=$Search2;?>'" style="cursor:pointer">
						<td width="197"><?=$objResult1["user_id"]; ?></td>
						<td width="197"><?=$objResult1["name"]; ?></td>
						<td width="197"><?=$objResult1["lastname"]; ?></td>						
					</tr>
				</tbody>
			</table>
		<?php }
		if(isset($_GET['user_id'])){
			include 'user_details.php';
		}
		?>
		</div>
	</body>
</html>