<?php
// This script and data application were generated by AppGini 5.75
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/planificacion_pendientes.php");
	include("$currDir/planificacion_pendientes_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('planificacion_pendientes');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "planificacion_pendientes";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`planificacion_pendientes`.`id`" => "id",
		"IF(    CHAR_LENGTH(`planificaciones1`.`titulo`), CONCAT_WS('',   `planificaciones1`.`titulo`), '') /* Planificacion */" => "planificacion",
		"IF(    CHAR_LENGTH(`equipos1`.`interno`), CONCAT_WS('',   `equipos1`.`interno`), '') /* Interno */" => "interno",
		"`planificacion_pendientes`.`comentario`" => "comentario"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`planificacion_pendientes`.`id`',
		2 => 2,
		3 => 3,
		4 => 4
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`planificacion_pendientes`.`id`" => "id",
		"IF(    CHAR_LENGTH(`planificaciones1`.`titulo`), CONCAT_WS('',   `planificaciones1`.`titulo`), '') /* Planificacion */" => "planificacion",
		"IF(    CHAR_LENGTH(`equipos1`.`interno`), CONCAT_WS('',   `equipos1`.`interno`), '') /* Interno */" => "interno",
		"`planificacion_pendientes`.`comentario`" => "comentario"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`planificacion_pendientes`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`planificaciones1`.`titulo`), CONCAT_WS('',   `planificaciones1`.`titulo`), '') /* Planificacion */" => "Planificacion",
		"IF(    CHAR_LENGTH(`equipos1`.`interno`), CONCAT_WS('',   `equipos1`.`interno`), '') /* Interno */" => "Interno",
		"`planificacion_pendientes`.`comentario`" => "Comentario"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`planificacion_pendientes`.`id`" => "id",
		"IF(    CHAR_LENGTH(`planificaciones1`.`titulo`), CONCAT_WS('',   `planificaciones1`.`titulo`), '') /* Planificacion */" => "planificacion",
		"IF(    CHAR_LENGTH(`equipos1`.`interno`), CONCAT_WS('',   `equipos1`.`interno`), '') /* Interno */" => "interno",
		"`planificacion_pendientes`.`comentario`" => "comentario"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'planificacion' => 'Planificacion');

	$x->QueryFrom = "`planificacion_pendientes` LEFT JOIN `planificacion_equipos` as planificacion_equipos1 ON `planificacion_equipos1`.`id`=`planificacion_pendientes`.`planificacion` LEFT JOIN `planificaciones` as planificaciones1 ON `planificaciones1`.`id`=`planificacion_equipos1`.`planificacion` LEFT JOIN `equipos` as equipos1 ON `equipos1`.`id`=`planificacion_equipos1`.`equipo` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 1;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 0;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowPrintingDV = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 10;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "planificacion_pendientes_view.php";
	$x->RedirectAfterInsert = "planificacion_pendientes_view.php?SelectedID=#ID#";
	$x->TableTitle = "Planificacion pendientes";
	$x->TableIcon = "table.gif";
	$x->PrimaryKey = "`planificacion_pendientes`.`id`";

	$x->ColWidth   = array(  150, 150, 150);
	$x->ColCaption = array("Planificacion", "Interno", "Comentario");
	$x->ColFieldName = array('planificacion', 'interno', 'comentario');
	$x->ColNumber  = array(2, 3, 4);

	// template paths below are based on the app main directory
	$x->Template = 'templates/planificacion_pendientes_templateTV.html';
	$x->SelectedTemplate = 'templates/planificacion_pendientes_templateTVS.html';
	$x->TemplateDV = 'templates/planificacion_pendientes_templateDV.html';
	$x->TemplateDVP = 'templates/planificacion_pendientes_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `planificacion_pendientes`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='planificacion_pendientes' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `planificacion_pendientes`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='planificacion_pendientes' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`planificacion_pendientes`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: planificacion_pendientes_init
	$render=TRUE;
	if(function_exists('planificacion_pendientes_init')){
		$args=array();
		$render=planificacion_pendientes_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: planificacion_pendientes_header
	$headerCode='';
	if(function_exists('planificacion_pendientes_header')){
		$args=array();
		$headerCode=planificacion_pendientes_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: planificacion_pendientes_footer
	$footerCode='';
	if(function_exists('planificacion_pendientes_footer')){
		$args=array();
		$footerCode=planificacion_pendientes_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>