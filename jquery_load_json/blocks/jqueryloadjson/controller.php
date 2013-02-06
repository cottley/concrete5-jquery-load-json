<?php    
	defined('C5_EXECUTE') or die(_("Access Denied."));
	class JqueryloadjsonBlockController extends BlockController {
		
		var $pobj;
		 
		protected $btTable = 'btJqueryloadjson';
		protected $btInterfaceWidth = "400";
		protected $btInterfaceHeight = "230";
		
		public $divId = "";
		public $jsonURL = "";
		public $jsonURLType = "json";
		
		/** 
		 * Used for localization. If we want to localize the name/description we have to include this
		 */
		public function getBlockTypeDescription() {
			return t("Lets you add a block that will fill out an HTML template using JSON.");
		}
		
		public function getBlockTypeName() {
			return t("jQuery Load JSON");
		}
				
		function __construct($obj = null) {		
			parent::__construct($obj);	
		}
    
    public function on_page_view() {
      $bv = new BlockView();
      $bv->setBlockObject($this->getBlockObject());
      $blockURL = $bv->getBlockURL();
      $html = Loader::helper('html');            
      $this->addHeaderItem($html->javascript("{$blockURL}/jquery.loadJSON.js"));
      $pg = Page::getCurrentPage();
      $this->set('isEditMode', $pg->isEditMode());
		}
    
		function view(){ 
			$this->set('divId', $this->divId);	
			$this->set('jsonURL', $this->jsonURL); 
			$this->set('jsonURLType', $this->jsonURLType);
      $this->set('jscontent', $this->jscontent);            
		}
		
		function save($data) { 
			$args['divId'] = isset($data['divId']) ? trim($data['divId']) : '';
			$args['jsonURL'] = isset($data['jsonURL']) ? trim($data['jsonURL']) : '';
			$args['jsonURLType'] = isset($data['jsonURLType']) ? trim($data['jsonURLType']) : '';
			$args['jscontent'] = isset($data['jscontent']) ? $data['jscontent'] : '';      
			parent::save($args);
		}
		
	}
	
?>