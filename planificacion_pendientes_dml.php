<?php

// Data functions (insert, update, delete, form) for table planificacion_pendientes

// This script and data application were generated by AppGini 5.75
// Download AppGini for free from https://bigprof.com/appgini/download/

function planificacion_pendientes_insert(){
	global $Translation;

	// mm: can member insert record?
	$arrPerm=getTablePermissions('planificacion_pendientes');
	if(!$arrPerm[1]){
		return false;
	}

	$data['planificacion'] = makeSafe($_REQUEST['planificacion']);
		if($data['planificacion'] == empty_lookup_value){ $data['planificacion'] = ''; }
	$data['interno'] = makeSafe($_REQUEST['planificacion']);
		if($data['interno'] == empty_lookup_value){ $data['interno'] = ''; }
	$data['comentario'] = br2nl(makeSafe($_REQUEST['comentario']));
	$data['cumplido'] = makeSafe($_REQUEST['cumplido']);
		if($data['cumplido'] == empty_lookup_value){ $data['cumplido'] = ''; }

	// hook: planificacion_pendientes_before_insert
	if(function_exists('planificacion_pendientes_before_insert')){
		$args=array();
		if(!planificacion_pendientes_before_insert($data, getMemberInfo(), $args)){ return false; }
	}

	$o = array('silentErrors' => true);
	sql('insert into `planificacion_pendientes` set       `planificacion`=' . (($data['planificacion'] !== '' && $data['planificacion'] !== NULL) ? "'{$data['planificacion']}'" : 'NULL') . ', `interno`=' . (($data['interno'] !== '' && $data['interno'] !== NULL) ? "'{$data['interno']}'" : 'NULL') . ', `comentario`=' . (($data['comentario'] !== '' && $data['comentario'] !== NULL) ? "'{$data['comentario']}'" : 'NULL') . ', `cumplido`=' . (($data['cumplido'] !== '' && $data['cumplido'] !== NULL) ? "'{$data['cumplido']}'" : 'NULL'), $o);
	if($o['error']!=''){
		echo $o['error'];
		echo "<a href=\"planificacion_pendientes_view.php?addNew_x=1\">{$Translation['< back']}</a>";
		exit;
	}

	$recID = db_insert_id(db_link());

	// hook: planificacion_pendientes_after_insert
	if(function_exists('planificacion_pendientes_after_insert')){
		$res = sql("select * from `planificacion_pendientes` where `id`='" . makeSafe($recID, false) . "' limit 1", $eo);
		if($row = db_fetch_assoc($res)){
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = makeSafe($recID, false);
		$args=array();
		if(!planificacion_pendientes_after_insert($data, getMemberInfo(), $args)){ return $recID; }
	}

	// mm: save ownership data
	set_record_owner('planificacion_pendientes', $recID, getLoggedMemberID());

	return $recID;
}

function planificacion_pendientes_delete($selected_id, $AllowDeleteOfParents=false, $skipChecks=false){
	// insure referential integrity ...
	global $Translation;
	$selected_id=makeSafe($selected_id);

	// mm: can member delete record?
	$arrPerm=getTablePermissions('planificacion_pendientes');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='planificacion_pendientes' and pkValue='$selected_id'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='planificacion_pendientes' and pkValue='$selected_id'");
	if(($arrPerm[4]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[4]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[4]==3){ // allow delete?
		// delete allowed, so continue ...
	}else{
		return $Translation['You don\'t have enough permissions to delete this record'];
	}

	// hook: planificacion_pendientes_before_delete
	if(function_exists('planificacion_pendientes_before_delete')){
		$args=array();
		if(!planificacion_pendientes_before_delete($selected_id, $skipChecks, getMemberInfo(), $args))
			return $Translation['Couldn\'t delete this record'];
	}

	sql("delete from `planificacion_pendientes` where `id`='$selected_id'", $eo);

	// hook: planificacion_pendientes_after_delete
	if(function_exists('planificacion_pendientes_after_delete')){
		$args=array();
		planificacion_pendientes_after_delete($selected_id, getMemberInfo(), $args);
	}

	// mm: delete ownership data
	sql("delete from membership_userrecords where tableName='planificacion_pendientes' and pkValue='$selected_id'", $eo);
}

function planificacion_pendientes_update($selected_id){
	global $Translation;

	// mm: can member edit record?
	$arrPerm=getTablePermissions('planificacion_pendientes');
	$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='planificacion_pendientes' and pkValue='".makeSafe($selected_id)."'");
	$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='planificacion_pendientes' and pkValue='".makeSafe($selected_id)."'");
	if(($arrPerm[3]==1 && $ownerMemberID==getLoggedMemberID()) || ($arrPerm[3]==2 && $ownerGroupID==getLoggedGroupID()) || $arrPerm[3]==3){ // allow update?
		// update allowed, so continue ...
	}else{
		return false;
	}

	$data['planificacion'] = makeSafe($_REQUEST['planificacion']);
		if($data['planificacion'] == empty_lookup_value){ $data['planificacion'] = ''; }
	$data['interno'] = makeSafe($_REQUEST['planificacion']);
		if($data['interno'] == empty_lookup_value){ $data['interno'] = ''; }
	$data['comentario'] = br2nl(makeSafe($_REQUEST['comentario']));
	$data['cumplido'] = makeSafe($_REQUEST['cumplido']);
		if($data['cumplido'] == empty_lookup_value){ $data['cumplido'] = ''; }
	$data['selectedID']=makeSafe($selected_id);

	// hook: planificacion_pendientes_before_update
	if(function_exists('planificacion_pendientes_before_update')){
		$args=array();
		if(!planificacion_pendientes_before_update($data, getMemberInfo(), $args)){ return false; }
	}

	$o=array('silentErrors' => true);
	sql('update `planificacion_pendientes` set       `planificacion`=' . (($data['planificacion'] !== '' && $data['planificacion'] !== NULL) ? "'{$data['planificacion']}'" : 'NULL') . ', `interno`=' . (($data['interno'] !== '' && $data['interno'] !== NULL) ? "'{$data['interno']}'" : 'NULL') . ', `comentario`=' . (($data['comentario'] !== '' && $data['comentario'] !== NULL) ? "'{$data['comentario']}'" : 'NULL') . ', `cumplido`=' . (($data['cumplido'] !== '' && $data['cumplido'] !== NULL) ? "'{$data['cumplido']}'" : 'NULL') . " where `id`='".makeSafe($selected_id)."'", $o);
	if($o['error']!=''){
		echo $o['error'];
		echo '<a href="planificacion_pendientes_view.php?SelectedID='.urlencode($selected_id)."\">{$Translation['< back']}</a>";
		exit;
	}


	// hook: planificacion_pendientes_after_update
	if(function_exists('planificacion_pendientes_after_update')){
		$res = sql("SELECT * FROM `planificacion_pendientes` WHERE `id`='{$data['selectedID']}' LIMIT 1", $eo);
		if($row = db_fetch_assoc($res)){
			$data = array_map('makeSafe', $row);
		}
		$data['selectedID'] = $data['id'];
		$args = array();
		if(!planificacion_pendientes_after_update($data, getMemberInfo(), $args)){ return; }
	}

	// mm: update ownership data
	sql("update membership_userrecords set dateUpdated='".time()."' where tableName='planificacion_pendientes' and pkValue='".makeSafe($selected_id)."'", $eo);

}

function planificacion_pendientes_form($selected_id = '', $AllowUpdate = 1, $AllowInsert = 1, $AllowDelete = 1, $ShowCancel = 0, $TemplateDV = '', $TemplateDVP = ''){
	// function to return an editable form for a table records
	// and fill it with data of record whose ID is $selected_id. If $selected_id
	// is empty, an empty form is shown, with only an 'Add New'
	// button displayed.

	global $Translation;

	// mm: get table permissions
	$arrPerm=getTablePermissions('planificacion_pendientes');
	if(!$arrPerm[1] && $selected_id==''){ return ''; }
	$AllowInsert = ($arrPerm[1] ? true : false);
	// print preview?
	$dvprint = false;
	if($selected_id && $_REQUEST['dvprint_x'] != ''){
		$dvprint = true;
	}

	$filterer_planificacion = thisOr(undo_magic_quotes($_REQUEST['filterer_planificacion']), '');

	// populate filterers, starting from children to grand-parents

	// unique random identifier
	$rnd1 = ($dvprint ? rand(1000000, 9999999) : '');
	// combobox: planificacion
	$combo_planificacion = new DataCombo;

	if($selected_id){
		// mm: check member permissions
		if(!$arrPerm[2]){
			return "";
		}
		// mm: who is the owner?
		$ownerGroupID=sqlValue("select groupID from membership_userrecords where tableName='planificacion_pendientes' and pkValue='".makeSafe($selected_id)."'");
		$ownerMemberID=sqlValue("select lcase(memberID) from membership_userrecords where tableName='planificacion_pendientes' and pkValue='".makeSafe($selected_id)."'");
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

		$res = sql("select * from `planificacion_pendientes` where `id`='".makeSafe($selected_id)."'", $eo);
		if(!($row = db_fetch_array($res))){
			return error_message($Translation['No records found'], 'planificacion_pendientes_view.php', false);
		}
		$urow = $row; /* unsanitized data */
		$hc = new CI_Input();
		$row = $hc->xss_clean($row); /* sanitize data */
		$combo_planificacion->SelectedData = $row['planificacion'];
	}else{
		$combo_planificacion->SelectedData = $filterer_planificacion;
	}
	$combo_planificacion->HTML = '<span id="planificacion-container' . $rnd1 . '"></span><input type="hidden" name="planificacion" id="planificacion' . $rnd1 . '" value="' . html_attr($combo_planificacion->SelectedData) . '">';
	$combo_planificacion->MatchText = '<span id="planificacion-container-readonly' . $rnd1 . '"></span><input type="hidden" name="planificacion" id="planificacion' . $rnd1 . '" value="' . html_attr($combo_planificacion->SelectedData) . '">';

	ob_start();
	?>

	<script>
		// initial lookup values
		AppGini.current_planificacion__RAND__ = { text: "", value: "<?php echo addslashes($selected_id ? $urow['planificacion'] : $filterer_planificacion); ?>"};

		jQuery(function() {
			setTimeout(function(){
				if(typeof(planificacion_reload__RAND__) == 'function') planificacion_reload__RAND__();
			}, 10); /* we need to slightly delay client-side execution of the above code to allow AppGini.ajaxCache to work */
		});
		function planificacion_reload__RAND__(){
		<?php if(($AllowUpdate || $AllowInsert) && !$dvprint){ ?>

			$j("#planificacion-container__RAND__").select2({
				/* initial default value */
				initSelection: function(e, c){
					$j.ajax({
						url: 'ajax_combo.php',
						dataType: 'json',
						data: { id: AppGini.current_planificacion__RAND__.value, t: 'planificacion_pendientes', f: 'planificacion' },
						success: function(resp){
							c({
								id: resp.results[0].id,
								text: resp.results[0].text
							});
							$j('[name="planificacion"]').val(resp.results[0].id);
							$j('[id=planificacion-container-readonly__RAND__]').html('<span id="planificacion-match-text">' + resp.results[0].text + '</span>');
							if(resp.results[0].id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=planificacion_equipos_view_parent]').hide(); }else{ $j('.btn[id=planificacion_equipos_view_parent]').show(); }


							if(typeof(planificacion_update_autofills__RAND__) == 'function') planificacion_update_autofills__RAND__();
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
					data: function(term, page){ /* */ return { s: term, p: page, t: 'planificacion_pendientes', f: 'planificacion' }; },
					results: function(resp, page){ /* */ return resp; }
				},
				escapeMarkup: function(str){ /* */ return str; }
			}).on('change', function(e){
				AppGini.current_planificacion__RAND__.value = e.added.id;
				AppGini.current_planificacion__RAND__.text = e.added.text;
				$j('[name="planificacion"]').val(e.added.id);
				if(e.added.id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=planificacion_equipos_view_parent]').hide(); }else{ $j('.btn[id=planificacion_equipos_view_parent]').show(); }


				if(typeof(planificacion_update_autofills__RAND__) == 'function') planificacion_update_autofills__RAND__();
			});

			if(!$j("#planificacion-container__RAND__").length){
				$j.ajax({
					url: 'ajax_combo.php',
					dataType: 'json',
					data: { id: AppGini.current_planificacion__RAND__.value, t: 'planificacion_pendientes', f: 'planificacion' },
					success: function(resp){
						$j('[name="planificacion"]').val(resp.results[0].id);
						$j('[id=planificacion-container-readonly__RAND__]').html('<span id="planificacion-match-text">' + resp.results[0].text + '</span>');
						if(resp.results[0].id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=planificacion_equipos_view_parent]').hide(); }else{ $j('.btn[id=planificacion_equipos_view_parent]').show(); }

						if(typeof(planificacion_update_autofills__RAND__) == 'function') planificacion_update_autofills__RAND__();
					}
				});
			}

		<?php }else{ ?>

			$j.ajax({
				url: 'ajax_combo.php',
				dataType: 'json',
				data: { id: AppGini.current_planificacion__RAND__.value, t: 'planificacion_pendientes', f: 'planificacion' },
				success: function(resp){
					$j('[id=planificacion-container__RAND__], [id=planificacion-container-readonly__RAND__]').html('<span id="planificacion-match-text">' + resp.results[0].text + '</span>');
					if(resp.results[0].id == '<?php echo empty_lookup_value; ?>'){ $j('.btn[id=planificacion_equipos_view_parent]').hide(); }else{ $j('.btn[id=planificacion_equipos_view_parent]').show(); }

					if(typeof(planificacion_update_autofills__RAND__) == 'function') planificacion_update_autofills__RAND__();
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
		$template_file = is_file("./{$TemplateDVP}") ? "./{$TemplateDVP}" : './templates/planificacion_pendientes_templateDVP.html';
		$templateCode = @file_get_contents($template_file);
	}else{
		$template_file = is_file("./{$TemplateDV}") ? "./{$TemplateDV}" : './templates/planificacion_pendientes_templateDV.html';
		$templateCode = @file_get_contents($template_file);
	}

	// process form title
	$templateCode = str_replace('<%%DETAIL_VIEW_TITLE%%>', 'Planificacion pendiente details', $templateCode);
	$templateCode = str_replace('<%%RND1%%>', $rnd1, $templateCode);
	$templateCode = str_replace('<%%EMBEDDED%%>', ($_REQUEST['Embedded'] ? 'Embedded=1' : ''), $templateCode);
	// process buttons
	if($AllowInsert){
		if(!$selected_id) $templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-success" id="insert" name="insert_x" value="1" onclick="return planificacion_pendientes_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save New'] . '</button>', $templateCode);
		$templateCode = str_replace('<%%INSERT_BUTTON%%>', '<button type="submit" class="btn btn-default" id="insert" name="insert_x" value="1" onclick="return planificacion_pendientes_validateData();"><i class="glyphicon glyphicon-plus-sign"></i> ' . $Translation['Save As Copy'] . '</button>', $templateCode);
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
			$templateCode = str_replace('<%%UPDATE_BUTTON%%>', '<button type="submit" class="btn btn-success btn-lg" id="update" name="update_x" value="1" onclick="return planificacion_pendientes_validateData();" title="' . html_attr($Translation['Save Changes']) . '"><i class="glyphicon glyphicon-ok"></i> ' . $Translation['Save Changes'] . '</button>', $templateCode);
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
		$jsReadOnly .= "\tjQuery('#planificacion').prop('disabled', true).css({ color: '#555', backgroundColor: '#fff' });\n";
		$jsReadOnly .= "\tjQuery('#planificacion_caption').prop('disabled', true).css({ color: '#555', backgroundColor: 'white' });\n";
		$jsReadOnly .= "\tjQuery('#comentario').replaceWith('<div class=\"form-control-static\" id=\"comentario\">' + (jQuery('#comentario').val() || '') + '</div>');\n";
		$jsReadOnly .= "\tjQuery('#cumplido').prop('disabled', true);\n";
		$jsReadOnly .= "\tjQuery('.select2-container').hide();\n";

		$noUploads = true;
	}elseif($AllowInsert){
		$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', true);"; // temporarily disable form change handler
			$jsEditable .= "\tjQuery('form').eq(0).data('already_changed', false);"; // re-enable form change handler
	}

	// process combos
	$templateCode = str_replace('<%%COMBO(planificacion)%%>', $combo_planificacion->HTML, $templateCode);
	$templateCode = str_replace('<%%COMBOTEXT(planificacion)%%>', $combo_planificacion->MatchText, $templateCode);
	$templateCode = str_replace('<%%URLCOMBOTEXT(planificacion)%%>', urlencode($combo_planificacion->MatchText), $templateCode);

	/* lookup fields array: 'lookup field name' => array('parent table name', 'lookup field caption') */
	$lookup_fields = array(  'planificacion' => array('planificacion_equipos', 'Planificacion'));
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
	$templateCode = str_replace('<%%UPLOADFILE(planificacion)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(comentario)%%>', '', $templateCode);
	$templateCode = str_replace('<%%UPLOADFILE(cumplido)%%>', '', $templateCode);

	// process values
	if($selected_id){
		if( $dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', safe_html($urow['id']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(id)%%>', html_attr($row['id']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode($urow['id']), $templateCode);
		if( $dvprint) $templateCode = str_replace('<%%VALUE(planificacion)%%>', safe_html($urow['planificacion']), $templateCode);
		if(!$dvprint) $templateCode = str_replace('<%%VALUE(planificacion)%%>', html_attr($row['planificacion']), $templateCode);
		$templateCode = str_replace('<%%URLVALUE(planificacion)%%>', urlencode($urow['planificacion']), $templateCode);
		if($dvprint || (!$AllowUpdate && !$AllowInsert)){
			$templateCode = str_replace('<%%VALUE(comentario)%%>', safe_html($urow['comentario']), $templateCode);
		}else{
			$templateCode = str_replace('<%%VALUE(comentario)%%>', html_attr($row['comentario']), $templateCode);
		}
		$templateCode = str_replace('<%%URLVALUE(comentario)%%>', urlencode($urow['comentario']), $templateCode);
		$templateCode = str_replace('<%%CHECKED(cumplido)%%>', ($row['cumplido'] ? "checked" : ""), $templateCode);
	}else{
		$templateCode = str_replace('<%%VALUE(id)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(id)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(planificacion)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(planificacion)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%VALUE(comentario)%%>', '', $templateCode);
		$templateCode = str_replace('<%%URLVALUE(comentario)%%>', urlencode(''), $templateCode);
		$templateCode = str_replace('<%%CHECKED(cumplido)%%>', '', $templateCode);
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

	$templateCode .= "\tplanificacion_update_autofills$rnd1 = function(){\n";
	$templateCode .= "\t\t\$j.ajax({\n";
	if($dvprint) {
		$templateCode .= "\t\t\turl: 'planificacion_pendientes_autofill.php?rnd1=$rnd1&mfk=planificacion&id=' + encodeURIComponent('".addslashes($row['planificacion'])."'),\n";
		$templateCode .= "\t\t\tcontentType: 'application/x-www-form-urlencoded; charset=" . datalist_db_encoding . "',\n";
		$templateCode .= "\t\t\ttype: 'GET'\n";
	} else {
		$templateCode .= "\t\t\turl: 'planificacion_pendientes_autofill.php?rnd1=$rnd1&mfk=planificacion&id=' + encodeURIComponent(AppGini.current_planificacion{$rnd1}.value),\n";
		$templateCode .= "\t\t\tcontentType: 'application/x-www-form-urlencoded; charset=" . datalist_db_encoding . "',\n";
		$templateCode .= "\t\t\ttype: 'GET',\n";
		$templateCode .= "\t\t\tbeforeSend: function() { \$j('#planificacion$rnd1').prop('disabled', true); \$j('#planificacionLoading').html('<img src=loading.gif align=top>'); },\n";
		$templateCode .= "\t\t\tcomplete: function() { " . (($arrPerm[1] || (($arrPerm[3] == 1 && $ownerMemberID == getLoggedMemberID()) || ($arrPerm[3] == 2 && $ownerGroupID == getLoggedGroupID()) || $arrPerm[3] == 3)) ? "\$j('#planificacion$rnd1').prop('disabled', false); " : "\$j('#planificacion$rnd1').prop('disabled', true); ")."\$j('#planificacionLoading').html(''); \$j(window).resize(); }\n";
	}
	$templateCode .= "\t\t});\n";
	$templateCode .= "\t};\n";
	if(!$dvprint) $templateCode .= "\tif(\$j('#planificacion_caption').length) \$j('#planificacion_caption').click(function(){ /* */ planificacion_update_autofills$rnd1(); });\n";


	$templateCode.="});";
	$templateCode.="</script>";
	$templateCode .= $lookups;

	// handle enforced parent values for read-only lookup fields

	// don't include blank images in lightbox gallery
	$templateCode = preg_replace('/blank.gif" data-lightbox=".*?"/', 'blank.gif"', $templateCode);

	// don't display empty email links
	$templateCode=preg_replace('/<a .*?href="mailto:".*?<\/a>/', '', $templateCode);

	/* default field values */
	$rdata = $jdata = get_defaults('planificacion_pendientes');
	if($selected_id){
		$jdata = get_joined_record('planificacion_pendientes', $selected_id);
		if($jdata === false) $jdata = get_defaults('planificacion_pendientes');
		$rdata = $row;
	}
	$templateCode .= loadView('planificacion_pendientes-ajax-cache', array('rdata' => $rdata, 'jdata' => $jdata));

	// hook: planificacion_pendientes_dv
	if(function_exists('planificacion_pendientes_dv')){
		$args=array();
		planificacion_pendientes_dv(($selected_id ? $selected_id : FALSE), getMemberInfo(), $templateCode, $args);
	}

	return $templateCode;
}
?>