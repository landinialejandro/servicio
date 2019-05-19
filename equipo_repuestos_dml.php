<?php

// Data functions (insert, update, delete, form) for table equipo_repuestos

// This script and data application were generated by AppGini 5.75
// Download AppGini for free from https://bigprof.com/appgini/download/

function equipo_repuestos_insert(){
	global $Translation;

	// mm: can member insert record?
	$arrPerm=getTablePermissions('equipo_repuestos');
	if(!$arrPerm[1]){
		return false;
	}

	$data['interno'] = makeSafe($_REQUEST['interno']);
		if($data['interno'] == empty_lookup_value){ $data['interno'] = ''; }
	$data['codigo'] = makeSafe($_REQUEST['codigo']);
		if($data['codigo'] == empty_lookup_value){ $data['codigo'] = ''; }
	$data['descripcion'] = makeSafe($_REQUEST['codigo']);
		if($data['descripcion'] == empty_lookup_value){ $data['descripcion'] = ''; }
	$data['cantidad'] = makeSafe($_REQUEST['cantidad']);
		if($data['cantidad'] == empty_lookup_value){ $data['cantidad'] = ''; }

	// hook: equipo_repuestos_before_insert
	if(function_exists('equipo_repuestos_before_insert')){
		$args=array();
		if(!equipo_repuestos_before_insert($data, getMemberInfo(), $args)){ return false; }
	}

	$o = array('silentErrors' => true);
	sql('insert into `equipo_repuestos` set       `interno`=' . (($data['interno'] !== '' && $data['interno'] !== NULL) ? "'{$data['interno']}'" : 'NULL') . ', `codigo`=' . (($data['codigo'] !== '' && $data['codigo'] !== NULL) ? "'{$data['codigo']}'" : 'NULL') . ', `descripcion`=' . (($data['descripcion'] !== '' && $data['descripcion'] !== NULL) ? "'{$data['descripcion']}'" : 'NULL') . ', `cantidad`=' . (($data['cantidad'] !== '' && $data['cantidad'] !== NULL) ? "'{$data['cantidad']}'" : 'NULL'), $o);
	if($o['error']!=''){
		echo $o['error'];
		echo "<a href=\"equipo_repuestos_view.php?addNew_x=1\">{$Translation['< back']}</a>";
		exit;
	}

	$recID = db_insert_id(db_link());

	// hook: equipo_repuestos_after_insert
	if(function_exists('equipo_repuestos_after_insert')){
		$res = sql("select * from `equipo_repuestos` where `id`='" . makeSafe($recID, false) . "' limit 1", $eo);
		if($row = db_fetch_assoc($res)){
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = makeSafe($recID, false);
		$args=array();
		if(!equipo_repuestos_after_insert($data, getMemberInfo(), $args)){ return $recID; }
	}

	// mm: save ownership data
	set_record_owner('equipo_repuestos', $recID, getLoggedMemberID());

	return $recID;
}

function equipo_repuestos_delete($selected_id, $AllowDeleteOfParents=false, $skipChecks=false){
	// insure referential integrity ...
	global $Translation;
	$selected_id=makeSafe($selected_id);

	// mm: can member delete record?
	$arrPerm=getTablePermissions('equipo_repuestos');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='equipo_repuestos' and pkValue='$selected_id'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='equipo_repuestos' and pkValue='$selected_id'");
	if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3){ // allow delete?
		// delete allowed, so continue ...
	}else{
		return $Translation['You don\'t have enough permissions to delete this record'];
	}

	// hook: equipo_repuestos_before_delete
	if(function_exists('equipo_repuestos_before_delete')){
		$args=array();
		if(!equipo_repuestos_before_delete($selected_id, $skipChecks, getMemberInfo(), $args))
			return $Translation['Couldn\'t delete this record'];
	}

	sql("delete from `equipo_repuestos` where `id`='$selected_id'", $eo);

	// hook: equipo_repuestos_after_delete
	if(function_exists('equipo_repuestos_after_delete')){
		$args=array();
		equipo_repuestos_after_delete($selected_id, getMemberInfo(), $args);
	}

	// mm: delete ownership data
	sql("delete from membership_userrecords where tableName='equipo_repuestos' and pkValue='$selected_id'", $eo);
}

function equipo_repuestos_update($selected_id){
	global $Translation;

	// mm: can member edit record?
	$arrPerm=getTablePermissions('equipo_repuestos');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='equipo_repuestos' and pkValue='".makeSafe($selected_id)."'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='equipo_repuestos' and pkValue='".makeSafe($selected_id)."'");
	if(($arrPerm[3]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[3]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[3]==3){ // allow update?
		// update allowed, so continue ...
	}else{
		return false;
	}

	$data['interno'] = makeSafe($_REQUEST['interno']);
		if($data['interno'] == empty_lookup_value){ $data['interno'] = ''; }
	$data['codigo'] = makeSafe($_REQUEST['codigo']);
		if($data['codigo'] == empty_lookup_value){ $data['codigo'] = ''; }
	$data['descripcion'] = makeSafe($_REQUEST['codigo']);
		if($data['descripcion'] == empty_lookup_value){ $data['descripcion'] = ''; }
	$data['cantidad'] = makeSafe($_REQUEST['cantidad']);
		if($data['cantidad'] == empty_lookup_value){ $data['cantidad'] = ''; }
	$data['selectedID']=makeSafe($selected_id);

	// hook: equipo_repuestos_before_update
	if(function_exists('equipo_repuestos_before_update')){
		$args=array();
		if(!equipo_repuestos_before_update($data, getMemberInfo(), $args)){ return false; }
	}

	$o=array('silentErrors' => true);
	sql('update `equipo_repuestos` set       `interno`=' . (($data['interno'] !== '' && $data['interno'] !== NULL) ? "'{$data['interno']}'" : 'NULL') . ', `codigo`=' . (($data['codigo'] !== '' && $data['codigo'] !== NULL) ? "'{$data['codigo']}'" : 'NULL') . ', `descripcion`=' . (($data['descripcion'] !== '' && $data['descripcion'] !== NULL) ? "'{$data['descripcion']}'" : 'NULL') . ', `cantidad`=' . (($data['cantidad'] !== '' && $data['cantidad'] !== NULL) ? "'{$data['cantidad']}'" : 'NULL') . " where `id`='".makeSafe($selected_id)."'", $o);
	if($o['error']!=''){
		echo $o['error'];
		echo '<a href="equipo_repuestos_view.php?SelectedID='.urlencode($selected_id)."\">{$Translation['< back']}</a>";
		exit;
	}


	// hook: equipo_repuestos_after_update
	if(function_exists('equipo_repuestos_after_update')){
		$res = sql("SELECT * FROM `equipo_repuestos` WHERE `id`='{$data['selectedID']}' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)){
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = $data['id'];
		$args = array();
		if(!equipo_repuestos_after_update($data, getMemberInfo(), $args)){ return; }
	}

	// mm: update ownership data
	sql("update membership_userrecords set dateUpdated='".time()."' where tableName='equipo_repuestos' and pkValue='".makeSafe($selected_id)."'", $eo);

}

function equipo_repuestos_form($selected_id = '', $AllowUpdate = 1, $AllowInsert = 1, $AllowDelete = 1, $ShowCancel = 0, $TemplateDV = '', $TemplateDVP = ''){
	// function to return an editable form for a table records
	// and fill it with data of record whose ID is $selected_id. If $selected_id
	// is empty, an empty form is shown, with only an 'Add New'
	// button displayed.

	global $Translation;

	// mm: get table permissions
	$arrPerm=getTablePermissions('equipo_repuestos');
	if(!$arrPerm[1] && $selected_id==''){ return ''; }
	$AllowInsert = ($arrPerm[1] ? true : false);
	// print preview?
	$dvprint = false;
	if($selected_id && $_REQUEST['dvprint_x'] != ''){
		$dvprint = true;
	}

	$filterer_interno = thisOr(undo_magic_quotes($_REQUEST['filterer_interno']), '');
	$filterer_codigo = thisOr(undo_magic_quotes($_REQUEST['filterer_codigo']), '');

	// populate filterers, starting from children to grand-parents

	// unique random identifier
	$rnd1 = ($dvprint ? rand(1000000, 9999999) : '');
	// combobox: interno
	$combo_interno = new DataCombo;
	// combobox: codigo
	$combo_codigo = new DataCombo;

	if($selected_id){
		// mm: check member permissions
		if(!$arrPerm[2]){
			return "";
		}
		// mm: who is the owner?
		$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='equipo_repuestos' and pkValue='".makeSafe($selected_id)."'");
		$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='equipo_repuestos' and pkValue='".makeSafe($selected_id)."'");
		if($arrPerm[2]==1 && getLoggedMemberID()!=$ownerMemberID){
			return "";
		}
		if($arrPerm[2]==2 && getLoggedGroupID()!=$ownerGroupID){
			return "";
		}

		// can edit?
		if(($arrPerm[3]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[3]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[3]==3){
			$AllowUpdate=1;
		}else{
			$AllowUpdate=0;
		}

		$res = sql("select * from `equipo_repuestos` where `id`='".makeSafe($selected_id)."'", $eo);
		if(!($row = db_fetch_array($res))){
			return error_message($Translation['No records found'], 'equipo_repuestos_view.php', false);
		}
		$urow = $row; /* unsanitized data */
		$hc = new CI_Input();
		$row = $hc->xss_clean($row); /* sanitize data */
		$combo_interno->SelectedData = $row['interno'];
		$combo_codigo->SelectedData = $row['codigo'];
	}else{
		$combo_interno->SelectedData = $filterer_interno;
		$combo_codigo->SelectedData = $filterer_codigo;
	}
	$combo_interno->HTML = '<span id="interno-container' . $rnd1 . '"></span><input type="hidden" name="interno" id="interno' . $rnd1 . '" value="' . html_attr($combo_interno->SelectedData) . '">';
	$combo_interno->MatchText = '<span id="interno-container-readonly' . $rnd1 . '"></span><input type="hidden" name="interno" id="interno' . $rnd1 . '" value="' . html_attr($combo_interno->SelectedData) . '">';
	$combo_codigo->HTML = '<span id="codigo-container' . $rnd1 . '"></span><input type="hidden" name="codigo" id="codigo' . $rnd1 . '" value="' . html_attr($combo_codigo->SelectedData) . '">';
	$combo_codigo->MatchText = '<span id="codigo-container-readonly' . $rnd1 . '"></span><input type="hidden" name="codigo" id="codigo' . $rnd1 . '" value="' . html_attr($combo_codigo->SelectedData) . '">';

	ob_start();
	?>

	<script>
		// initial lookup values
		AppGini.current_interno__RAND__ = { text: "", value: "<?php echo addslashes($selected_id ? $urow['interno'] : $filterer_interno); ?>"};
		AppGini.current_codigo__RAND__ = { text: "", value: "<?php echo addslashes($selected_id ? $urow['codigo'] : $filterer_codigo); ?>"};

		jQuery(function() {
			setTimeout(function(){
				if(typeof(interno_reload__RAND__) == 'function') interno_reload__RAND__();
				if(typeof(codigo_reload__RAND__) == 'function') codigo_reload__RAND__();
			}, 10); /* we need to slightly delay client-side execution of the above code to allow AppGini.ajaxCache to work */
		});
		function interno_reload__RAND__(){
		<?php if(($AllowUpdate || $AllowInsert) && !$dvprint){ ?>

			$j("#interno-container__RAND__").select2({
				/* initial default value */
				initSelection: function(e, c){
					$j.ajax({
						url: 'ajax_combo.php',
						dataType: 'json',
						data: { id: AppGini.current_interno__RAND__.value, t: 'equipo_repuestos', f: 'interno' },
						success: function(resp){
							c({
								id: resp.results[0].id,
								text: resp.results[0].text
							});
							$j('[name="interno"]').val(resp.results[0].id);
							$j('[id=interno-container-readonly__RAND__]').html('<span id="interno-match-text">' + resp.results[0].text + '</span>');
							if(resp.results[0].id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=equipos_view_parent]').hide(); }else{ $j('.btn[id=equipos_view_parent]').show(); }


							if(typeof(interno_update_autofills__RAND__) == 'function') interno_update_autofills__RAND__();
						}
					});
				},
				width: '100%',
				formatNoMatches: function(term){ /* */ return '<?php echo addslashes($Translation['No matches found!']); ?>'; },
				minimumResultsForSearch: 5,
				loadMorePadding: 200,
				ajax: {
					url: 'ajax_combo.php',
					dataType: 'json',
					cache: true,
					data: function(term, page){ /* */ return { s: term, p: page, t: 'equipo_repuestos', f: 'interno' }; },
					results: function(resp, page){ /* */ return resp; }
				},
				escapeMarkup: function(str){ /* */ return str; }
			}).on('change', function(e){
				AppGini.current_interno__RAND__.value = e.added.id;
				AppGini.current_interno__RAND__.text = e.added.text;
				$j('[name="interno"]').val(e.added.id);
				if(e.added.id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=equipos_view_parent]').hide(); }else{ $j('.btn[id=equipos_view_parent]').show(); }


				if(typeof(interno_update_autofills__RAND__) == 'function') interno_update_autofills__RAND__();
			});

			if(!$j("#interno-container__RAND__").length){
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: { id: AppGini.current_interno__RAND__.value, t: 'equipo_repuestos', f: 'interno' },
					success: function(resp){
						$j('[name="interno"]').val(resp.results[0].id);
						$j('[id=interno-container-readonly__RAND__]').html('<span id="interno-match-text">' + resp.results[0].text + '</span>');
						if(resp.results[0].id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=equipos_view_parent]').hide(); }else{ $j('.btn[id=equipos_view_parent]').show(); }

						if(typeof(interno_update_autofills__RAND__) == 'function') interno_update_autofills__RAND__();
					}
				});
			}

		<?php }else{ ?>

			$j.ajax({
				url: 'ajax_combo.php',
				dataType: 'json',
				data: { id: AppGini.current_interno__RAND__.value, t: 'equipo_repuestos', f: 'interno' },
				success: function(resp){
					$j('[id=interno-container__RAND__], [id=interno-container-readonly__RAND__]').html('<span id="interno-match-text">' + resp.results[0].text + '</span>');
					if(resp.results[0].id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=equipos_view_parent]').hide(); }else{ $j('.btn[id=equipos_view_parent]').show(); }

					if(typeof(interno_update_autofills__RAND__) == 'function') interno_update_autofills__RAND__();
				}
			});
		<?php } ?>

		}
		function codigo_reload__RAND__(){
		<?php if(($AllowUpdate || $AllowInsert) && !$dvprint){ ?>

			$j("#codigo-container__RAND__").select2({
				/* initial default value */
				initSelection: function(e, c){
					$j.ajax({
						url: 'ajax_combo.php',
						dataType: 'json',
						data: { id: AppGini.current_codigo__RAND__.value, t: 'equipo_repuestos', f: 'codigo' },
						success: function(resp){
							c({
								id: resp.results[0].id,
								text: resp.results[0].text
							});
							$j('[name="codigo"]').val(resp.results[0].id);
							$j('[id=codigo-container-readonly__RAND__]').html('<span id="codigo-match-text">' + resp.results[0].text + '</span>');
							if(resp.results[0].id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=repuestos_view_parent]').hide(); }else{ $j('.btn[id=repuestos_view_parent]').show(); }


							if(typeof(codigo_update_autofills__RAND__) == 'function') codigo_update_autofills__RAND__();
						}
					});
				},
				width: '100%',
				formatNoMatches: function(term){ /* */ return '<?php echo addslashes($Translation['No matches found!']); ?>'; },
				minimumResultsForSearch: 5,
				loadMorePadding: 200,
				ajax: {
					url: 'ajax_combo.php',
					dataType: 'json',
					cache: true,
					data: function(term, page){ /* */ return { s: term, p: page, t: 'equipo_repuestos', f: 'codigo' }; },
					results: function(resp, page){ /* */ return resp; }
				},
				escapeMarkup: function(str){ /* */ return str; }
			}).on('change', function(e){
				AppGini.current_codigo__RAND__.value = e.added.id;
				AppGini.current_codigo__RAND__.text = e.added.text;
				$j('[name="codigo"]').val(e.added.id);
				if(e.added.id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=repuestos_view_parent]').hide(); }else{ $j('.btn[id=repuestos_view_parent]').show(); }


				if(typeof(codigo_update_autofills__RAND__) == 'function') codigo_update_autofills__RAND__();
			});

			if(!$j("#codigo-container__RAND__").length){
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: { id: AppGini.current_codigo__RAND__.value, t: 'equipo_repuestos', f: 'codigo' },
					success: function(resp){
						$j('[name="codigo"]').val(resp.results[0].id);
						$j('[id=codigo-container-readonly__RAND__]').html('<span id="codigo-match-text">' + resp.results[0].text + '</span>');
						if(resp.results[0].id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=repuestos_view_parent]').hide(); }else{ $j('.btn[id=repuestos_view_parent]').show(); }

						if(typeof(codigo_update_autofills__RAND__) == 'function') codigo_update_autofills__RAND__();
					}
				});
			}

		<?php }else{ ?>

			$j.ajax({
				url: 'ajax_combo.php',
				dataType: 'json',
				data: { id: AppGini.current_codigo__RAND__.value, t: 'equipo_repuestos', f: 'codigo' },
				success: function(resp){
					$j('[id=codigo-container__RAND__], [id=codigo-container-readonly__RAND__]').html('<span id="codigo-match-text">' + resp.results[0].text + '</span>');
					if(resp.results[0].id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=repuestos_view_parent]').hide(); }else{ $j('.btn[id=repuestos_view_parent]').show(); }

					if(typeof(codigo_update_autofills__RAND__) == 'function') codigo_update_autofills__RAND__();
				}
			});
		<?php } ?>

		}
	</script>
	<?php

	$lookups = str_replace('__RAND__', $rnd1, ob_get_contents());
	ob_end_clean();


	// code for template based detail view forms

	// open the detail view template
	if($dvprint){
		$template_file = is_file("./{$TemplateDVP}") ? "./{$TemplateDVP}" : './templates/equipo_repuestos_templateDVP.html';
		$templateCode = @file_get_contents($template_file);
	}else{
		$template_file = is_file("./{$TemplateDV}") ? "./{$TemplateDV}" : './templates/equipo_repuestos_templateDV.html';
		$templateCode = @file_get_contents($template_file);
	}

	// process form title
	$templateCode = str_replace('<%%DETAIL_VIEW_TITLE%%>', 'Equipo repuesto details', $templateCode);
	$templateCode = str_replace('<%%RND1%%>', $rnd1, $templateCode);
	$templateCode = str_replace('<%%EMBEDDED%%>', ($_REQUEST['Embedded'] ? 'Embedded=1' : ''), $templateCode);
	// process buttons
	if($AllowInsert){
		if(!$selected_id) $templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-success" id="insert" name="insert_x" value="1" onclick="return equipo_repuestos_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save New'] . '</button>', $templateCode);
		$templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="insert" name="insert_x" value="1" onclick="return equipo_repuestos_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save As Copy'] . '</button>', $templateCode);
	}else{
		$templateCode = str_replace('<%%INSERT_BUTTON%%>', '', $templateCode);
	}

	// 'Back' button action
	if($_REQUEST['Embedded']){
		$backAction = 'AppGini.closeParentModal(); return false;';
	}else{
		$backAction = '$j(\'form\').eq(0).attr(\'novalidate\', \'novalidate\'); document.myform.reset(); return true;';
	}

	if($selected_id){
		if(!$_REQUEST['Embedded']) $templateCode = str_replace('<%%DVPRINT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="dvprint" name="dvprint_x" value="1" onclick="$j(\'form\').eq(0).prop(\'novalidate\', true); document.myform.reset(); return true;" title="' . html_attr($Translation['Print Preview']) . '"><i class="glyphicon glyphicon-print"></i> ' . $Translation['Print Preview'] . '</button>', $templateCode);
		if($AllowUpdate){
			$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '<button type="submit" class="btn btn-success btn-lg" id="update" name="update_x" value="1" onclick="return equipo_repuestos_validateData();" title="' . html_attr($Translation['Save Changes']) . '"><i class="glyphicon glyphicon-ok"></i> ' . $Translation['Save Changes'] . '</button>', $templateCode);
		}else{
			$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		}
		if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3){ // allow delete?
			$templateCode = str_replace('<%%DELETE_BUTTON%%>', '<button type="submit" class="btn btn-danger" id="delete" name="delete_x" value="1" onclick="return confirm(\'' . $Translation['are you sure?'] . '\');" title="' . html_attr($Translation['Delete']) . '"><i class="glyphicon glyphicon-trash"></i> ' . $Translation['Delete'] . '</button>', $templateCode);
		}else{
			$templateCode = str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		}
		$templateCode = str_replace('<%%DESELECT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '" title="' . html_attr($Translation['Back']) . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>', $templateCode);
	}else{
		$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '', $templateCode);
		$templateCode = str_replace('<%%DELETE_BUTTON%%>', '', $templateCode);
		$templateCode = str_replace('<%%DESELECT_BUTTON%%>', ($ShowCancel ? '<button type="submit" class="btn btn-default" id="deselect" name="deselect_x" value="1" onclick="' . $backAction . '" title="' . html_attr($Translation['Back']) . '"><i class="glyphicon glyphicon-chevron-left"></i> ' . $Translation['Back'] . '</button>' : ''), $templateCode);
	}

	// set records to read only if user can't insert new records and can't edit current record
	if(($selected_id && !$AllowUpdate && !$AllowInsert) || (!$selected_id && !$AllowInsert)){
		$jsReadOnly .= "\tjQuery('#interno').prop('disabled', true).css({ color: '#555', backgroundColor: '#fff' });\n";
		$jsReadOnly .= "\tjQuery('#interno_caption').prop('disabled', true).css({ color: '#555', backgroundColor: 'white' });\n";
		$jsReadOnly .= "\tjQuery('#codigo').prop('disabled', true).css({ color: '#555', backgroundColor: '#fff' });\n";
		$jsReadOnly .= "\tjQuery('#codigo_caption').prop('disabled', true).css({ color: '#555', backgroundColor: 'white' });\n";
		$jsReadOnly .= "\tjQuery('#cantidad').replaceWith('<div class=\"form-control-static\" id=\"cantidad\">' + (jQuery('#cantidad').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('.select2-container').hide();\n";

		$noUploads = true;
	}elseif($AllowInsert){
		$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', true);"; // temporarily disable form change handler
			$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', false);"; // re-enable form change handler
	}

	// process combos
	$templateCode = str_replace('<%%COMBO(interno)%%>', $combo_interno->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(interno)%%>', $combo_interno->MatchText, $templateCode);
	$templateCode = str_replace('<%%URLCOMBOTEXT(interno)%%>', urlencode($combo_interno->MatchText), $templateCode);
	$templateCode = str_replace('<%%COMBO(codigo)%%>', $combo_codigo->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(codigo)%%>', $combo_codigo->MatchText, $templateCode);
	$templateCode = str_replace('<%%URLCOMBOTEXT(codigo)%%>', urlencode($combo_codigo->MatchText), $templateCode);

	/* lookup fields array: 'lookup field name' => array('parent table name', 'lookup field caption') */
	$lookup_fields = array(  'interno' => array('equipos', 'Interno'), 'codigo' => array('repuestos', 'Repuesto'));
	foreach($lookup_fields as $luf => $ptfc){
		$pt_perm = getTablePermissions($ptfc[0]);

		// process foreign key links
		if($pt_perm['view'] || $pt_perm['edit']){
			$templateCode = str_replace("<%%PLINK({$luf})%%>", '<button type="button" class="btn btn-default view_parent hspacer-md" id="' . $ptfc[0] . '_view_parent" title="' . html_attr($Translation['View'] . ' ' . $ptfc[1]) . '"><i class="glyphicon glyphicon-eye-open"></i></button>', $templateCode);
		}

		// if user has insert permission to parent table of a lookup field, put an add new button
		if($pt_perm['insert'] && !$_REQUEST['Embedded']){
			$templateCode = str_replace("<%%ADDNEW({$ptfc[0]})%%>", '<button type="button" class="btn btn-success add_new_parent hspacer-md" id="' . $ptfc[0] . '_add_new" title="' . html_attr($Translation['Add New'] . ' ' . $ptfc[1]) . '"><i class="glyphicon glyphicon-plus-sign"></i></button>', $templateCode);
		}
	}

	// process images
	$templateCode = str_replace('<%%UPLOADFILE(id)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(interno)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(codigo)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(cantidad)%%>', '', $templateCode);

	// process values
	if($selected_id){
		if( $dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', safe_html($urow['id']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', html_attr($row['id']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode($urow['id']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(interno)%%>', safe_html($urow['interno']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(interno)%%>', html_attr($row['interno']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(interno)%%>', urlencode($urow['interno']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(codigo)%%>', safe_html($urow['codigo']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(codigo)%%>', html_attr($row['codigo']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(codigo)%%>', urlencode($urow['codigo']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(cantidad)%%>', safe_html($urow['cantidad']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(cantidad)%%>', html_attr($row['cantidad']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(cantidad)%%>', urlencode($urow['cantidad']), $templateCode);
	}else{
		$templateCode = str_replace('<%%VALUE(id)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(interno)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(interno)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(codigo)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(codigo)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(cantidad)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(cantidad)%%>', urlencode(''), $templateCode);
	}

	// process translations
	foreach($Translation as $symbol=>$trans){
		$templateCode = str_replace("<%%TRANSLATION($symbol)%%>", $trans, $templateCode);
	}

	// clear scrap
	$templateCode = str_replace('<%%', '<!-- ', $templateCode);
	$templateCode = str_replace('%%>', ' -->', $templateCode);

	// hide links to inaccessible tables
	if($_REQUEST['dvprint_x'] == ''){
		$templateCode .= "\n\n<script>\$j(function(){\n";
		$arrTables = getTableList();
		foreach($arrTables as $name => $caption){
			$templateCode .= "\t\$j('#{$name}_link').removeClass('hidden');\n";
			$templateCode .= "\t\$j('#xs_{$name}_link').removeClass('hidden');\n";
		}

		$templateCode .= $jsReadOnly;
		$templateCode .= $jsEditable;

		if(!$selected_id){
		}

		$templateCode.="\n});</script>\n";
	}

	// ajaxed auto-fill fields
	$templateCode .= '<script>';
	$templateCode .= '$j(function() {';

	$templateCode .= "\tcodigo_update_autofills$rnd1 = function(){\n";
	$templateCode .= "\t\t\$j.ajax({\n";
	if($dvprint) {
		$templateCode .= "\t\t\turl: 'equipo_repuestos_autofill.php?rnd1=$rnd1&mfk=codigo&id=' + encodeURIComponent('".addslashes($row['codigo'])."'),\n";
		$templateCode .= "\t\t\tcontentType: 'application/x-www-form-urlencoded; charset=" . datalist_db_encoding . "',\n";
		$templateCode .= "\t\t\ttype: 'GET'\n";
	} else {
		$templateCode .= "\t\t\turl: 'equipo_repuestos_autofill.php?rnd1=$rnd1&mfk=codigo&id=' + encodeURIComponent(AppGini.current_codigo{$rnd1}.value),\n";
		$templateCode .= "\t\t\tcontentType: 'application/x-www-form-urlencoded; charset=" . datalist_db_encoding . "',\n";
		$templateCode .= "\t\t\ttype: 'GET',\n";
		$templateCode .= "\t\t\tbeforeSend: function() { \$j('#codigo$rnd1').prop('disabled', true); \$j('#codigoLoading').html('<img src=loading.gif align=top>'); },\n";
		$templateCode .= "\t\t\tcomplete: function() { " . (($arrPerm[1] || (($arrPerm[3] == 1 && $ownerMemberID == getLoggedMemberID()) || ($arrPerm[3] == 2 && $ownerGroupID == getLoggedGroupID()) || $arrPerm[3] == 3)) ? "\$j('#codigo$rnd1').prop('disabled', false); " : "\$j('#codigo$rnd1').prop('disabled', true); ")."\$j('#codigoLoading').html(''); \$j(window).resize(); }\n";
	}
	$templateCode .= "\t\t});\n";
	$templateCode .= "\t};\n";
	if(!$dvprint) $templateCode .= "\tif(\$j('#codigo_caption').length) \$j('#codigo_caption').click(function(){ /* */ codigo_update_autofills$rnd1(); });\n";


	$templateCode.="});";
	$templateCode.="</script>";
	$templateCode .= $lookups;

	// handle enforced parent values for read-only lookup fields

	// don't include blank images in lightbox gallery
	$templateCode = preg_replace('/blank.gif" data-lightbox=".*?"/', 'blank.gif"', $templateCode);

	// don't display empty email links
	$templateCode=preg_replace('/<a .*?href="mailto:".*?<\/a>/', '', $templateCode);

	/* default field values */
	$rdata = $jdata = get_defaults('equipo_repuestos');
	if($selected_id){
		$jdata = get_joined_record('equipo_repuestos', $selected_id);
		if($jdata === false) $jdata = get_defaults('equipo_repuestos');
		$rdata = $row;
	}
	$templateCode .= loadView('equipo_repuestos-ajax-cache', array('rdata' => $rdata, 'jdata' => $jdata));

	// hook: equipo_repuestos_dv
	if(function_exists('equipo_repuestos_dv')){
		$args=array();
		equipo_repuestos_dv(($selected_id ? $selected_id : FALSE), getMemberInfo(), $templateCode, $args);
	}

	return $templateCode;
}
?>