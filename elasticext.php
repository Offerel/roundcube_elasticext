<?PHP
/**
 * Roundcube Elastic Ext Plugin
 *
 * @version 0.0.4
 * @author Offerel
 * @copyright Copyright (c) 2021, Offerel
 * @license GNU General Public License, version 3
 */
class elasticext extends rcube_plugin {
	public function init() {
		$this->include_stylesheet('css/plugin.css');
		$this->include_script('js/plugin.js');

		$this->rcube = rcube::get_instance();
		$this->load_config();
		$alignment = $this->rcube->config->get('button_alignment');
		$exlogin = $this->rcube->config->get('exlogin');
		$skin = $this->rcube->config->get('skin');

		if($alignment != 0) {
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

		$this->add_hook('preferences_list', array($this, 'prefs_list'));
		$this->add_hook('preferences_save', array($this, 'prefs_save'));
	}

	function prefs_list($args) {
		if($args['section'] == 'compose') {
			$rcmail = rcmail::get_instance();
			$field_id = 'rceext';

			$eext_compose = new html_select(array('name' => $field_id.'_compose', 'id' => $field_id.'_compose'));
			$eext_compose->add('Right', 2);
			$eext_compose->add('Left', 1);
			$eext_compose->add('Disabled', 0);
			$args['blocks']['main']['options']['eext_compose'] = array(
				'title' => html::label($field_id, rcube::Q('Elastic Ext Compose')),
				'content' => $eext_compose->show($rcmail->config->get('button_alignment'))
			);
		}
		return $args;
	}

	function prefs_save($args) {
		if($args['section'] == 'compose') {
			$args['prefs']['button_alignment'] = intval(rcube_utils::get_input_value('rceext_compose', rcube_utils::INPUT_POST));
			return $args;
		}
	}
}
?>
