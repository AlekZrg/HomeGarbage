<?php
echo "<section class=\"MainWindow\">
		<div class=\"tabs\">
		<input type=\"radio\" id=\"set_tab1\" name=\"set_tab_group\" "; if (!isset($_GET['tab'])) echo "checked"; echo ">
		<label for=\"set_tab1\" class=\"tab_title\" style=\"border-radius: 0 10px 0 0;\">Category of Income</label>
			<div class=\"tab_content\">";
			require_once("tab_set_income/tab_set_income.php");
			echo "
			</div>
		</div>
		
		<div class=\"tabs\">
		<input type=\"radio\" id=\"set_tab2\" name=\"set_tab_group\""; if (isset($_GET['tab'])&&$_GET['tab']=='expenses') echo " checked"; echo ">
		<label for=\"set_tab2\" class=\"tab_title\">Category of Expenses</label>

		
			<div class=\"tab_content\">";
			require_once("tab_set_exp.php");
			echo 
			"</div>
		</div>
		
		<div class=\"tabs\">
		<input type=\"radio\" id=\"set_tab3\" name=\"set_tab_group\">
		<label for=\"set_tab3\" class=\"tab_title\">Reserve tab</label>
		<div class=\"tab_content\">Text for third tab</div>

		</div>
</section>
<!--<script src='js/selectAllExpenses.js'></script>
<script src='js/selectAllIncome.js'></script> удалить за ненадобностью если всё будет работать, т.к. изобрёл единую функцию docheck_new-->
";
?>
