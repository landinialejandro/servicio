<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'planificaciones';

		/* data for selected record, or defaults if none is selected */
		var data = {
			tecnico: <?php echo json_encode(array('id' => $rdata['tecnico'], 'value' => $rdata['tecnico'], 'text' => $jdata['tecnico'])); ?>,
			camioneta: <?php echo json_encode(array('id' => $rdata['camioneta'], 'value' => $rdata['camioneta'], 'text' => $jdata['camioneta'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for tecnico */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'tecnico' && d.id == data.tecnico.id)
				return { results: [ data.tecnico ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for camioneta */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'camioneta' && d.id == data.camioneta.id)
				return { results: [ data.camioneta ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

