<?php
	// check this file's MD5 to make sure it wasn't called before
	$prevMD5=@implode('', @file(dirname(__FILE__).'/setup.md5'));
	$thisMD5=md5(@implode('', @file("./updateDB.php")));
	if($thisMD5==$prevMD5){
		$setupAlreadyRun=true;
	}else{
		// set up tables
		if(!isset($silent)){
			$silent=true;
		}

		// set up tables
		setupTable('equipos', "create table if not exists `equipos` (   `id` INT unsigned not null auto_increment , primary key (`id`), `interno` VARCHAR(40) null , `articulo` INT unsigned null , `producto` VARCHAR(40) null , `marca` INT unsigned null , `modelo` INT unsigned null , `familia` INT unsigned null , `numero_serie` VARCHAR(40) null , `motor_marca` VARCHAR(40) null , `motor_modelo` VARCHAR(40) null , `motor_serie` VARCHAR(40) null ) CHARSET utf8", $silent, array( "ALTER TABLE equipos ADD `field11` VARCHAR(40)","ALTER TABLE `equipos` CHANGE `field11` `producto` VARCHAR(40) null "));
		setupIndexes('equipos', array('articulo','marca','modelo','familia'));
		setupTable('modelos', "create table if not exists `modelos` (   `id` INT unsigned not null auto_increment , primary key (`id`), `modelo` VARCHAR(40) null , `marca` INT unsigned null ) CHARSET utf8", $silent);
		setupIndexes('modelos', array('marca'));
		setupTable('familias', "create table if not exists `familias` (   `id` INT unsigned not null auto_increment , primary key (`id`), `familia` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('repuestos', "create table if not exists `repuestos` (   `id` INT unsigned not null auto_increment , primary key (`id`), `codigo` VARCHAR(40) null , `descripcion` TEXT null ) CHARSET utf8", $silent, array( " ALTER TABLE `repuestos` CHANGE `descripcion` `descripcion` TEXT null "));
		setupTable('articulos', "create table if not exists `articulos` (   `id` INT unsigned not null auto_increment , primary key (`id`), `articulo` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('marcas', "create table if not exists `marcas` (   `id` INT unsigned not null auto_increment , primary key (`id`), `marca` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('equipo_repuestos', "create table if not exists `equipo_repuestos` (   `id` INT unsigned not null auto_increment , primary key (`id`), `interno` INT unsigned null , `codigo` INT unsigned null , `descripcion` INT unsigned null , `cantidad` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupIndexes('equipo_repuestos', array('interno','codigo'));
		setupTable('tecnicos', "create table if not exists `tecnicos` (   `id` INT unsigned not null auto_increment , primary key (`id`), `nombre` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('planificaciones', "create table if not exists `planificaciones` (   `id` INT unsigned not null auto_increment , primary key (`id`), `titulo` VARCHAR(40) null , `tecnico` INT unsigned null , `camioneta` INT unsigned null , `fecha_planificado` DATE null ) CHARSET utf8", $silent);
		setupIndexes('planificaciones', array('tecnico','camioneta'));
		setupTable('planificacion_equipos', "create table if not exists `planificacion_equipos` (   `id` INT unsigned not null auto_increment , primary key (`id`), `planificacion` INT unsigned null , `cliente` INT unsigned null , `equipo` INT unsigned null , `modelo` INT unsigned null , `servicio` INT unsigned null , `ubicacion` VARCHAR(40) null , `horometro` VARCHAR(40) null , `cumplido` INT null default '0' , `comentarios` TEXT null , `fecha_cumplido` DATE null , `distancia` VARCHAR(40) null ) CHARSET utf8", $silent, array( "ALTER TABLE planificacion_equipos ADD `field12` VARCHAR(40)","ALTER TABLE `planificacion_equipos` CHANGE `field12` `servicio` VARCHAR(40) null "," ALTER TABLE `planificacion_equipos` CHANGE `comentarios` `comentarios` TEXT null "));
		setupIndexes('planificacion_equipos', array('planificacion','cliente','equipo','servicio'));
		setupTable('codigo_servicios', "create table if not exists `codigo_servicios` (   `id` INT unsigned not null auto_increment , primary key (`id`), `servicio` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('camionetas', "create table if not exists `camionetas` (   `id` INT unsigned not null auto_increment , primary key (`id`), `interno` VARCHAR(40) null , `matricula` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('clientes', "create table if not exists `clientes` (   `id` INT unsigned not null auto_increment , primary key (`id`), `nombre` VARCHAR(40) null ) CHARSET utf8", $silent);
		setupTable('planificacion_pendientes', "create table if not exists `planificacion_pendientes` (   `id` INT unsigned not null auto_increment , primary key (`id`), `planificacion` INT unsigned null , `interno` INT unsigned null , `comentario` TEXT null , `cumplido` INT null default '0' ) CHARSET utf8", $silent, array( "ALTER TABLE planificacion_pendientes ADD `field5` VARCHAR(40)","ALTER TABLE `planificacion_pendientes` CHANGE `field5` `cumplido` VARCHAR(40) null "," ALTER TABLE `planificacion_pendientes` CHANGE `cumplido` `cumplido` INT null "," ALTER TABLE `planificacion_pendientes` CHANGE `cumplido` `cumplido` INT null default '0' "," ALTER TABLE `planificacion_pendientes` CHANGE `comentario` `comentario` TEXT null "));
		setupIndexes('planificacion_pendientes', array('planificacion'));


		// save MD5
		if($fp=@fopen(dirname(__FILE__).'/setup.md5', 'w')){
			fwrite($fp, $thisMD5);
			fclose($fp);
		}
	}


	function setupIndexes($tableName, $arrFields){
		if(!is_array($arrFields)){
			return false;
		}

		foreach($arrFields as $fieldName){
			if(!$res=@db_query("SHOW COLUMNS FROM `$tableName` like '$fieldName'")){
				continue;
			}
			if(!$row=@db_fetch_assoc($res)){
				continue;
			}
			if($row['Key']==''){
				@db_query("ALTER TABLE `$tableName` ADD INDEX `$fieldName` (`$fieldName`)");
			}
		}
	}


	function setupTable($tableName, $createSQL='', $silent=true, $arrAlter=''){
		global $Translation;
		ob_start();

		echo '<div style="padding: 5px; border-bottom:solid 1px silver; font-family: verdana, arial; font-size: 10px;">';

		// is there a table rename query?
		if(is_array($arrAlter)){
			$matches=array();
			if(preg_match("/ALTER TABLE `(.*)` RENAME `$tableName`/", $arrAlter[0], $matches)){
				$oldTableName=$matches[1];
			}
		}

		if($res=@db_query("select count(1) from `$tableName`")){ // table already exists
			if($row = @db_fetch_array($res)){
				echo str_replace("<TableName>", $tableName, str_replace("<NumRecords>", $row[0],$Translation["table exists"]));
				if(is_array($arrAlter)){
					echo '<br>';
					foreach($arrAlter as $alter){
						if($alter!=''){
							echo "$alter ... ";
							if(!@db_query($alter)){
								echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
								echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
							}else{
								echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
							}
						}
					}
				}else{
					echo $Translation["table uptodate"];
				}
			}else{
				echo str_replace("<TableName>", $tableName, $Translation["couldnt count"]);
			}
		}else{ // given tableName doesn't exist

			if($oldTableName!=''){ // if we have a table rename query
				if($ro=@db_query("select count(1) from `$oldTableName`")){ // if old table exists, rename it.
					$renameQuery=array_shift($arrAlter); // get and remove rename query

					echo "$renameQuery ... ";
					if(!@db_query($renameQuery)){
						echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
						echo '<div class="text-danger">' . $Translation['mysql said'] . ' ' . db_error(db_link()) . '</div>';
					}else{
						echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
					}

					if(is_array($arrAlter)) setupTable($tableName, $createSQL, false, $arrAlter); // execute Alter queries on renamed table ...
				}else{ // if old tableName doesn't exist (nor the new one since we're here), then just create the table.
					setupTable($tableName, $createSQL, false); // no Alter queries passed ...
				}
			}else{ // tableName doesn't exist and no rename, so just create the table
				echo str_replace("<TableName>", $tableName, $Translation["creating table"]);
				if(!@db_query($createSQL)){
					echo '<span class="label label-danger">' . $Translation['failed'] . '</span>';
					echo '<div class="text-danger">' . $Translation['mysql said'] . db_error(db_link()) . '</div>';
				}else{
					echo '<span class="label label-success">' . $Translation['ok'] . '</span>';
				}
			}
		}

		echo "</div>";

		$out=ob_get_contents();
		ob_end_clean();
		if(!$silent){
			echo $out;
		}
	}
?>