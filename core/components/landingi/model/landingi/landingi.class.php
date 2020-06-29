<?php

require_once dirname(dirname(__DIR__)) . '/vendor/autoload.php';

class Landingi
{

    /**
     * @var modX
     */
    public $modx;

    /**
     * @var array
     */
    public $config = array();

    /**
     * Landingi constructor.
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX $modx, array $config = array())
    {
        $this->modx = $modx;

        $corePath = $this->modx->getOption('landingi.core_path', $config, MODX_CORE_PATH . 'components/landingi/');
        $assetsPath = $this->modx->getOption('landingi.assets_path', null, MODX_ASSETS_PATH . 'components/landingi/');
        $assetsUrl = $this->modx->getOption('landingi.assets_url', $config, MODX_ASSETS_URL . 'components/landingi/');

        $this->config = array_merge(array(
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'chunksPath' => $corePath . 'elements/chunks/',
            'snippetsPath' => $corePath . 'elements/snippets/',
            'controllersPath' => $corePath . 'controllers/',
            'processorsPath' => $corePath . 'processors/',
            'templatesPath' => $corePath . 'templates/',

            'assetsPath' => $assetsPath,
            'assetsUrl' => $assetsUrl,

            'jsUrl' => $assetsUrl . 'js/',
            'cssUrl' => $assetsUrl . 'css/',

            'connectorUrl' => $assetsUrl . 'connector.php',
        ), $config);

        $this->modx->addPackage('landingi', $this->config['modelPath']);
    }

}