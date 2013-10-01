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

class User extends Entity 
{

  /**
   * @var string
   */
  protected $tableName ='user';

  /**
   * @var int
   */
  protected $id;

  /**
   * @var int
   */
  protected $role_id;

  /**
   * @var string
   */
  protected $name;

  /**
   * @var string
   */
  protected $login;

  /**
   * @var string
   */
  protected $password;

  /**
   * @var string
   */
  protected $mail;

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