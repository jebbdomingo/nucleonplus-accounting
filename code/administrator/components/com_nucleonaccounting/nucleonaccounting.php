<?php
/**
 * Nucleon Accounting
 *
 * @package     Nucleon Accounting
 * @copyright   Copyright (C) 2015 - 2020 Nucleon Plus Co. (http://www.nucleonplus.com)
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        https://github.com/jebbdomingo/nucleonplus for the canonical source repository
 */
defined('_JEXEC') or die;
if (!class_exists('Koowa')) {
    return;
}

try {
    KObjectManager::getInstance()->getObject('com://admin/nucleonaccounting.dispatcher.http')->dispatch();
} catch(Exception $exception) {
    KObjectManager::getInstance()->getObject('exception.handler')->handleException($exception);
}