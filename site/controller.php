<?php
/**
 * @package     Joomla.Siak.Nilai
 * @subpackage  com_siakmodnilai
 *
 * @copyright   (C) 2022 @ Risam, S.T
 * @license     Limited for FT-UNTAG Cirebon use Only
 */

 
defined('_JEXEC') or die();

use Joomla\CMS\Component\ComponentHelper;
use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Router\Route;
use Joomla\CMS\Uri\Uri;

/**
 * Siakmodnilai Controller
 *
 * Since 0.0.1
 */
class Siakmodnilai extends BaseController
{
    public function display($cachable = false, $urlparams = false)
    {
        $app = Factory::getApplication();
        // validated user only
        $user = Factory::getUser();
        if ($user->get('guest') == 1) {
            $url = Uri::getInstance();
            $uri = base64_encode($url);
            $login_page = Route::_('index.php?option=com_users&view=login&return='.$uri, false);
            $this->setRedirect($login_page, JText::_('JERROR_ALERTNOAUTHOR'), 'error');

            return 0;
        }

        $doc = Factory::getDocument();
        $vName = $app->input->getCmd('view', 'scores');
        $vFormat = $doc->getType();
        $lName = $this->input->getCmd('layout', 'default');

        if ($view = $this->getView($vName, $vFormat)) {
            $model = $this->getModel($vName);
        }

        $view->setModel($model, true);
        $view->setLayout($lName);
        $view->document = $doc;
        $view->display();    
    }
}