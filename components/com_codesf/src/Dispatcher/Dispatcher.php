<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Codesf
 * @author     Eleésio <eleesiof@gmail.com>
 * @copyright  2023 Eleésio
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Language\Component\Codesf\Site\Dispatcher;

defined('JPATH_PLATFORM') or die;

use Joomla\CMS\Dispatcher\ComponentDispatcher;
use Joomla\CMS\Language\Text;

/**
 * ComponentDispatcher class for Com_Codesf
 *
 * @since  1.0.0
 */
class Dispatcher extends ComponentDispatcher
{
	/**
	 * Dispatch a controller task. Redirecting the user if appropriate.
	 *
	 * @return  void
	 *
	 * @since   1.0.0
	 */
	public function dispatch()
	{
		parent::dispatch();
	}
}
