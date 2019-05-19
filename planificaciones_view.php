<?php
// This script and data application were generated by AppGini 5.75
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/planificaciones.php");
	include("$currDir/planificaciones_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('planificaciones');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "planificaciones";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`planificaciones`.`id`" => "id",
		"`planificaciones`.`titulo`" => "titulo",
		"IF(    CHAR_LENGTH(`tecnicos1`.`nombre`), CONCAT_WS('',   `tecnicos1`.`nombre`), '') /* Tecnico */" => "tecnico",
		"IF(    CHAR_LENGTH(`camionetas1`.`interno`) || CHAR_LENGTH(`camionetas1`.`matricula`), CONCAT_WS('',   `camionetas1`.`interno`, ' - ', `camionetas1`.`matricula`), '') /* Camioneta */" => "camioneta",
		"if(`planificaciones`.`fecha_planificado`,date_format(`planificaciones`.`fecha_planificado`,'%m/%d/%Y'),'')" => "fecha_planificado"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`planificaciones`.`id`',
		2 => 2,
		3 => '`tecnicos1`.`nombre`',
		4 => 4,
		5 => '`planificaciones`.`fecha_planificado`'
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`planificaciones`.`id`" => "id",
		"`planificaciones`.`titulo`" => "titulo",
		"IF(    CHAR_LENGTH(`tecnicos1`.`nombre`), CONCAT_WS('',   `tecnicos1`.`nombre`), '') /* Tecnico */" => "tecnico",
		"IF(    CHAR_LENGTH(`camionetas1`.`interno`) || CHAR_LENGTH(`camionetas1`.`matricula`), CONCAT_WS('',   `camionetas1`.`interno`, ' - ', `camionetas1`.`matricula`), '') /* Camioneta */" => "camioneta",
		"if(`planificaciones`.`fecha_planificado`,date_format(`planificaciones`.`fecha_planificado`,'%m/%d/%Y'),'')" => "fecha_planificado"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`planificaciones`.`id`" => "ID",
		"`planificaciones`.`titulo`" => "Titulo",
		"IF(    CHAR_LENGTH(`tecnicos1`.`nombre`), CONCAT_WS('',   `tecnicos1`.`nombre`), '') /* Tecnico */" => "Tecnico",
		"IF(    CHAR_LENGTH(`camionetas1`.`interno`) || CHAR_LENGTH(`camionetas1`.`matricula`), CONCAT_WS('',   `camionetas1`.`interno`, ' - ', `camionetas1`.`matricula`), '') /* Camioneta */" => "Camioneta",
		"`planificaciones`.`fecha_planificado`" => "Fecha planificado"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`planificaciones`.`id`" => "id",
		"`planificaciones`.`titulo`" => "titulo",
		"IF(    CHAR_LENGTH(`tecnicos1`.`nombre`), CONCAT_WS('',   `tecnicos1`.`nombre`), '') /* Tecnico */" => "tecnico",
		"IF(    CHAR_LENGTH(`camionetas1`.`interno`) || CHAR_LENGTH(`camionetas1`.`matricula`), CONCAT_WS('',   `camionetas1`.`interno`, ' - ', `camionetas1`.`matricula`), '') /* Camioneta */" => "camioneta",
		"if(`planificaciones`.`fecha_planificado`,date_format(`planificaciones`.`fecha_planificado`,'%m/%d/%Y'),'')" => "fecha_planificado"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'tecnico' => 'Tecnico', 'camioneta' => 'Camioneta');

	$x->QueryFrom = "`planificaciones` LEFT JOIN `tecnicos` as tecnicos1 ON `tecnicos1`.`id`=`planificaciones`.`tecnico` LEFT JOIN `camionetas` as camionetas1 ON `camionetas1`.`id`=`planificaciones`.`camioneta` ";
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
	$x->ScriptFileName = "planificaciones_view.php";
	$x->RedirectAfterInsert = "planificaciones_view.php?SelectedID=#ID#";
	$x->TableTitle = "Planificaciones";
	$x->TableIcon = "resources/table_icons/application_from_storage.png";
	$x->PrimaryKey = "`planificaciones`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150);
	$x->ColCaption = array("Titulo", "Tecnico", "Camioneta", "Fecha planificado");
	$x->ColFieldName = array('titulo', 'tecnico', 'camioneta', 'fecha_planificado');
	$x->ColNumber  = array(2, 3, 4, 5);

	// template paths below are based on the app main directory
	$x->Template = 'templates/planificaciones_templateTV.html';
	$x->SelectedTemplate = 'templates/planificaciones_templateTVS.html';
	$x->TemplateDV = 'templates/planificaciones_templateDV.html';
	$x->TemplateDVP = 'templates/planificaciones_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `planificaciones`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='planificaciones' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `planificaciones`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='planificaciones' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`planificaciones`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: planificaciones_init
	$render=TRUE;
	if(function_exists('planificaciones_init')){
		$args=array();
		$render=planificaciones_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: planificaciones_header
	$headerCode='';
	if(function_exists('planificaciones_header')){
		$args=array();
		$headerCode=planificaciones_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: planificaciones_footer
	$footerCode='';
	if(function_exists('planificaciones_footer')){
		$args=array();
		$footerCode=planificaciones_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>