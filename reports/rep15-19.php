<?php

switch ($report_type) {
    case "rep15": //С начала месяца детальный
        $q_rep = "SELECT 
                            operations.date AS date,
                            w.description AS wallet,
                            IAE.value AS category,
                            operations.value AS value,
                            operations.description AS description
                        FROM `operations` 
                        JOIN `wallets` w on `operations`.wallet_id = w.id
                        JOIN IncomeAndExpenses IAE on operations.cat_id = IAE.id
                        WHERE `operations`.date >='{$firstDayOfMonth}' AND `operations`.date <= '{$today}' AND `operations`.cat_type_id = 0
                        ORDER BY `date`;
                        ";
        break;
    case "rep16": //За последние 30 дней детальный
        $q_rep = "SELECT 
                            operations.date AS date,
                            w.description AS wallet,
                            IAE.value AS category,
                            operations.value AS value,
                            operations.description AS description
                        FROM `operations` 
                        JOIN `wallets` w on `operations`.wallet_id = w.id
                        JOIN IncomeAndExpenses IAE on operations.cat_id = IAE.id
                        WHERE `operations`.date >='{$lastMonth}' AND `operations`.date <= '{$today}' AND `operations`.cat_type_id = 0
                        ORDER BY `date`;
                        ";
        break;
    case "rep17": //C начала года детальный
        $q_rep = "SELECT 
                            operations.date AS date,
                            w.description AS wallet,
                            IAE.value AS category,
                            operations.value AS value,
                            operations.description AS description
                        FROM `operations` 
                        JOIN `wallets` w on `operations`.wallet_id = w.id
                        JOIN IncomeAndExpenses IAE on operations.cat_id = IAE.id
                        WHERE `operations`.date >='{$firstDayOfYear}' AND `operations`.date <= '{$today}' AND `operations`.cat_type_id = 0
                        ORDER BY `date`;
                        ";
        break;
    case "rep18": //За последние 365 дней детальный
        $q_rep = "SELECT 
                            operations.date AS date,
                            w.description AS wallet,
                            IAE.value AS category,
                            operations.value AS value,
                            operations.description AS description
                        FROM `operations` 
                        JOIN `wallets` w on `operations`.wallet_id = w.id
                        JOIN IncomeAndExpenses IAE on operations.cat_id = IAE.id
                        WHERE `operations`.date >='{$lastYear}' AND `operations`.date <= '{$today}' AND `operations`.cat_type_id = 0
                        ORDER BY `date`;
                        ";
        break;
    case "rep19": //За указанный период детальный
        $q_rep = "SELECT 
                            operations.date AS date,
                            w.description AS wallet,
                            IAE.value AS category,
                            operations.value AS value,
                            operations.description AS description
                        FROM `operations` 
                        JOIN `wallets` w on `operations`.wallet_id = w.id
                        JOIN IncomeAndExpenses IAE on operations.cat_id = IAE.id
                        WHERE `operations`.date >='{$date_from}' AND `operations`.date <= '{$date_to}' AND `operations`.cat_type_id = 0
                        ORDER BY `date`;
                        ";
        break;
}