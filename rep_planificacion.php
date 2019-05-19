<?php
// 
//

$currDir = dirname(__FILE__);
include("$currDir/defaultLang.php");
include("$currDir/language.php");
include("$currDir/lib.php");

$id = intval($_REQUEST['id']);

if(!$id) {exit(error_message('planificación desconocida', false));}

$where = " AND planificaciones.id = {$id}";

$plan = getDataTable('planificaciones',$where);

$where = " AND planificacion_equipos.planificacion = {$plan['id']}";
$plan_equip_fields = get_sql_fields('planificacion_equipos');
$plan_equip_from = get_sql_from('planificacion_equipos');
$plan_equip = sql("SELECT {$plan_equip_fields} FROM {$plan_equip_from} {$where}",$e);


ob_start();
include("$currDir/header.php");
?>
<div class="panel-heading"><h3 class="panel-title">
	<strong>Planificacion</strong>
	<div class="hidden-print pull-right">
		<div class="btn-group">
			<button type="button" id="print" onclick="window.print();" title="print" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i> Imprimir</button>
			<button type="submit" id="back" title="cancelar" class="btn btn-default"><i class="glyphicon glyphicon-remove-circle"></i> Cancelar</button>
		</div>
	</div>
	<div class="clearfix"></div>
</h3></div>

<div class="panel-body">
	<fieldset class="form-horizontal">
		<div class="form-group" style="border-bottom: dotted 1px #DDD;">
			<label class="col-xs-3 control-label">Titulo</label>
			<div class="col-xs-9">
				<div class="form-control-static"><?php echo $plan['titulo']; ?></div>
			</div>
		</div>
		<div class="form-group" style="border-bottom: dotted 1px #DDD;">
			<label class="col-xs-3 control-label">Tecnico</label>
			<div class="col-xs-9">
				<div class="form-control-static"><span id="tecnico<%%RND1%%>"><?php echo $plan['tecnico']; ?></span></div>
			</div>
		</div>
		<div class="form-group" style="border-bottom: dotted 1px #DDD;">
			<label class="col-xs-3 control-label">Camioneta</label>
			<div class="col-xs-9">
				<div class="form-control-static"><span id="camioneta<%%RND1%%>"><?php echo $plan['camioneta']; ?></span></div>
			</div>
		</div>
		<div class="form-group" style="border-bottom: dotted 1px #DDD;">
			<label class="col-xs-3 control-label">Fecha planificado</label>
			<div class="col-xs-9">
				<div class="form-control-static"><?php echo $plan['fecha_planificado']; ?></div>
			</div>
		</div>
	</fieldset>
</div>
        <?php foreach($plan_equip as $i => $item){ 
            //var_dump($item);
                            $where_id = " AND interno = '{$item['equipo']}'";
                            $equipo = getDataTable_Values('equipos', $where_id);

                            $id_servicio = sqlValue("SELECT codigo_servicios.id from codigo_servicios where codigo_servicios.servicio = '{$item['servicio']}'  ");

                            $where = " AND equipo_repuestos.interno = {$equipo['id']} AND equipo_repuestos.servicio = '{$id_servicio}'";
                            $rep_fields = get_sql_fields('equipo_repuestos');
                            $rep_from = get_sql_from('equipo_repuestos');
                            //echo "SELECT {$rep_fields} FROM {$rep_from} {$where}";
                            $rep = sql("SELECT {$rep_fields} FROM {$rep_from} {$where}",$e);
                        ?>
                <div class="panel-heading">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-center">Cliente</label>
                            <div class="form-control-static"><?php echo $item['cliente']; ?></div>
                        </div>
                        <div class="form-group">
                            <label class="text-center">Ubicacion</label>
                            <div class="form-control-static"><?php echo $item['ubicacion']; ?></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-center">Equipo</label>
                            <div class="form-control-static"><?php echo $item['equipo']; ?></div>
                        </div>
                        <div class="form-group">
                            <label class="text-center">Servicio</label>
                        <div class="form-control-static"><?php echo $item['servicio']; ?></div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-bordered">
                        <thead>
                            <th class="text-center">Codigo</th>
                            <th class="text-center">Descripcion</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-center">Servicio</th>
                        </thead>
                        
                        <tbody>
                            <?php foreach($rep as $i => $item_rep){ 
                                //var_dump($item_rep);
                                            ?>
                                <tr>
                                    <td><?php echo $item_rep['codigo']; ?></td>
                                    <td class="form-control-static"><?php echo $item_rep['descripcion']; ?></td>
                                    <td class="form-control-static"><?php echo $item_rep['cantidad']; ?></td>
                                    <td class="form-control-static"><?php echo $item_rep['servicio']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                </table>
            </tr>
        <?php } ?>