/**
 * Roundcube Elastic Ext Plugin
 *
 * @version 0.0.6
 * @author Offerel
 * @copyright Copyright (c) 2024, Offerel
 * @license GNU General Public License, version 3
 */
window.onload = function() {
	window.rcmail;
	if(document.getElementById('02b95bc8-faf2-4aaa-b095-3304aac59bef')) {
		let sbutton = document.getElementById('02b95bc8-faf2-4aaa-b095-3304aac59bef');
		let alignment = (rcmail.env.aligndir == 1) ? 'left':'right';
		sbutton.parentElement.style = alignment + ': 10px; position: absolute;';

		document.querySelector('button.send').classList.add('exsend');

		let tbarheight = window.innerHeight - document.getElementById('toolbar-menu').offsetHeight - 100;
		let header = document.getElementById('compose-headers');
		new ResizeObserver(() => document.getElementById('composebodycontainer').style.height = (tbarheight - header.offsetHeight) + 'px').observe(header);
	} else {
		document.querySelector('button.send').classList.add('fright');
		document.querySelector('div.float-right').classList.add('float-left');
		document.querySelector('div.float-right').classList.remove('float-right');
	}

	if(rcmail.env.exlogin) {
		let bghtml = document.querySelector('html');
		let bgbody = document.querySelector('body.task-login') ? document.querySelector('body.task-login'):false;
		let bgct = document.getElementById('layout-content');
		let exlogo = document.getElementById('logo');
		let lform = document.getElementById('login-form');
		let lfooter = document.getElementById('login-footer');

		if(bgbody) {
			bghtml.classList.add('bgextended');
			bgbody.classList.add('bgtrex');
			bgct.classList.add('bgtrex');
			exlogo.classList.add('exlogo');
			lform.classList.add('exlogin-form');
			lfooter.classList.add('exlogin-footer');
		}
	}
}