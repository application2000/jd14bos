<?php
/**
 * Joomla! Framework Sample Application
 *
 * @copyright  Copyright (C) 2014 Michael Babker. All rights reserved.
 * @license    http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License Version 2 or Later
 */

namespace BabDev\CLI\Command;

use BabDev\CLI\Application;

/**
 * CLI Command to ask a user how many beers they would like
 *
 * @since  1.0
 */
class RequestBeer
{
	/**
	 * Application object
	 *
	 * @var    Application
	 * @since  1.0
	 */
	private $app;

	/**
	 * Class constructor
	 *
	 * @param   Application  $app  Application object
	 *
	 * @since   1.0
	 */
	public function __construct(Application $app)
	{
		$this->app = $app;
	}

	/**
	 * Execute the command
	 *
	 * @return  void
	 *
	 * @since   1.0
	 */
	public function execute()
	{
		// Ask the user how many beers they would like
		$this->app->out('How many beers would you like?');

		$beers = (int) $this->app->in();

		// Send a message ;-)
		if ($beers === 0)
		{
			$this->app->out('You wanted no beer, what a bummer :-(');
		}
		elseif ($beers === 1)
		{
			$this->app->out('Only one beer?  Lame!');
		}
		else
		{
			$this->app->out($beers . ' beers?  OK!');
		}
	}
}
