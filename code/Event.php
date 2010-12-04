<?php

class Event extends Page {
	static $db = array(
	   'DateFrom'  =>  'Date',
	   'DateTo'    =>  'Date',
	   'TimeFrom'  =>  'Time',
	   'TimeTo'    =>  'Time',
	   'City'  =>  'Varchar(255)'
	);
	
	static $default_parent = 'EventHolder';
    static $can_be_root = false;
    static $allowed_children = "none"; 
    
    static $defaults = array(
        "ProvideComments" => false,
        'ShowInMenus' => false
    );	
	
	function getCMSFields() {
		$fields = parent::getCMSFields();
		$fields->addFieldToTab(_t('Event.DateTab','Root.Content.Veranstaltungsdaten'),$dateField = new DateField('DateFrom',_t('Event.DateFrom','Datum von')));
		$dateField->setConfig('showcalendar', true);
		$fields->addFieldToTab(_t('Event.DateTab','Root.Content.Veranstaltungsdaten'),new TimeField('TimeFrom',_t('Event.TimeFrom','Startzeit')));
        $fields->addFieldToTab(_t('Event.DateTab','Root.Content.Veranstaltungsdaten'),$dateField = new DateField('DateTo',_t('Event.DateTo','Datum bis')));
        $dateField->setConfig('showcalendar', true);
        $fields->addFieldToTab(_t('Event.DateTab','Root.Content.Veranstaltungsdaten'),new TimeField('TimeTo',_t('Event.TimeTo','Endzeit')));
        $fields->addFieldToTab(_t('Event.DateTab','Root.Content.Veranstaltungsdaten'),new TextField('City',_t('Event.City','Ort')));
        
        return $fields;
	}
    

    
	
	
}
 
class Event_Controller extends Page_Controller {
	function init(){
		parent::init();
        Requirements::css('events/css/events.css');
	}
}

?>