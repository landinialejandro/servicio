<?php
// This script and data application were generated by AppGini 5.75
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir = dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");

	handle_maintenance();

	header('Content-type: text/javascript; charset=' . datalist_db_encoding);

	$table_perms = getTablePermissions('planificacion_pendientes');
	if(!$table_perms[0]){ die('// Access denied!'); }

	$mfk = $_GET['mfk'];
	$id = makeSafe($_GET['id']);
	$rnd1 = intval($_GET['rnd1']); if(!$rnd1) $rnd1 = '';

	if(!$mfk){
		die('// No js code available!');
	}

	switch($mfk){

		case 'planificacion':
			if(!$id){
				?>
				$j('#interno<?php echo $rnd1; ?>').html('&nbsp;');
				<?php
				break;
			}
			$res = sql("SELECT `planificacion_equipos`.`id` as 'id', IF(    CHAR_LENGTH(`planificaciones1`.`titulo`), CONCAT_WS('',   `planificaciones1`.`titulo`), '') as 'planificacion', IF(    CHAR_LENGTH(`clientes1`.`nombre`), CONCAT_WS('',   `clientes1`.`nombre`), '') as 'cliente', IF(    CHAR_LENGTH(`equipos1`.`interno`), CONCAT_WS('',   `equipos1`.`interno`), '') as 'equipo', IF(    CHAR_LENGTH(`modelos1`.`modelo`), CONCAT_WS('',   `modelos1`.`modelo`), '') as 'modelo', IF(    CHAR_LENGTH(`codigo_servicios1`.`servicio`), CONCAT_WS('',   `codigo_servicios1`.`servicio`), '') as 'servicio', `planificacion_equipos`.`ubicacion` as 'ubicacion', `planificacion_equipos`.`horometro` as 'horometro', concat('<i class=\"glyphicon glyphicon-', if(`planificacion_equipos`.`cumplido`, 'check', 'unchecked'), '\"></i>') as 'cumplido', `planificacion_equipos`.`comentarios` as 'comentarios', if(`planificacion_equipos`.`fecha_cumplido`,date_format(`planificacion_equipos`.`fecha_cumplido`,'%m/%d/%Y'),'') as 'fecha_cumplido', `planificacion_equipos`.`distancia` as 'distancia' FROM `planificacion_equipos` LEFT JOIN `planificaciones` as planificaciones1 ON `planificaciones1`.`id`=`planificacion_equipos`.`planificacion` LEFT JOIN `clientes` as clientes1 ON `clientes1`.`id`=`planificacion_equipos`.`cliente` LEFT JOIN `equipos` as equipos1 ON `equipos1`.`id`=`planificacion_equipos`.`equipo` LEFT JOIN `codigo_servicios` as codigo_servicios1 ON `codigo_servicios1`.`id`=`planificacion_equipos`.`servicio` LEFT JOIN `modelos` as modelos1 ON `modelos1`.`id`=`equipos1`.`modelo`  WHERE `planificacion_equipos`.`id`='{$id}' limit 1", $eo);
			$row = db_fetch_assoc($res);
			?>
			$j('#interno<?php echo $rnd1; ?>').html('<?php echo addslashes(str_replace(array("\r", "\n"), '', nl2br($row['equipo']))); ?>&nbsp;');
			<?php
			break;


	}

?>