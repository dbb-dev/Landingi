<?php
$output = '';
$pageId = $modx->getOption('pageId', $scriptProperties, '');

if (!empty($pageId)) {
    $landingi = $modx->getService('landingi', 'landingi', $modx->getOption('landingi.core_path', null, $modx->getOption('core_path') . 'components/landingi/') . 'model/landingi/');

    $page = new Landingi\LandingExportPhp($pageId);

    if (isset($_REQUEST['hash'])) {
        $landingHash = $_REQUEST['hash'];
    }

    $output = $page->getLanding($landingHash);
}

return $output;