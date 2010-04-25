<?php
function convert_to_alias_map($oldConf, $newConf) {
	$newConfAliases = $newConf->getElementObjects(ALIAS_D);
	
	$oldConfAliasMapLines = $oldConf->getAliasesWithLocationAndType();
	
	foreach($newConfAliases as $anAlias) {
		if($oldConfAliasMapLines[$anAlias->getLabel()]) {
			$anAlias->getAliasMap()->parseMapLine($oldConfAliasMapLines[$anAlias->getLabel()]);
			$anAlias->getAliasMap()->rebuildElementLine();
		}
	}
	
	$newConf->rebuildAliasMap();
}
?>