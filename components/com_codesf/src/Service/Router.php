<?php

/**
 * @version    CVS: 1.0.0
 * @package    Com_Codesf
 * @author     Eleésio <eleesiof@gmail.com>
 * @copyright  2023 Eleésio
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Language\Component\Codesf\Site\Service;

// No direct access
defined('_JEXEC') or die;

use Joomla\CMS\Component\Router\RouterViewConfiguration;
use Joomla\CMS\Component\Router\RouterView;
use Joomla\CMS\Component\Router\Rules\StandardRules;
use Joomla\CMS\Component\Router\Rules\NomenuRules;
use Joomla\CMS\Component\Router\Rules\MenuRules;
use Joomla\CMS\Factory;
use Joomla\CMS\Categories\Categories;
use Joomla\CMS\Application\SiteApplication;
use Joomla\CMS\Categories\CategoryFactoryInterface;
use Joomla\CMS\Categories\CategoryInterface;
use Joomla\Database\DatabaseInterface;
use Joomla\CMS\Menu\AbstractMenu;
use Joomla\CMS\Component\ComponentHelper;

/**
 * Class CodesfRouter
 *
 */
class Router extends RouterView
{
	private $noIDs;
	/**
	 * The category factory
	 *
	 * @var    CategoryFactoryInterface
	 *
	 * @since  1.0.0
	 */
	private $categoryFactory;

	/**
	 * The category cache
	 *
	 * @var    array
	 *
	 * @since  1.0.0
	 */
	private $categoryCache = [];

	public function __construct(SiteApplication $app, AbstractMenu $menu, CategoryFactoryInterface $categoryFactory, DatabaseInterface $db)
	{
		$params = ComponentHelper::getParams('com_codesf');
		$this->noIDs = (bool) $params->get('sef_ids');
		$this->categoryFactory = $categoryFactory;
		
		
			$noticias = new RouterViewConfiguration('noticias');
			$this->registerView($noticias);
			$ccNoticia = new RouterViewConfiguration('noticia');
			$ccNoticia->setKey('id')->setParent($noticias);
			$this->registerView($ccNoticia);
			$noticiaform = new RouterViewConfiguration('noticiaform');
			$noticiaform->setKey('id');
			$this->registerView($noticiaform);

		parent::__construct($app, $menu);

		$this->attachRule(new MenuRules($this));
		$this->attachRule(new StandardRules($this));
		$this->attachRule(new NomenuRules($this));
	}


	
		/**
		 * Method to get the segment(s) for an noticia
		 *
		 * @param   string  $id     ID of the noticia to retrieve the segments for
		 * @param   array   $query  The request that is built right now
		 *
		 * @return  array|string  The segments of this item
		 */
		public function getNoticiaSegment($id, $query)
		{
			if (!strpos($id, ':'))
			{
				$db = Factory::getContainer()->get('DatabaseDriver');
				$dbquery = $db->getQuery(true);
				$dbquery->select($dbquery->qn('alias'))
					->from($dbquery->qn('#__caadm_noticias'))
					->where('id = ' . $dbquery->q($id));
				$db->setQuery($dbquery);

				$id .= ':' . $db->loadResult();
			}

			if ($this->noIDs)
			{
				list($void, $segment) = explode(':', $id, 2);

				return array($void => $segment);
			}
			return array((int) $id => $id);
		}
			/**
			 * Method to get the segment(s) for an noticiaform
			 *
			 * @param   string  $id     ID of the noticiaform to retrieve the segments for
			 * @param   array   $query  The request that is built right now
			 *
			 * @return  array|string  The segments of this item
			 */
			public function getNoticiaformSegment($id, $query)
			{
				return $this->getNoticiaSegment($id, $query);
			}

	
		/**
		 * Method to get the segment(s) for an noticia
		 *
		 * @param   string  $segment  Segment of the noticia to retrieve the ID for
		 * @param   array   $query    The request that is parsed right now
		 *
		 * @return  mixed   The id of this item or false
		 */
		public function getNoticiaId($segment, $query)
		{
			if ($this->noIDs)
			{
				$db = Factory::getContainer()->get('DatabaseDriver');
				$dbquery = $db->getQuery(true);
				$dbquery->select($dbquery->qn('id'))
					->from($dbquery->qn('#__caadm_noticias'))
					->where('alias = ' . $dbquery->q($segment));
				$db->setQuery($dbquery);

				return (int) $db->loadResult();
			}
			return (int) $segment;
		}
			/**
			 * Method to get the segment(s) for an noticiaform
			 *
			 * @param   string  $segment  Segment of the noticiaform to retrieve the ID for
			 * @param   array   $query    The request that is parsed right now
			 *
			 * @return  mixed   The id of this item or false
			 */
			public function getNoticiaformId($segment, $query)
			{
				return $this->getNoticiaId($segment, $query);
			}

	/**
	 * Method to get categories from cache
	 *
	 * @param   array  $options   The options for retrieving categories
	 *
	 * @return  CategoryInterface  The object containing categories
	 *
	 * @since   1.0.0
	 */
	private function getCategories(array $options = []): CategoryInterface
	{
		$key = serialize($options);

		if (!isset($this->categoryCache[$key]))
		{
			$this->categoryCache[$key] = $this->categoryFactory->createCategory($options);
		}

		return $this->categoryCache[$key];
	}
}