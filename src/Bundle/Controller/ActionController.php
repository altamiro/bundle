<?php
/**
 * Package set for Zend Framework 2
 * 
 * @link https://github.com/altamiro/bundle for the canonical source repository
 * @copyright Copyright (c) 2013 Altamiro Rodrigues. Brazil
 * @license https://github.com/altamiro/bundle/blob/master/LICENSE BSDLicense
 * @authors Altamiro Rodrigues <altamiro27@gmail.com>
 */

namespace Bundle\Controller;

use Zend\Mvc\Controller\AbstractActionController, 
    Zend\View\Model\ViewModel, 
    Zend\ServiceManager\Exception\ServiceNotFoundException, 
    Bundle\Db\TableGateway;

class ActionController extends AbstractActionController
{
  /**
     * Returns a TableGateway
     *
     * @param  string $table
     * @return TableGateway
     */
  protected function getTable($table)
    {
        $sm = $this->getServiceLocator();
        $dbAdapter = $sm->get('DbAdapter');
        $tableGateway = new TableGateway($dbAdapter, $table, new $table);
        $tableGateway->initialize();

        return $tableGateway;
    }

    /**
     * Returns a Service
     *
     * @param  string $service
     * @return Service
     */
    protected function getService($service)
    {
        return $this->getServiceLocator()->get($service);
    }
}