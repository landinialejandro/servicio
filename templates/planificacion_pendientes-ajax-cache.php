<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'planificacion_pendientes';

		/* data for selected record, or defaults if none is selected */
		var data = {
			planificacion: <?php echo json_encode(array('id' => $rdata['planificacion'], 'value' => $rdata['planificacion'], 'text' => $jdata['planificacion'])); ?>,
			interno: <?php echo json_encode($jdata['interno']); ?>
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

		/* saved value for planificacion autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'planificacion' && d.id == data.planificacion.id){
				$j('#interno' + d[rnd]).html(data.interno);
				return true;
			}

			return false;
		});

		cache.start();
	});
</script>

