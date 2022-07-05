<?php
/**
 * @package     Joomla.Siak.Nilai
 * @subpackage  com_siakmodnilai
 *
 * @copyright   (C) 2022 @ Risam, S.T
 * @license     Limited for FT-UNTAG Cirebon use Only
 */

  defined('_JEXEC') or die('Direct Access denied!');

  use Joomla\CMS\Factory;
  use Joomla\CMS\MVC\Controller\BaseController;

  $controller = BaseController::getInstance('Siakmodnilai');
  $task = Factory::getApplication()->input->getCmd('task', 'display');
  $controller->execute($task);
  $controller->redirect();