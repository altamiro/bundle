<?php
/**
 * Package set for Zend Framework 2
 * 
 * @link https://github.com/altamiro/bundle for the canonical source repository
 * @copyright Copyright (c) 2013 Altamiro Rodrigues. Brazil
 * @license https://github.com/altamiro/bundle/blob/master/LICENSE BSDLicense
 * @authors Altamiro Rodrigues <altamiro27@gmail.com>
 */

namespace Bundle\Acl;

use Bundle\Service\Service;

class Permission extends Service {

  /**
   * id of the log line "guest" table acl_role.
   */
  const ROLE_GUEST_ID = 1;

  /**
   * constant return
   */
  const SUCESS        = 1;
  const NOT_ROLE      = 2;
  const NOT_RESOURCE  = 3;
  const NOT_ACCESS    = 4;

  /**
   * check if the data is allowed or not
   * @param string $moduleName
   * @param string $controllerName
   * @param string $actionName
   * @param ControllerPluginManager $controllerPlugin
   * @return const
   */
  public function check( $moduleName, $controllerName, $actionName , $controllerPlugin ) {

    $auth = $this->getService( 'Zend\Authentication\AuthenticationService' );
    $role_id = self::ROLE_PUBLIC_ID;

    if ( $auth->hasIdentity() ) 
    {
      $user = $auth->getIdentity();
      //$role_id = $user->getPapel()->getId();
    } // end iF;

    if ( !$auth->hasIdentity() && !preg_match( '/Auth/i' , $controllerName ) )
    {
      $controllerPlugin->toRoute( 'auth' );
    } // end iF;

    $resource = $controllerName . '.' . $actionName;

    $acl = $this->getService( 'Bundle\Acl\Builder' )->build();

    if ( ! $acl->hasRole( $role_id ) ) {
      $return = self::NOT_ROLE;
    }
    else if ( ! $acl->hasResource( $resource ) ) {
      $return = self::NOT_RESOURCE;
    }
    else if ( !$acl->isAllowed( $role_id , $resource ) ) {
      $return = self::NOT_ACCESS;
    }
    else if ( $acl->isAllowed( $role_id , $resource ) ) { /* checks if the User has permission to access the current resource */
      $return = self::SUCCESS;
    }

    return $return;

  } // end method check

} // end class Permission