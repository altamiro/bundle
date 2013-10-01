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

class Role extends Entity 
{

  /**
   * @var string
   */
  protected $tableName ='acl_role';

  /**
   * @var int
   */
  protected $id;

  /**
   * @var int
   */
  protected $parent_id;

  /**
   * @var string
   */
  protected $role;

  /**
   * @var int
   */
  protected $active;

  /**
   * @var timestamp
   */
  protected $modified;

  /**
   * @var timestamp
   */
  protected $created;

}