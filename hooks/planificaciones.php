<?php
	// For help on using hooks, please refer to https://bigprof.com/appgini/help/working-with-generated-web-database-application/hooks

	function planificaciones_init(&$options, $memberInfo, &$args){

		return TRUE;
	}

	function planificaciones_header($contentType, $memberInfo, &$args){
		$header='';

		switch($contentType){
			case 'tableview':
				$header='';
				break;

			case 'detailview':
				$header='';
				break;

			case 'tableview+detailview':
				$header='';
				break;

			case 'print-tableview':
				$header='';
				break;

			case 'print-detailview':
				$header='';
				break;

			case 'filters':
				$header='';
				break;
		}

		return $header;
	}

	function planificaciones_footer($contentType, $memberInfo, &$args){
		$footer='';

		switch($contentType){
			case 'tableview':
				$footer='';
				break;

			case 'detailview':
				$footer='';
				break;

			case 'tableview+detailview':
				$footer='';
				break;

			case 'print-tableview':
				$footer='';
				break;

			case 'print-detailview':
				$footer='';
				break;

			case 'filters':
				$footer='';
				break;
		}

		return $footer;
	}

	function planificaciones_before_insert(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function planificaciones_after_insert($data, $memberInfo, &$args){

		return TRUE;
	}

	function planificaciones_before_update(&$data, $memberInfo, &$args){

		return TRUE;
	}

	function planificaciones_after_update($data, $memberInfo, &$args){

		return TRUE;
	}

	function planificaciones_before_delete($selectedID, &$skipChecks, $memberInfo, &$args){

		return TRUE;
	}

	function planificaciones_after_delete($selectedID, $memberInfo, &$args){

	}

	function planificaciones_dv($selectedID, $memberInfo, &$html, &$args){

		$buttons['settings']['CUST_CREDIT']['name'] = 'imprimir Plan';
            $buttons['settings']['CUST_CREDIT']['insert'] = false;
            $buttons['settings']['CUST_CREDIT']['update'] = true;
            $buttons['settings']['CUST_CREDIT']['style'] = 'info';
            $buttons['settings']['CUST_CREDIT']['icon'] = 'fa fa-arrows-h';
            $buttons['settings']['CUST_CREDIT']['onclick'] = 'location|rep_planificacion.php?id=' . $selectedID;
			$buttons['settings']['CUST_CREDIT']['confirm'] = '';
			$a = mkbuttons('planificaciones', $selectedID, $buttons);
			$html .= $a;

	}

	function planificaciones_csv($query, $memberInfo, &$args){

		return $query;
	}
	function planificaciones_batch_actions(&$args){

		return array();
	}
