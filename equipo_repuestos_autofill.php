<?php
// This script and data application were generated by AppGini 5.75
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");

	handle_maintenance();

	header('Content-type: text/javascript; charset=' . datalist_db_encoding);

	$table_perms = getTablePermissions('equipo_repuestos');
	if(!$table_perms[0]){ die('// Access denied!'); }

	$mfk = $_GET['mfk'];
	$id = makeSafe($_GET['id']);
	$rnd1 = intval($_GET['rnd1']); if(!$rnd1) $rnd1 = '';

	if(!$mfk){
		die('// No js code available!');
	}

	switch($mfk){

		case 'codigo':
			if(!$id){
				?>
				$j('#descripcion<?php echo $rnd1; ?>').html('&nbsp;');
				<?php
				break;
			}
			$res = sql("SELECT `repuestos`.`id` as 'id', `repuestos`.`codigo` as 'codigo', `repuestos`.`descripcion` as 'descripcion' FROM `repuestos`  WHERE `repuestos`.`id`='{$id}' limit 1", $eo);
			$row = db_fetch_assoc($res);
			?>
			$j('#descripcion<?php echo $rnd1; ?>').html('<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['descripcion']))); ?>&nbsp;');
			<?php
			break;


	}

?>