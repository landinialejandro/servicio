<?php
	$rdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $rdata)));
	$jdata = array_map('to_utf8', array_map('nl2br', array_map('html_attr_tags_ok', $jdata)));
?>
<script>
	$j(function(){
		var tn = 'equipos';

		/* data for selected record, or defaults if none is selected */
		var data = {
			articulo: <?php echo json_encode(array('id' => $rdata['articulo'], 'value' => $rdata['articulo'], 'text' => $jdata['articulo'])); ?>,
			marca: <?php echo json_encode(array('id' => $rdata['marca'], 'value' => $rdata['marca'], 'text' => $jdata['marca'])); ?>,
			modelo: <?php echo json_encode(array('id' => $rdata['modelo'], 'value' => $rdata['modelo'], 'text' => $jdata['modelo'])); ?>,
			familia: <?php echo json_encode(array('id' => $rdata['familia'], 'value' => $rdata['familia'], 'text' => $jdata['familia'])); ?>
		};

		/* initialize or continue using AppGini.cache for the current table */
		AppGini.cache = AppGini.cache || {};
		AppGini.cache[tn] = AppGini.cache[tn] || AppGini.ajaxCache();
		var cache = AppGini.cache[tn];

		/* saved value for articulo */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'articulo' && d.id == data.articulo.id)
				return { results: [ data.articulo ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for marca */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'marca' && d.id == data.marca.id)
				return { results: [ data.marca ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for modelo */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'modelo' && d.id == data.modelo.id)
				return { results: [ data.modelo ], more: false, elapsed: 0.01 };
			return false;
		});

		/* saved value for familia */
		cache.addCheck(function(u, d){
			if(u != 'ajax_combo.php') return false;
			if(d.t == tn && d.f == 'familia' && d.id == data.familia.id)
				return { results: [ data.familia ], more: false, elapsed: 0.01 };
			return false;
		});

		cache.start();
	});
</script>

