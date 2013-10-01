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

class Menu extends Entity 
{

  /**
   * @var string
   */
  protected $tableName ='acl_menu';

  /**
   * @var int
   */
  protected $id;

  /**
   * @var int
   */
  protected $parent_id;

  /**
   * @var int
   */
  protected $resource_id;

  /**
   * @var string
   */
  protected $menu;

  /**
   * @var int
   */
  protected $position;

  /**
   * @var string
   */
  protected $submenu;

  /**
   * @var string
   */
  protected $icon;

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