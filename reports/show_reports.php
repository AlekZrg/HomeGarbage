<?php
$firstDayOfMonth = date('Y-m-01');
$lastMonth = date('Y-m-d', strtotime('-30 days'));
$firstDayOfYear = date('Y-01-01');
$lastYear = date('Y-m-d', strtotime('-365 days'));
$today = date('Y-m-d');
$total = 0;
if (isset($_POST['report_period_from'])) $date_from = $_POST['report_period_from'];
if (isset($_POST['report_period_to'])) $date_to = $_POST['report_period_to'];
if (isset($_POST['report_type'])) $report_type = $_POST['report_type'];
if (isset($_POST['report_type'])) {
    require_once "rep1-4.php";
    require_once "rep5-9.php";
    require_once "rep10-14.php";
    require_once "rep15-19.php";
    }
if (isset($q_rep)) {
    echo "<div class='op_show' style='font-weight: bold'>
    <span class='op_show_span1'style='text-align: center'>Дата</span>
    <span class='op_show_span2'style='text-align: center'>Кошелек</span>
    <span class='op_show_span3'style='text-align: center'>Категория</span>
    <span class='op_show_span4'style='text-align: center'>Стоимость</span>
    <span class='op_show_span6'style='text-align: center'>Описание</span>";
    echo "</div>";
//if (isset($q_rep)) echo $q_rep;
    mysqli_error($connect);
    $report_query = mysqli_query($connect, $q_rep);
    while ($row = mysqli_fetch_array($report_query)) {
        $new_date = date('d.m.Y', strtotime($row['date']));
        echo "<div class='alt_color op_show'>
    <span class='op_show_span1'>{$new_date}</span>
    <span class='op_show_span2'>{$row['wallet']}</span>
    <span class='op_show_span3'>{$row['category']}</span>
    <span class='op_show_span4'>" . add_spaces($row['value']) . "р.</span>
    <span class='op_show_span5'>{$row['description']}</span>";
        echo "</div>";
        $total = $total + $row['value'];
    }
    echo "<div style='width: 100%; text-align: right'><h3>Итого: " . add_spaces($total) . "</h3></div>";
}