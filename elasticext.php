<?PHP
/**
 * Roundcube Elastic Ext Plugin
 *
 * @version 0.0.2
 * @author Offerel
 * @copyright Copyright (c) 2021, Offerel
 * @license GNU General Public License, version 3
 */
class elasticsend extends rcube_plugin {
	public function init() {
		$this->include_stylesheet('css/plugin.min.css');
		$this->include_script('js/plugin.min.js');

		$this->rcube = rcube::get_instance();
		$this->load_config();
		$alignment = $this->rcube->config->get('button_alignment');
		$exlogin = $this->rcube->config->get('exlogin');
		$skin = $this->rcube->config->get('skin');

		if($alignment != false) {
			if($this->rcube->action == 'compose' && $skin == 'elastic') {
				$this->rcube->output->set_env('aligndir', $alignment);
				$this->add_button(array(
					'label'		=> 'send',
					'command'	=> 'send',
					'id'		=> '02b95bc8-faf2-4aaa-b095-3304aac59bef',
					'class'		=> 'send',
					'classsel'	=> 'send selected',
					'innerclass'=> 'inner',
					'type'		=> 'link'
				), 'toolbar');
			}
		}

		if($exlogin) {
			$this->rcube->output->set_env('exlogin', $exlogin);
		}
	}
}
?>
