<?php
// This script and data application were generated by AppGini 5.75
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/marcas.php");
	include("$currDir/marcas_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('marcas');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "marcas";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`marcas`.`id`" => "id",
		"`marcas`.`marca`" => "marca"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`marcas`.`id`',
		2 => 2
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`marcas`.`id`" => "id",
		"`marcas`.`marca`" => "marca"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`marcas`.`id`" => "ID",
		"`marcas`.`marca`" => "Marca"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`marcas`.`id`" => "id",
		"`marcas`.`marca`" => "marca"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array();

	$x->QueryFrom = "`marcas` ";
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
	$x->ScriptFileName = "marcas_view.php";
	$x->RedirectAfterInsert = "marcas_view.php?SelectedID=#ID#";
	$x->TableTitle = "Marcas";
	$x->TableIcon = "resources/table_icons/factory.png";
	$x->PrimaryKey = "`marcas`.`id`";

	$x->ColWidth   = array(  150);
	$x->ColCaption = array("Marca");
	$x->ColFieldName = array('marca');
	$x->ColNumber  = array(2);

	// template paths below are based on the app main directory
	$x->Template = 'templates/marcas_templateTV.html';
	$x->SelectedTemplate = 'templates/marcas_templateTVS.html';
	$x->TemplateDV = 'templates/marcas_templateDV.html';
	$x->TemplateDVP = 'templates/marcas_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `marcas`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='marcas' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `marcas`.`id`=membership_userrecords.pkValue and membership_userrecords.tableName='marcas' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`marcas`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: marcas_init
	$render=TRUE;
	if(function_exists('marcas_init')){
		$args=array();
		$render=marcas_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: marcas_header
	$headerCode='';
	if(function_exists('marcas_header')){
		$args=array();
		$headerCode=marcas_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: marcas_footer
	$footerCode='';
	if(function_exists('marcas_footer')){
		$args=array();
		$footerCode=marcas_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>