<?php
$connect = mysqli_connect('localhost', 'root', '12345678', 'accaunting');
require_once '../functions.php';
$myvar = array();

if (!$connect) echo "connection unsuccesfull";

$fp = fopen('2.csv', 'r');
if (!$fp) echo "file cannot be readen";
	else {

	while (($text = fgetcsv($fp,999,";")) !== FALSE) {
		
		$num=count($text);
		for ($i=0; $i < $num; $i++) {
			$string = $text[$i];
			$string = iconv('WINDOWS-1251', 'UTF-8', $string);
			//$ins_date; $wallet; $cat; $ins_description; $ins_value;
				switch ($i)
				{
				  case 0: 
				  echo "<b>это дата: </b>";
				  $string = date_create($string);
				  $ins_date = date_format($string, 'Y-m-d');
				  echo $ins_date."<br>";
				  break;
				  
				  case 1:
				  echo "<b>это кошелек: </b>"; echo $string."<br>";
				  $q_get_wallet_id = mysqli_query($connect, "SELECT `id` FROM `wallets` WHERE `description` = '{$string}';");
				  $wallet_id = mysqli_fetch_array($q_get_wallet_id);
				  echo $wallet_id[0]."<br>";
				  $wallet = $wallet_id[0];
				  break;
				  
				  case 2:
				  echo "<b>это категория расходов: </b>"; echo $string."<br>";
				  $q_get_cat_id = mysqli_query($connect, "SELECT `id` FROM `IncomeAndExpenses` WHERE `value` = '{$string}' AND `type` = 1;");
				  $cat_id = mysqli_fetch_array($q_get_cat_id);
				  echo $cat_id[0]."<br>";
				  $cat = $cat_id[0];
				  break;
				  
				  case 3:
				  echo "<b>это описание: </b>"; echo $string."<br>";
				  $ins_description = $string;
				  break;
				  
				  case 4:
				  echo "<b>это численное значение: </b>"; 
				  $ins_value = remove_spaces($string);
				  $ins_value = str_replace(',', '.', $ins_value);
				  $ins_value = $ins_value * '-1';
				  echo $ins_value."<br><br><br>";
				  break;
				}
			if ($i == 4) {
			echo "<div style='color: red'>{$wallet} - {$cat} - {$ins_value} - {$ins_description}</div>";
			$q_insert_row = mysqli_query($connect, 
				"INSERT INTO `operations` 
					(`id`, `date`, `wallet_id`, `cat_id`, `cat_type_id`, `value`, `description`) 
				VALUES (NULL, '{$ins_date}', '{$wallet}', '{$cat}', '1', '{$ins_value}', '{$ins_description}');");
				echo mysqli_error($connect);
				}
			}
		echo "<br>";
		}
	}
//unset($myvar[0],$myvar[1],$myvar[2],$myvar[3],$myvar[4],$myvar[5],$myvar[6],$myvar[21],$myvar[30],$myvar[33],$myvar[20],$myvar[32]);
print_r($text);

//echo "<br><br><br><br>".count($myvar);

/*
foreach ($myvar as $i)
	{
	echo $i;
	$query = "INSERT INTO `expenses` (`id`, `value`) VALUES (NULL, '".$i."');";
	mysqli_query($connect, $query);
	if ($query)echo "success"; else echo "not success";
	}
*/


?>