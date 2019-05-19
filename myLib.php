<?php

/**
 * This hook function is called when get a row from a table. 
 * 
 * @param $table_name
 * table name to get data
 * 
 * @param $where_id
 * is a string to indicate the select id from record use:
 * example " AND id=1"
 * 
 * @return
 * db_fetch from data result
*/

function getDataTable($table_name, $where_id = "", $debug =FALSE){
    // the $where_id need to be likle the next line
    // $where_id ="AND attributes.attribute = {$id}";//change this to set select where
    $table_from = get_sql_from($table_name);
    $table_fields = get_sql_fields($table_name);
    $where_id = "" ? "" : " " . $where_id;
    $sql="SELECT {$table_fields} FROM {$table_from}" . $where_id;
    if ($debug){
        echo "<br>".$sql."<br>";
    }
    $res = sql($sql, $eo);
    return db_fetch_assoc($res);
}

function getDataTable_Values($table_name, $where_id = "", $debug =FALSE){
    // the $where_id need to be likle the next line
    // $where_id ="AND attributes.attribute = {$id}";//change this to set select where
    $where_id = "" ? "" : " where 1=1 " . $where_id;
    $sql = "SELECT * FROM {$table_name}" . $where_id;
    if ($debug){
        printf( "<br>".$sql."<br>");
    }
    $res = sql($sql, $eo);
    return db_fetch_assoc($res);
}

function getTotCol($parameters,$fieldToSUM){
    //return tot value
    $sumQuery="select sum(`".$parameters['ChildTable']."`.`". $fieldToSUM ."`) from ".$parameters['ChildTable']." where `". $parameters['ChildLookupField']."` = '". $parameters['SelectedID']. "'";
    $res= sqlValue($sumQuery);
    return $res;
}

function updateSqlViews(){
    $dir = dirname(__FILE__) . "/hooks/SQL_Views";
    $views = array_diff(scandir($dir), array('.', '..'));
    foreach ($views as $sql){
        $res = sql(file_get_contents("$dir/$sql"),$eo);
    }
}

function importData(){
    $dir = dirname(__FILE__) . "/data";
    $views = array_diff(scandir($dir), array('.', '..'));
    foreach ($views as $sql){
        $res = sql(file_get_contents("$dir/$sql"),$eo);
    }
}

function openpdf($file,$filename){
    
    header('Content-type: application/pdf');
    header('Content-Disposition: inline; filename="' . $filename . '"');
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($file));
    header('Accept-Ranges: bytes');
    @readfile($file);
    return;
}

function makePdf($html_code, $file){
    
    $mpdf = new \Mpdf\Mpdf([
	'margin_left' => 5,
	'margin_right' => 5,
	'margin_top' => 48,
	'margin_bottom' => 25,
	'margin_header' => 10,
	'margin_footer' => 10
    ]);
    
    $mpdf->SetProtection(array('print'));
    $mpdf->SetTitle("Piattaforma Digitale Management System - Order");
    $mpdf->SetAuthor("PDSM");
    $mpdf->SetWatermarkText("PDMS");
    $mpdf->showWatermarkText = true;
    $mpdf->watermark_font = 'DejaVuSansCondensed';
    $mpdf->watermarkTextAlpha = 0.1;
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->WriteHTML($html_code);
    $mpdf->Output($file, 'F');
    
    return;
}