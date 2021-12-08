<?php
switch ($report_type) {
    case "rep0": //С начала месяца сгруппированный
        $q_rep = "SELECT 
                            MIN(operations.date) AS date,
                            w.description AS wallet,
                            IAE.value AS category,
                            ROUND(SUM(operations.value),2) AS value,
                            operations.description AS description
                        FROM `operations` 
                        JOIN `wallets` w on `operations`.wallet_id = w.id
                        JOIN IncomeAndExpenses IAE on operations.cat_id = IAE.id
                        WHERE `operations`.date >='{$firstDayOfMonth}' AND `operations`.date <= '{$today}' AND `operations`.cat_type_id = 1
                        GROUP BY `IAE`.value;
                        ";
        break;
    case "rep1": //За последние 30 дней сгруппированный
        $q_rep = "SELECT 
                            MIN(operations.date) AS date,
                            w.description AS wallet,
                            IAE.value AS category,
                            ROUND(SUM(operations.value),2) AS value,
                            operations.description AS description
                        FROM `operations` 
                        JOIN `wallets` w on `operations`.wallet_id = w.id
                        JOIN IncomeAndExpenses IAE on operations.cat_id = IAE.id
                        WHERE `operations`.date >='{$lastMonth}' AND `operations`.date <= '{$today}' AND `operations`.cat_type_id = 1
                        GROUP BY `IAE`.value;
                        ";
        break;
    case "rep2": //C начала года сгруппированный
        $q_rep = "SELECT 
                            MIN(operations.date) AS date,
                            w.description AS wallet,
                            IAE.value AS category,
                            ROUND(SUM(operations.value),2) AS value,
                            operations.description AS description
                        FROM `operations` 
                        JOIN `wallets` w on `operations`.wallet_id = w.id
                        JOIN IncomeAndExpenses IAE on operations.cat_id = IAE.id
                        WHERE `operations`.date >='{$firstDayOfYear}' AND `operations`.date <= '{$today}' AND `operations`.cat_type_id = 1
                        GROUP BY `IAE`.value;
                        ";
        break;
    case "rep3": //За последние 365 дней сгруппированный
        $q_rep = "SELECT 
                            MIN(operations.date) AS date,
                            w.description AS wallet,
                            IAE.value AS category,
                            ROUND(SUM(operations.value),2) AS value,
                            operations.description AS description
                        FROM `operations` 
                        JOIN `wallets` w on `operations`.wallet_id = w.id
                        JOIN IncomeAndExpenses IAE on operations.cat_id = IAE.id
                        WHERE `operations`.date >='{$lastYear}' AND `operations`.date <= '{$today}' AND `operations`.cat_type_id = 1
                        GROUP BY `IAE`.value;
                        ";
        break;
    case "rep4": //За указанный период сгруппированный
        $q_rep = "SELECT 
                            MIN(operations.date) AS date,
                            w.description AS wallet,
                            IAE.value AS category,
                            ROUND(SUM(operations.value),2) AS value,
                            operations.description AS description
                        FROM `operations` 
                        JOIN `wallets` w on `operations`.wallet_id = w.id
                        JOIN IncomeAndExpenses IAE on operations.cat_id = IAE.id
                        WHERE `operations`.date >='{$date_from}' AND `operations`.date <= '{$date_to}' AND `operations`.cat_type_id = 1
                        GROUP BY `IAE`.value;
                        ";
        break;
}