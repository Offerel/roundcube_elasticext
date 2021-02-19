<?php
/**
 * Roundcube Elastic Ext Plugin
 *
 * @version 0.0.2
 * @author Offerel
 * @copyright Copyright (c) 2021, Offerel
 * @license GNU General Public License, version 3
 */
$files = array();
$backgroundsDir = dirname(__FILE__).'/backgrounds/';
if($handle = @opendir($backgroundsDir)) {
	while($file = readdir($handle)) {
		if($file != '.' AND $file != '..' AND mime_content_type($backgroundsDir.$file) == 'image/jpeg') {
			$files[] = $file;
		}
	}
}

$bg_file = $backgroundsDir.$files[array_rand($files)];

if (file_exists($bg_file)) {
	$cacheContent = file_get_contents($bg_file);
	header('Content-Disposition: inline;filename='.basename($bg_file));
	header('Content-type: image/jpeg');
	echo ($cacheContent);
	exit;
}
?>