<?php
class EventLeftAndMain extends Extension {
	function init() {
	   Requirements::javascript('events/javascript/LeftAndMainPrototype.js'); 
	 }
	 
	 function onAfterSave($record) {
	 	if (get_class($record) == 'Event') {
	 		FormResponse::add("
	 		var options = {onSuccess : function(response) {
	 			$('sitetree').changeCurrentTo($('sitetree').getTreeNodeByIdx(".$record->ID."));
	 		}};
	 		$('sitetree').reload(options);
	 		
	 		
	 		
	 		");
	 		
	 	}
	 }
}