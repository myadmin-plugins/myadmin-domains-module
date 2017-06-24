<?php

namespace Detain\MyAdminDomains;

use Symfony\Component\EventDispatcher\GenericEvent;

class Plugin {

	public static $name = 'Domain Registrations Module';
	public static $description = 'Allows selling of Domain Registrations Module';
	public static $help = '';
	public static $module = 'domains';
	public static $type = 'module';


	public function __construct() {
	}

	public static function getHooks() {
		return [
			'domains.load_processing' => [__CLASS__, 'loadProcessing'],
			'domains.settings' => [__CLASS__, 'getSettings'],
		];
	}

	public static function loadProcessing(GenericEvent $event) {

	}

	public static function getSettings(GenericEvent $event) {
		$settings = $event->getSubject();
		$settings->add_dropdown_setting('domains', 'General', 'outofstock_domains', 'Out Of Stock Domains', 'Enable/Disable Sales Of This Type', $settings->get_setting('OUTOFSTOCK_DOMAINS'), array('0', '1'), array('No', 'Yes', ));
	}
}
