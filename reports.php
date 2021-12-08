<div class="setting_window op_show" style="display: block; max-height: calc(100% - 10px);">
    <form action="IndexFinance.php?page=reports" name="report" method="POST">
    <div id="period_for_reports_id" style="display: none">
    <b>Период с: </b><input type='date' name='report_period_from' value='<?php if (isset($_SESSION['report_from'])) echo $_SESSION['report_from']; else echo date('Y-m-d')?>'>
    <b>по: </b><input type='date' name='report_period_to' value='<?php if (isset($_SESSION['report_to'])) echo $_SESSION['report_to']; else echo date('Y-m-d')?>'>
    </div>
    <div style="margin-top: 5px;">
    <select id="repId" name="report_type" onchange="show_report_period()">
        <optgroup label="Расходы Сгруппированные">
            <option value="rep0">Расходы сгруппированные с начала месяца</option>
            <option value="rep1">Расходы сгруппированные за месяц</option>
            <option value="rep2">Расходы сгруппированные с начала года</option>
            <option value="rep3">Расходы сгруппированные за год</option>
            <option value="rep4">Расходы сгруппированные за период</option>
        </optgroup>
        <optgroup label="Расходы Детальные">
            <option value="rep5">Расходы детальные с начала месяца</option>
            <option value="rep6">Расходы детальные за месяц</option>
            <option value="rep7">Расходы детальные с начала года</option>
            <option value="rep8">Расходы детальные за год</option>
            <option value="rep9">Расходы детальные за период</option>
        </optgroup>
        <optgroup label="Доходы Сгруппированные">
            <option value="rep10">Доходы сгруппированные с начала месяца</option>
            <option value="rep11">Доходы сгруппированные за месяц</option>
            <option value="rep12">Доходы сгруппированные с начала года</option>
            <option value="rep13">Доходы сгруппированные за год</option>
            <option value="rep14">Доходы сгруппированные за период</option>
        </optgroup>
        <optgroup label="Доходы Детальные">
            <option value="rep15">Доходы детальные с начала месяца</option>
            <option value="rep16">Доходы детальные за месяц</option>
            <option value="rep17">Доходы детальные с начала года</option>
            <option value="rep18">Доходы детальные за год</option>
            <option value="rep19">Доходы детальные за период</option>
        </optgroup>
    </select>
    <input type="submit" value="Показать" style="padding: 4px;">
    </div>
    </form>

    <div style="margin-top: 10px">
<?php
require_once "reports/show_reports.php";
?>
    </div>
</div>
