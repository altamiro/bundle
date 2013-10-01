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

use Zend\Db\Adapter\Adapter, 
    Zend\Db\ResultSet\ResultSet, 
    Zend\Db\TableGateway\AbstractTableGateway, 
    Zend\Db\Sql\Select, 
    Bundle\Exception\Entity as EntityException;

class TableGateway extends AbstractTableGateway
{
    /**
     * Primary Key field name
     *
     * @var string
     */
    protected $primaryKeyField;

    /**
     * ObjectPrototype
     * @var stdClass
     */
    protected $objectPrototype;

    public function __construct(Adapter $adapter, $table, $objectPrototype)
    {
        $this->adapter = $adapter;
        $this->table = $objectPrototype->getTableName();
        $this->objectPrototype = $objectPrototype;
        $this->resultSetPrototype = new ResultSet();
        $this->resultSetPrototype->setArrayObjectPrototype($objectPrototype);
    }


    public function initialize()
    {
        parent::initialize();

        $this->primaryKeyField = $this->objectPrototype->primaryKeyField;
        if ( ! is_string($this->primaryKeyField)) {
            $this->primaryKeyField = 'id';
        }
    }   
    
    public function fetchAll($columns = null, $where = null, $limit = null, $offset = null)
    {
        $select = new Select();
        $select->from($this->getTable());

        if ($columns)
            $select->columns($columns);

        if ($where)
            $select->where($where);

        if ($limit)
            $select->limit((int) $limit);

        if ($offset)
            $select->offset((int) $offset);

        return $this->selectWith($select);
    }

    public function get($id)
    {
        $id  = (int) $id;
        $rowset = $this->select(array($this->primaryKeyField => $id));
        $row = $rowset->current();
        if (!$row) {
            throw new EntityException("Could not find row $id");
        }
        return $row;
    }

    public function save($object)
    {
        $data = $object->getData();
        $id = (int) isset($data[$this->primaryKeyField]) ? $data[$this->primaryKeyField] : 0;
        if ($id == 0) {
            if ($this->insert($data) < 1)
                throw new EntityException("Insert error", 1);

            $object->id = $this->lastInsertValue;
        } else {
            if (! $this->get($id)) 
                throw new EntityException('Id does not exist');
            if ($this->update($data, array($this->primaryKeyField => $id)) < 1)
                throw new EntityException("Update error", 1);
        }
        return $object;
    }

    public function delete($id)
    {
        return parent::delete(array($this->primaryKeyField => $id));
    }
}