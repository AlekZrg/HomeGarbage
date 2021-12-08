function digits_show(digitId) {
    let ff; let ii;
    ff = document.getElementById(digitId).value.replace(/\s/g, "");
    //alert(ff);
    ii = ff.replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    document.getElementById(digitId).value = ii;
}

function docheck_new (check_name, element_name) {
    let allselected=document.getElementsByName(element_name).value;
    let check=document.getElementsByName(check_name);
    for(i=0;i<check.length;i++) {
        if (allselected!=true) {
            check[i].checked=true;
        }
        else check[i].checked=false;
    }
    if (allselected!=true) document.getElementsByName(element_name).value=true;
    else document.getElementsByName(element_name).value=false;
}

function check(event)
{
    //let keycode = event.keyCode;
    //alert(keycode);
    if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 190 || event.keyCode == 110 || event.keyCode == 13 || event.keyCode == 116 || event.keyCode == 17 ||
        // Разрешаем: Ctrl+A Ctrl+F5
        (event.keyCode == 65 && event.ctrlKey === true) ||(event.keyCode == 116 && event.ctrlKey === true) ||
        // Разрешаем: home, end, влево, вправо
        (event.keyCode >= 35 && event.keyCode <= 39)) {	// Ничего не делаем
        return;
    } else {
        // Запрещаем все, кроме цифр на основной клавиатуре, а так же Num-клавиатуре
        if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
            event.preventDefault();
        }
    }
}

function show_report_period() {
    let e=document.getElementById("repId").value;
    switch (e) {
        case "rep0": document.getElementById('period_for_reports_id').style.display = 'none';
            break;
        case "rep1": document.getElementById('period_for_reports_id').style.display = 'none';
            break;
        case "rep2": document.getElementById('period_for_reports_id').style.display = 'none';
            break;
        case "rep3": document.getElementById('period_for_reports_id').style.display = 'none';
            break;
        case "rep4": document.getElementById('period_for_reports_id').style.display = '';
            break;
        case "rep5": document.getElementById('period_for_reports_id').style.display = 'none';
            break;
        case "rep6": document.getElementById('period_for_reports_id').style.display = 'none';
            break;
        case "rep7": document.getElementById('period_for_reports_id').style.display = 'none';
            break;
        case "rep8": document.getElementById('period_for_reports_id').style.display = 'none';
            break;
        case "rep9": document.getElementById('period_for_reports_id').style.display = '';
            break;
        case "rep10": document.getElementById('period_for_reports_id').style.display = 'none';
            break;
        case "rep11": document.getElementById('period_for_reports_id').style.display = 'none';
            break;
        case "rep12": document.getElementById('period_for_reports_id').style.display = 'none';
            break;
        case "rep13": document.getElementById('period_for_reports_id').style.display = 'none';
            break;
        case "rep14": document.getElementById('period_for_reports_id').style.display = '';
            break;
        case "rep15": document.getElementById('period_for_reports_id').style.display = 'none';
            break;
        case "rep16": document.getElementById('period_for_reports_id').style.display = 'none';
            break;
        case "rep17": document.getElementById('period_for_reports_id').style.display = 'none';
            break;
        case "rep18": document.getElementById('period_for_reports_id').style.display = 'none';
            break;
        case "rep19": document.getElementById('period_for_reports_id').style.display = '';
            break;




    }
}