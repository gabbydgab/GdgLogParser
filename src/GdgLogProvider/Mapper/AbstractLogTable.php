<?php

/**
 * Copyright (c) 2014, Gab Amba <gamba@gabbydgab.com>
 * All rights reserved.
 *
 * Redistribution and use in source and binary forms, with or without
 * modification, are permitted provided that the following conditions are met:
 *
 * * Redistributions of source code must retain the above copyright notice, this
 *   list of conditions and the following disclaimer.
 * * Redistributions in binary form must reproduce the above copyright notice,
 *   this list of conditions and the following disclaimer in the documentation
 *   and/or other materials provided with the distribution.
 *
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
 * AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
 * IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE
 * ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE
 * LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR
 * CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF
 * SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS
 * INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN
 * CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE)
 * ARISING IN ANY WAY OUT OF THE USE OF THIS SOFTWARE, EVEN IF ADVISED OF THE
 * POSSIBILITY OF SUCH DAMAGE.
 */

namespace GdgLogProvider\Mapper;

use GdgCommons\DataMapper\Mapper\AbstractPrototype AS AbstractMapperPrototype;
use GdgCommons\Exception\InvalidArgumentException AS GdgCommonsInvalidArgumentException;
use GdgCommons\Exception\RuntimeException AS GdgCommonsRuntimeException;
/**
 * GdgLogProvider\Mapper\AbstractLogTable
 *
 * @author Gab Amba <gamba@gabbydgab.com>
 * @package GdgLogProvider\Mapper
 */
abstract class AbstractLogTable extends AbstractMapperPrototype implements LogTableAwareInterface
{
    CONST QUEUED = 'Queued';
    CONST PROCESSING = 'Processing';
    CONST FAILED = 'Failed';
    CONST COMPLETED = 'Completed';
    CONST INCOMPLETE = 'Incomplete';
    CONST OVERRIDEN = 'Overriden';
    CONST DELETED = 'Deleted';
    
    /**
     * @var integer
     */
    protected $_keyId;
    
    /**
     * @var string
     */
    protected $_keyName;
    
    public function setKeyId($keyId = 0)
    {
        if (empty($keyId)) {
            throw new GdgCommonsInvalidArgumentException("Invalid input: Key id is null");
        }
        
        $this->_keyId = $keyId;
    }
    
    public function getKeyId()
    {
        if (empty($this->_keyId)) {
            throw new GdgCommonsRuntimeException("Key id is not set");
        }
        
        return $this->_keyId;
    }
    
    public function setKeyName($keyName = "")
    {
        if (empty($keyName)) {
            throw new GdgCommonsInvalidArgumentException("Invalid input: Key name is empty");
        }
        
        $this->_keyName = $keyName;
    }
    
    public function getKeyName()
    {
        if (empty($this->_keyName)) {
            throw new GdgCommonsRuntimeException("Key name is not set");
        }
        
        return $this->_keyName;
    }

    public function fetchByStatus($status = "", $limit = 1)
    {
        if ($limit < 1) {
            throw new GdgCommonsInvalidArgumentException("Invalid input: limit condition is null");
        }
        
        if (empty($status)) {
            throw new GdgCommonsInvalidArgumentException("Invalid fetch input: Status is empty");
        }
        
        $query = "SELECT * FROM {$this->getDatabaseName()}.{$this->getTableName()} "
                . "WHERE status = '{$status}' "
                . "LIMIT {$limit}";
        
        return $this->fetchResult($query);
    }
    
    public function setStatus($status = "")
    {
        if (empty($status)) {
            throw new GdgCommonsInvalidArgumentException("Invalid set input: Status is empty");
        }
        
        $query = "UPDATE {$this->getDatabaseName()}.{$this->getTableName()} "
                . "SET status = '{$status}' "
                . "WHERE {$this->getKeyName()} = '{$this->getKeyId()}' "
                . "LIMIT 1";
        
        return $this->update($query);
    }
    
    public function hasQueued()
    {
        $status = self::QUEUED;
        
        $query = "SELECT * FROM {$this->getDatabaseName()}.{$this->getTableName()} "
                . "WHERE status = '{$status}' "
                . "LIMIT 1";
        
        return $this->fetchResult($query);
    }
}
