<?php
/**
 * Joomla! Framework Sample Application
 *
 * @copyright  Copyright (C) 2014 Michael Babker. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

namespace BabDev\Controller;

use Joomla\Registry\Registry;

/**
 * Beer controller class for the application
 *
 * @since  1.0
 */
class BeerController extends DefaultController
{
	/**
	 * The default layout for the application
	 *
	 * @var    string
	 * @since  1.0
	 */
	protected $defaultView = 'beer';

	/**
	 * Method to initialize data to inject into the model via the state
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	protected function initializeModel()
	{
		$this->modelState = new Registry();
		$this->modelState->set('beer.number', $this->getInput()->getInt('number'));
	}
}
