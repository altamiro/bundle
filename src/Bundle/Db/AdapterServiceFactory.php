<?php
/**
 * Package set for Zend Framework 2
 * 
 * @link https://github.com/altamiro/bundle for the canonical source repository
 * @copyright Copyright (c) 2013 Altamiro Rodrigues. Brazil
 * @license https://github.com/altamiro/bundle/blob/master/LICENSE BSDLicense
 * @authors Altamiro Rodrigues <altamiro27@gmail.com>
 */

namespace Bundle\Db;

use Zend\ServiceManager\FactoryInterface, 
    Zend\ServiceManager\ServiceLocatorInterface, 
    Zend\Db\Adapter\Adapter;
/**
 * Factory to build a DbAdapter
 */
class AdapterServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Configuration');
        $mvcEvent = $serviceLocator->get('Application')->getMvcEvent();
        if ($mvcEvent) {
            $routeMatch = $mvcEvent->getRouteMatch();
            $moduleName = $routeMatch->getParam('module');
            //if the module have a db configuration use it
            $moduleConfig = include getenv('PROJECT_ROOT') . '/module/' . ucfirst($moduleName) . '/config/module.config.php';
            if (isset($moduleConfig['db'])) 
                $config['db'] = $moduleConfig['db'];
        }
        return new Adapter($config['db']);
    }
}