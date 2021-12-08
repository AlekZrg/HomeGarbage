<!DOCTYPE HTML>
<html>
<head>
<meta charset="windows-1251">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Display:ital@0;1&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/body.css" media="all">
<link rel="stylesheet" type="text/css" href="css/tabs.css" media="all">
<link rel="stylesheet" type="text/css" href="css/accordion.css" media="all">

<title>Тег DIV</title>
</head>
<body>
<script src="js/functions.js"></script>
<div class="MainBox">
	<div class="inner_header">Welcome dear Alek</div>

	<div class="MenuBG">
		<div class="MenuButtons"><a href="IndexFinance.php?page=operations" class="Menubuttons">Operations</a></div>
		<div class="MenuButtons"><a href='IndexFinance.php?page=reports' class="Menubuttons">Reports</a></div>
		<div class="MenuButtons"><a href=# class="Menubuttons">Graphics</a></div>
		<div class="MenuButtons"><a href="IndexFinance.php?page=settings" class="Menubuttons">Settings</a></div>

	</div>

	<div class="clearfix_container">
	<div class="WalletsPreview">
	<span class="WalletsPreview">Wallets:</span>
		<table cellpadding=5 cellspacing=0 border=0 class="ListOfWalletsOnPreview">
		<tr><td class="WalletName" colspan=2>
			<div class="addWalletOnPreview">
				<div class="accordion"><img src="img/add.png"><a href="#">Add wallet</a></div>
				<div class="panel" style="margin: 0px; padding: 0px; text-align: right;">
					<div style="position: relative; right: 0px;">
					<form action="add_wallet.php" method="POST">
					<input type="text" name="wallet_name" style="margin: 0px; padding: 3px;">
					<button style=" height: 25px; margin: 0px; padding: 0px; float: right;"><img src="img/green_mark1.png" height="22px" style="margin: 0px; padding: 0px;"></button>
					</form>
					</div>
				</div>
			</div>
		</td></tr>
		<?php
		$q_list_of_wallets = "SELECT * FROM `wallets` ORDER BY `z-index` ASC;";
		$list_of_wallets = mysqli_query($connect, $q_list_of_wallets);
		while ($row = mysqli_fetch_assoc($list_of_wallets))
			{
			//echo $row['description'];
			echo "<tr><td class=\"WalletName\">
				<div class=\"accordion\">- ".$row['description']."</div>
				<div class=\"panel\">
					<a href=\"move_wallet.php?id=".$row['id']."&direction=up\"><img src=\"img/_up.png\" width=\"20\" height=\"20\" alt=\"Edit\"></a>
					<a href=\"move_wallet.php?id=".$row['id']."&direction=down\"><img src=\"img/_down.png\" width=\"20\" height=\"20\" alt=\"Delete\"></a>
					<a href=\"wallet_delete.php?id=".$row['id']."\"><img src=\"img/delete.png\" width=\"20\" height=\"20\" alt=\"Edit\"></a>	
				</div></td>
				<td>- ".add_spaces($row['ballance'])."р.
			</td></tr>";
			}
		?>
		</table>
                <?php
                    //require_once 'exchange_rates.php';
                ?>
	</div>
	<div class="MainWindow">
		<?php
		if (!isset($_GET['page']) OR $_GET['page'] == "operations") require_once 'operations.php';
		elseif ($_GET['page'] == "settings") require_once 'settings.php';
        elseif ($_GET['page'] == "reports") require_once 'reports.php';
		?>
	</div>
	</div>

	<div class="footer">
		<span style="display: inline-block; border: 0 solid red; padding: 5px;">
		All rights reserved(C) Aleksei Blagodatskih
		</span>
	</div>
</div>
<script src="js/accordion.js"></script>
</body>
</html>