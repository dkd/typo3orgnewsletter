<?php
/**
 * Created by JetBrains PhpStorm.
 * User: dkd-kartolo
 * Date: 8/22/13
 * Time: 4:21 PM
 * To change this template use File | Settings | File Templates.
 */

if (!defined ("TYPO3_MODE")) 	die ("Access denied.");

$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output'][] = 'EXT:typo3org_newsletter/Classes/Hooks/class.tx_typo3orgnewsletter.php:&tx_typo3orgnewsletter->parseFE';

?>