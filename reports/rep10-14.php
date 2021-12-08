<?php
switch ($report_type) {
    case "rep10": //С начала месяца сгруппированный
        $q_rep = "SELECT 
                            MIN(operations.date) AS date,
                            w.description AS wallet,
                            IAE.value AS category,
                            ROUND(SUM(operations.value),2) AS value,
                            operations.description AS description
                        FROM `operations` 
                        JOIN `wallets` w on `operations`.wallet_id = w.id
                        JOIN IncomeAndExpenses IAE on operations.cat_id = IAE.id
                        WHERE `operations`.date >='{$firstDayOfMonth}' AND `operations`.date <= '{$today}' AND `operations`.cat_type_id = 0
                        GROUP BY `IAE`.value;
                        ";
        break;
    case "rep11": //За последние 30 дней сгруппированный
        $q_rep = "SELECT 
                            MIN(operations.date) AS date,
                            w.description AS wallet,
                            IAE.value AS category,
                            ROUND(SUM(operations.value),2) AS value,
                            operations.description AS description
                        FROM `operations` 
                        JOIN `wallets` w on `operations`.wallet_id = w.id
                        JOIN IncomeAndExpenses IAE on operations.cat_id = IAE.id
                        WHERE `operations`.date >='{$lastMonth}' AND `operations`.date <= '{$today}' AND `operations`.cat_type_id = 0
                        GROUP BY `IAE`.value;
                        ";
        break;
    case "rep12": //C начала года сгруппированный
        $q_rep = "SELECT 
                            MIN(operations.date) AS date,
                            w.description AS wallet,
                            IAE.value AS category,
                            ROUND(SUM(operations.value),2) AS value,
                            operations.description AS description
                        FROM `operations` 
                        JOIN `wallets` w on `operations`.wallet_id = w.id
                        JOIN IncomeAndExpenses IAE on operations.cat_id = IAE.id
                        WHERE `operations`.date >='{$firstDayOfYear}' AND `operations`.date <= '{$today}' AND `operations`.cat_type_id = 0
                        GROUP BY `IAE`.value;
                        ";
        break;
    case "rep13": //За последние 365 дней сгруппированный
        $q_rep = "SELECT 
                            MIN(operations.date) AS date,
                            w.description AS wallet,
                            IAE.value AS category,
                            ROUND(SUM(operations.value),2) AS value,
                            operations.description AS description
                        FROM `operations` 
                        JOIN `wallets` w on `operations`.wallet_id = w.id
                        JOIN IncomeAndExpenses IAE on operations.cat_id = IAE.id
                        WHERE `operations`.date >='{$lastYear}' AND `operations`.date <= '{$today}' AND `operations`.cat_type_id = 0
                        GROUP BY `IAE`.value;
                        ";
        break;
    case "rep14": //За указанный период сгруппированный
        $q_rep = "SELECT 
                            MIN(operations.date) AS date,
                            w.description AS wallet,
                            IAE.value AS category,
                            ROUND(SUM(operations.value),2) AS value,
                            operations.description AS description
                        FROM `operations` 
                        JOIN `wallets` w on `operations`.wallet_id = w.id
                        JOIN IncomeAndExpenses IAE on operations.cat_id = IAE.id
                        WHERE `operations`.date >='{$date_from}' AND `operations`.date <= '{$date_to}' AND `operations`.cat_type_id = 0
                        GROUP BY `IAE`.value;
                        ";
        break;
}