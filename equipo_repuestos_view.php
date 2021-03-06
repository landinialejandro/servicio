<?php
// This script and data application were generated by AppGini 5.75
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/equipo_repuestos.php");
	include("$currDir/equipo_repuestos_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('equipo_repuestos');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "equipo_repuestos";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`equipo_repuestos`.`id`" => "id",
		"IF(    CHAR_LENGTH(`equipos1`.`interno`), CONCAT_WS('',   `equipos1`.`interno`), '') /* Interno */" => "interno",
		"IF(    CHAR_LENGTH(`repuestos1`.`codigo`), CONCAT_WS('',   `repuestos1`.`codigo`), '') /* Repuesto */" => "codigo",
		"IF(    CHAR_LENGTH(`repuestos1`.`descripcion`), CONCAT_WS('',   `repuestos1`.`descripcion`), '') /* Descripcion */" => "descripcion",
		"`equipo_repuestos`.`cantidad`" => "cantidad",
		"IF(    CHAR_LENGTH(`codigo_servicios1`.`servicio`), CONCAT_WS('',   `codigo_servicios1`.`servicio`), '') /* Servicio */" => "servicio"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`equipo_repuestos`.`id`',
		2 => '`equipos1`.`interno`',
		3 => '`repuestos1`.`codigo`',
		4 => '`repuestos1`.`descripcion`',
		5 => 5,
		6 => '`codigo_servicios1`.`servicio`'
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`equipo_repuestos`.`id`" => "id",
		"IF(    CHAR_LENGTH(`equipos1`.`interno`), CONCAT_WS('',   `equipos1`.`interno`), '') /* Interno */" => "interno",
		"IF(    CHAR_LENGTH(`repuestos1`.`codigo`), CONCAT_WS('',   `repuestos1`.`codigo`), '') /* Repuesto */" => "codigo",
		"IF(    CHAR_LENGTH(`repuestos1`.`descripcion`), CONCAT_WS('',   `repuestos1`.`descripcion`), '') /* Descripcion */" => "descripcion",
		"`equipo_repuestos`.`cantidad`" => "cantidad",
		"IF(    CHAR_LENGTH(`codigo_servicios1`.`servicio`), CONCAT_WS('',   `codigo_servicios1`.`servicio`), '') /* Servicio */" => "servicio"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`equipo_repuestos`.`id`" => "ID",
		"IF(    CHAR_LENGTH(`equipos1`.`interno`), CONCAT_WS('',   `equipos1`.`interno`), '') /* Interno */" => "Interno",
		"IF(    CHAR_LENGTH(`repuestos1`.`codigo`), CONCAT_WS('',   `repuestos1`.`codigo`), '') /* Repuesto */" => "Repuesto",
		"IF(    CHAR_LENGTH(`repuestos1`.`descripcion`), CONCAT_WS('',   `repuestos1`.`descripcion`), '') /* Descripcion */" => "Descripcion",
		"`equipo_repuestos`.`cantidad`" => "Cantidad",
		"IF(    CHAR_LENGTH(`codigo_servicios1`.`servicio`), CONCAT_WS('',   `codigo_servicios1`.`servicio`), '') /* Servicio */" => "Servicio"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`equipo_repuestos`.`id`" => "id",
		"IF(    CHAR_LENGTH(`equipos1`.`interno`), CONCAT_WS('',   `equipos1`.`interno`), '') /* Interno */" => "interno",
		"IF(    CHAR_LENGTH(`repuestos1`.`codigo`), CONCAT_WS('',   `repuestos1`.`codigo`), '') /* Repuesto */" => "codigo",
		"IF(    CHAR_LENGTH(`repuestos1`.`descripcion`), CONCAT_WS('',   `repuestos1`.`descripcion`), '') /* Descripcion */" => "descripcion",
		"`equipo_repuestos`.`cantidad`" => "cantidad",
		"IF(    CHAR_LENGTH(`codigo_servicios1`.`servicio`), CONCAT_WS('',   `codigo_servicios1`.`servicio`), '') /* Servicio */" => "servicio"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'interno' => 'Interno', 'codigo' => 'Repuesto', 'servicio' => 'Servicio');

	$x->QueryFrom = "`equipo_repuestos` LEFT JOIN `equipos` as equipos1 ON `equipos1`.`id`=`equipo_repuestos`.`interno` LEFT JOIN `repuestos` as repuestos1 ON `repuestos1`.`id`=`equipo_repuestos`.`codigo` LEFT JOIN `codigo_servicios` as codigo_servicios1 ON `codigo_servicios1`.`id`=`equipo_repuestos`.`servicio` ";
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
	$x->ScriptFileName = "equipo_repuestos_view.php";
	$x->RedirectAfterInsert = "equipo_repuestos_view.php?SelectedID=#ID#";
	$x->TableTitle = "Equipo repuestos";
	$x->TableIcon = "table.gif";
	$x->PrimaryKey = "`equipo_repuestos`.`id`";

	$x->ColWidth   = array(  150, 150, 150, 150, 150);
	$x->ColCaption = array("Interno", "Repuesto", "Descripcion", "Cantidad", "Servicio");
	$x->ColFieldName = array('interno', 'codigo', 'descripcion', 'cantidad', 'servicio');
	$x->ColNumber  = array(2, 3, 4, 5, 6);

	// template paths below are based on the app main directory
	$x->Template = 'templates/equipo_repuestos_templateTV.html';
	$x->SelectedTemplate = 'templates/equipo_repuestos_templateTVS.html';
	$x->TemplateDV = 'templates/equipo_repuestos_templateDV.html';
	$x->TemplateDVP = 'templates/equipo_repuestos_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `equipo_repuestos`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='equipo_repuestos' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `equipo_repuestos`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='equipo_repuestos' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`equipo_repuestos`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: equipo_repuestos_init
	$render=TRUE;
	if(function_exists('equipo_repuestos_init')){
		$args=array();
		$render=equipo_repuestos_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: equipo_repuestos_header
	$headerCode='';
	if(function_exists('equipo_repuestos_header')){
		$args=array();
		$headerCode=equipo_repuestos_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: equipo_repuestos_footer
	$footerCode='';
	if(function_exists('equipo_repuestos_footer')){
		$args=array();
		$footerCode=equipo_repuestos_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>