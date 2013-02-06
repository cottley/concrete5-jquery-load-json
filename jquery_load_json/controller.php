<?php   

defined('C5_EXECUTE') or die(_("Access Denied."));

class jqueryloadjsonPackage extends Package {

	protected $pkgHandle = 'jquery_load_json';
	protected $appVersionRequired = '5.3.3'; 
	protected $pkgVersion = '1.0.1';
	
	public function getPackageDescription() {
		return t("Lets you add a block where you can populate an html template using JSON.");
	}
	
	public function getPackageName() {
		return t("Jquery-load-json");
	}
	
	public function install() {
		$pkg = parent::install();
		
		// install block		
		BlockType::installBlockTypeFromPackage('jqueryloadjson', $pkg);
		
	}

}