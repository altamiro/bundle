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

class Session extends Entity 
{

  /**
   * @var string
   */
  protected $tableName ='session';

  /**
   * @var int
   */
  protected $id;

  /**
   * @var int
   */
  protected $user_id;

  /**
   * @var string
   */
  protected $ip_user;

  /**
   * @var string
   */
  protected $browser;

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