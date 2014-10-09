<?php
/**
 * ownCloud - helloworld
 *
 * This file is licensed under the Affero General Public License version 3 or
 * later. See the COPYING file.
 *
 * @author hoge <hoge@example.com>
 * @copyright hoge 2014
 */

namespace OCA\HelloWorld\AppInfo;


use \OCP\AppFramework\App;
use \OCP\IContainer;

use \OCA\HelloWorld\Controller\PageController;


class Application extends App {


	public function __construct (array $urlParams=array()) {
		parent::__construct('helloworld', $urlParams);

		$container = $this->getContainer();

		/**
		 * Controllers
		 */
		$container->registerService('PageController', function(IContainer $c) {
			return new PageController(
				$c->query('AppName'), 
				$c->query('Request'),
				$c->query('UserId')
			);
		});


		/**
		 * Core
		 */
		$container->registerService('UserId', function(IContainer $c) {
			return \OCP\User::getUser();
		});		
		
	}


}