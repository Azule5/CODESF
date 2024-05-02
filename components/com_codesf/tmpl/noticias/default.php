<?php
/**
 * @version    CVS: 1.0.0
 * @package    Com_Codesf
 * @author     Eleésio <eleesiof@gmail.com>
 * @copyright  2023 Eleésio
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access
defined('_JEXEC') or die;

use \Joomla\CMS\HTML\HTMLHelper;
use \Joomla\CMS\Factory;
use \Joomla\CMS\Uri\Uri;
use \Joomla\CMS\Router\Route;
use \Joomla\CMS\Language\Text;
use \Joomla\CMS\Layout\LayoutHelper;
use \Joomla\CMS\Session\Session;
use \Joomla\CMS\User\UserFactoryInterface;

HTMLHelper::_('bootstrap.tooltip');
HTMLHelper::_('behavior.multiselect');
HTMLHelper::_('formbehavior.chosen', 'select');

$user       = Factory::getApplication()->getIdentity();
$userId     = $user->get('id');
$listOrder  = $this->state->get('list.ordering');
$listDirn   = $this->state->get('list.direction');
$canCreate  = $user->authorise('core.create', 'com_codesf') && file_exists(JPATH_COMPONENT . DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'noticiaform.xml');
$canEdit    = $user->authorise('core.edit', 'com_codesf') && file_exists(JPATH_COMPONENT .  DIRECTORY_SEPARATOR . 'forms' . DIRECTORY_SEPARATOR . 'noticiaform.xml');
$canCheckin = $user->authorise('core.manage', 'com_codesf');
$canChange  = $user->authorise('core.edit.state', 'com_codesf');
$canDelete  = $user->authorise('core.delete', 'com_codesf');

// Get articles from the "Home" category
$db = Factory::getDbo();
$query = $db->getQuery(true)
    ->select($db->quoteName('id'))
    ->from($db->quoteName('#__categories'))
    ->where($db->quoteName('alias') . ' = ' . $db->quote('home'));
$db->setQuery($query);
$categoryId = $db->loadResult();

if (!empty($categoryId)) {
    $articlesQuery = $db->getQuery(true)
        ->select($db->quoteName(array('id', 'title', 'alias', 'introtext', 'catid', 'state'))) // Adicionando 'state' à seleção
        ->from($db->quoteName('#__content'))
        ->where($db->quoteName('catid') . ' = ' . (int)$categoryId)
        ->where($db->quoteName('state') . ' = 1') // Somente artigos publicados
        ->order($db->quoteName('publish_up') . ' DESC');
    $db->setQuery($articlesQuery);
    $articles = $db->loadAssocList();
}

// Filter articles by category "home" and state = published (state = 1)
if (!empty($articles)) {
    $categoriaHome = 2; // Substitua pelo ID correto da categoria "home"
    $articles_home = array_filter($articles, function ($article) use ($categoriaHome) {
        return $article['catid'] == $categoriaHome;
    });

    // Sort articles by ID, if needed
    usort($articles_home, function ($a, $b) {
        return $a['id'] <=> $b['id'];
    });

    // Output the filtered and published articles
    foreach ($articles_home as $article) {
        echo '<section>';
        echo '<div class="row">';
        echo '<div class="col-12">';
        echo '<p>' . $article['introtext'] . '</p>';
        echo '</div>';
        echo '</div>';
        echo '</section>';
    }
} else {
    echo 'No published articles found in the "home" category.';
}
?>
