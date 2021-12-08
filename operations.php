<?php 
echo "		<section class='MainWindow'>
		<div class='tabs'>
		<input type='radio' id='tab1' name='tab_group' "; if (!isset($_GET['tab'])) echo "checked"; echo ">
		<label for='tab1' class='tab_title' style='border-radius: 0 10px 0 0;'>Income</label>";
        require_once 'operations/op_income.php';
		echo "
        </div>
		
		<div class='tabs'>
		<input type='radio' id='tab2' name='tab_group' "; if (isset($_GET['tab']) && $_GET['tab']=="exp") echo "checked"; echo ">
		<label for='tab2' class='tab_title'>Expenses</label>";
		require_once 'operations/op_expences.php';
		echo "
		</div>
		
		<div class='tabs'>
		<input type='radio' id='tab3' name='tab_group' "; if (isset($_GET['tab']) && $_GET['tab']=="move") echo "checked"; echo ">
		<label for='tab3' class='tab_title'>Movements</label>";
		require_once 'operations/op_movements.php';
		echo "</div>
		</section>";