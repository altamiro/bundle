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

class Resource extends Entity 
{

  /**
   * @var string
   */
  protected $tableName ='acl_resource';

  /**
   * @var int
   */
  protected $id;

  /**
   * @var string
   */
  protected $resource;

  /**
   * @var string
   */
  protected $route;

  /**
   * @var string
   */
  protected $module;

  /**
   * @var string
   */
  protected $controller;

  /**
   * @var string
   */
  protected $action;

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