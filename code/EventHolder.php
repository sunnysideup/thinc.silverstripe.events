<?php
class EventHolder extends Page {
	static $db = array(
		'EventListType' => "Enum('Compact,Preview,Full','Compact')"
	);
	
	static $allowed_children = array(
	   'Event'
	);
	
	static $defaults = array(
		"EventListType" => "Compact"
	);
	
	public function getSettingsFields() {
		$fields = parent::getSettingsFields();
		$fields->addFieldsToTab(
			'Root.Main.Settings', 
			$this->scaffoldFormFields(array('tabbed'=>false,'ajaxSafe'=>true,'restrictFields'=>array('EventListType')))
		);
		return $fields;
	}
	
	public function getEvents($all=false,$limit=null) {
		if ($all) 
			return Event::get()->where('ParentID = ' . $this->ID);
		return Event::get()->where('ParentID = ' . $this->ID . ' AND DateFrom > CURDATE()');
		
	}
	
	
	// made this while crossing the ballmers peek
	private function buildSectionMenu($section) {
		
		if ( get_class($section) == 'EventSection') {
			if ($section->date) {
				if ($section->isMonth) {
					$id = $section->date->Format('Y-m');
				} else {
					$id = $section->date->Year();
				}
			} else {
				$id = 0;
			}
			$html = '<li id="eventSection-'.$id.'" class="Folder closed"><a href="#"  class="Folder closed" title="Seitentyp:Page">';
			$html .= $section->getLabel() . '</a>';
			$html .= '<ul>';
			foreach ($section->getEvents() AS $child) {
				$html .= $this->buildSectionMenu($child);
			}
			$html .= '</ul>';	
			$html .= '</li>';	
		} else {
			$html = '<li id="record-'.$section->ID.'" class="Page"><a href="admin/show/'.$section->ID.'" class="Page closed" title="Seitentyp:Page">';
			$html .= $section->MenuTitle . '</a>';
		}
		
		return $html;
	}
	/*
	public function stageChildren($showAll=false) {
		return DataObject::get('EventArchive','ParentID=' . $this->ID);
	}
	
	// made this while crossing the ballmers peek
	public function getChildrenAsUL($attributes = "", $titleEval = '"<li>" . $child->Title', $extraArg = null, $limitToMarked = false, $childrenMethod = "AllChildrenIncludingDeleted", $numChildrenMethod = "numChildren", $rootCall = true, $minNodeCount = 30){
		//$html = parent::getChildrenAsUL($attributes,$titleEval,$extraArg,$limitToMarked,$childrenMethod,$numChildrenMethod,$rootCall,$minNodeCount);
		$html = '';
		$sections = $this->getEventSections(true);
		if ($sections) {
			$html .= '<ul>';
			foreach($sections AS $section) {
				$html .= $this->buildSectionMenu($section);	
			}
			$html .= '</ul>';
		}
		return $html;
	}
	*/

	
	// made this while crossing the ballmers peek
    function getEventSections($all=false) {
        $events = $this->getEvents($all);
        if (!$events)
              return null;
        $dos = new ArrayList();
        $year = '';
        $month = '';
        $section = null;
        $monthSection = null;
        foreach ($events AS $event) {
            $date = $event->obj('DateFrom');

            if ($monthSection == null && $date->Format('Y') == null) {
            	$monthSection = new EventSection();
            	$monthSection->setLabel(_t('Event.NODATE','__Event.NODATE__'));
            	$dos->push($monthSection);
            } else {
                if ($date->Format('Y') != $year) {
					$yearSection = new EventSection();
					$yearSection->setLabelByYear($date);
	                $year = $date->Format('Y');
	                $dos->push($yearSection);
            	}
	            if ($month != $date->Format('m')) {
	                $monthSection = new EventSection();
	                $monthSection->setLabelByMonth($date);
	                $month = $date->Format('m');
	                $yearSection->addEvent($monthSection);
	            }            	
            }

            $monthSection->addEvent($event);
        }
        
        return $dos;
    }
}
 
class EventHolder_Controller extends Page_Controller {
	function init(){
		parent::init();
		Requirements::css('events/css/events.css');
	}
	
	public function getEventList() {
		return $this->renderWith($this->EventListType . 'EventList');
	}
	

}

class EventSection extends ViewableData {
	private $label = null;
	private $events = null;
	public $date = null;
	public $isMonth = false;
	
	
	function setLabel($label) {
		$this->label = $label;
	}
	
	function setLabelByMonth($date) {
		$this->date = $date;
		$this->isMonth = true;
		$this->label = $date->FormatI18N('%B');
	}
	
	function setLabelByYear($date) {
		$this->date = $date;
		$this->label = $date->Format('Y');
	}
	
	function getLabel() {
		return $this->label;
	}
	
	function getEvents() {
		return $this->events;
	}
	
	function addEvent($event) {
		if ($this->events == null) {
			$this->events = new ArrayList();
		}
		$this->events->push($event);
	} 

}


?>