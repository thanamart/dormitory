<table border="1" style="width: 300px">
	<tbody>
		<tr>
			<td width="120"><b>&nbsp;Username</b></td>
			<td width="197"><?= $objResult["username"]; ?>
			</td>
		</tr>
		<tr>
			<td><b>&nbsp;Name</b></td>
			<td><?= $objResult["name"]; ?></td>
		</tr>
		<tr>
			<td><b>&nbsp;Last name</b></td>
			<td><?= $objResult["lastname"]; ?></td>
		</tr>
		<tr>
			<td><b>&nbsp;Tel No.</b></td>
			<td><?= $objResult["tel"]; ?></td>
		</tr>
		<tr>
			<td><b>&nbsp;Last login</b></td>
			<td><?= $objResult["last_login"] ?>
			<a href='topdf.php'>export to pdf</a>
			</td>
		</tr>
		<tr>
			<td><b>&nbsp;Picture</b></td>
			<td><?php
				if(isset($objResult["file_id"])){
				?>
					<center><img src="viewImage.php?file_id=<?=$objResult["file_id"];?>" height="400" width="400"></center>
				<?php
				}
				?>
			</td>
		</tr>
	</tbody>
</table>