<?php
/**
 * Package set for Zend Framework 2
 * 
 * @link https://github.com/altamiro/bundle for the canonical source repository
 * @copyright Copyright (c) 2013 Altamiro Rodrigues. Brazil
 * @license https://github.com/altamiro/bundle/blob/master/LICENSE BSDLicense
 * @authors Altamiro Rodrigues <altamiro27@gmail.com>
 */

namespace Bundle\Model\Acl;

use Bundle\Model\Entity;

class Privilege extends Entity 
{

  /**
   * @var string
   */
  protected $tableName ='acl_privilege';

  /**
   * @var int
   */
  protected $id;

  /**
   * @var int
   */
  protected $role_id;

  /**
   * @var int
   */
  protected $resource_id;

  /**
   * @var string
   */
  protected $resource;

  /**
   * @var string
   */
  protected $privilege;

  /**
   * @var timestamp
   */
  protected $modified;

  /**
   * @var timestamp
   */
  protected $created;

}