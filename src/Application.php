<?php
/**
 * Joomla! Framework Sample Application
 *
 * @copyright  Copyright (C) 2014 Michael Babker. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

namespace BabDev;

use Joomla\Application\AbstractWebApplication;
use Joomla\Router\Router;

/**
 * Web application class
 *
 * @since  1.0
 */
final class Application extends AbstractWebApplication
{
	/**
	 * Method to run the application routines
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	protected function doExecute()
	{
		// Instantiate the router
		$router = (new Router($this->input))
			->setControllerPrefix('\\BabDev')
			->setDefaultController('\\Controller\\DefaultController');

		// Fetch the controller
		/* @type  \Joomla\Controller\AbstractController  $controller */
		$controller = $router->getController($this->get('uri.route'));

		// Inject the application into the controller and execute it
		$controller->setApplication($this)->execute();

		// Get the base template
		ob_start();
		include JPATH_TEMPLATES . '/index.php';
		$template = ob_get_clean();

		// Replace the component tag with the body contents, and set the result as the body
		$this->setBody(str_replace('<bodyContent />', $this->getBody(), $template));
	}
}
