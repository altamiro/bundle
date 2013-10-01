<?php
/**
 * Package set for Zend Framework 2
 * 
 * @link https://github.com/altamiro/bundle for the canonical source repository
 * @copyright Copyright (c) 2013 Altamiro Rodrigues. Brazil
 * @license https://github.com/altamiro/bundle/blob/master/LICENSE BSDLicense
 * @authors Altamiro Rodrigues <altamiro27@gmail.com>
*/

namespace Bundle;

use Zend\Mvc\MvcEvent;

class Module
{

    public function onBootstrap($e)
    {
        $e->getApplication()->getEventManager()->getSharedManager()->attach('Zend\Mvc\Controller\AbstractActionController', 'dispatch', function($e) {
            $controller      = $e->getTarget();
            $controllerClass = get_class($controller);
            $moduleNamespace = substr($controllerClass, 0, strpos($controllerClass, '\\'));
            $config          = $e->getApplication()->getServiceManager()->get('config');
            if (isset($config['module_layout'][$moduleNamespace])) {
                $controller->layout($config['module_layout'][$moduleNamespace]);
            }
        }, 100);

        $e->getApplication()->getEventManager()->getSharedManager()->attach( 'Zend\Mvc\Controller\AbstractActionController' ,
                                                                             MvcEvent::EVENT_DISPATCH ,
                                                                             array( $this , 'mvcPreDispatch' ) ,
                                                                             110 );

    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'DbAdapter' => 'Bundle\Db\AdapterServiceFactory'
            )
        );
    }

    public function mvcPreDispatch($event)
    {
        echo '<pre>'.__FILE__.': '.__LINE__.'<hr>';print_r($event);echo'<hr></pre>';exit;
    }
}