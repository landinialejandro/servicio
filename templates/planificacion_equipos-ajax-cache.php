<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'planificacion_equipos';

		/* data for selected record, or defaults if none is selected */
		var data = {
			planificacion: <?php echo json_encode(array('id' => $rdata['planificacion'], 'value' => $rdata['planificacion'], 'text' => $jdata['planificacion'])); ?>,
			cliente: <?php echo json_encode(array('id' => $rdata['cliente'], 'value' => $rdata['cliente'], 'text' => $jdata['cliente'])); ?>,
			equipo: <?php echo json_encode(array('id' => $rdata['equipo'], 'value' => $rdata['equipo'], 'text' => $jdata['equipo'])); ?>,
			modelo: <?php echo json_encode($jdata['modelo']); ?>,
			servicio: <?php echo json_encode(array('id' => $rdata['servicio'], 'value' => $rdata['servicio'], 'text' => $jdata['servicio'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for planificacion */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'planificacion' && d.id == data.planificacion.id)
				return { results: [ data.planificacion ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for cliente */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'cliente' && d.id == data.cliente.id)
				return { results: [ data.cliente ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for equipo */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'equipo' && d.id == data.equipo.id)
				return { results: [ data.equipo ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for equipo autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'equipo' && d.id == data.equipo.id){
				$j('#modelo' + d[rnd]).html(data.modelo);
				return true;
			}

			return false;
		});

		/* saved value for servicio */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'servicio' && d.id == data.servicio.id)
				return { results: [ data.servicio ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

