<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'equipo_repuestos';

		/* data for selected record, or defaults if none is selected */
		var data = {
			interno: <?php echo json_encode(array('id' => $rdata['interno'], 'value' => $rdata['interno'], 'text' => $jdata['interno'])); ?>,
			codigo: <?php echo json_encode(array('id' => $rdata['codigo'], 'value' => $rdata['codigo'], 'text' => $jdata['codigo'])); ?>,
			descripcion: <?php echo json_encode($jdata['descripcion']); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for interno */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'interno' && d.id == data.interno.id)
				return { results: [ data.interno ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for codigo */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'codigo' && d.id == data.codigo.id)
				return { results: [ data.codigo ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for codigo autofills */
		cache.addCheck(function(u, d){
			if(u != tn + '_autofill.php') return false;

			for(var rnd in d) if(rnd.match(/^rnd/)) break;

			if(d.mfk == 'codigo' && d.id == data.codigo.id){
				$j('#descripcion' + d[rnd]).html(data.descripcion);
				return true;
			}

			return false;
		});

		cache.start();
	});
</script>

