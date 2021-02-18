<?PHP
/**
 * Roundcube Send Plugin
 *
 * @version 0.0.1
 * @author Offerel
 * @copyright Copyright (c) 2021, Offerel
 * @license GNU General Public License, version 3
 */
class elasticsend extends rcube_plugin {
	public $task = 'mail';
	public function init() {
		$this->rcube = rcube::get_instance();
		if ($this->rcube->action == 'compose') {
			$this->include_stylesheet('plugin.css');
			$this->add_button(array(
				'label'		=> 'send',
				'command'	=> 'send',
				'id'		=> '301ec534-0cce-4b38-8016-4bcbb405e4b0',
				'class'		=> 'send',
				'classsel'	=> 'send selected',
				'innerclass'=> 'inner',
				'type'		=> 'link'
			), 'toolbar');
		}
	}
}
?>
