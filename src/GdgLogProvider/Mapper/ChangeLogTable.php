<?php

/** 
 * Copyright (c) 2013 - 2014, Gab Amba <gamba@gabbydgab.com>
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

/**
 * GdgLogProvider\Mapper\ChangeLogTable
 *
 * @author Gab Amba <gamba@gabbydgab.com>
 */

namespace GdgLogProvider\Mapper;

use Zend\Db\Adapter\Driver\ResultInterface;
use Zend\Db\ResultSet\ResultSet;

class ChangeLogTable extends AbstractLogMapper
{
    CONST QUEUED = 'Queued';
    CONST PROCESSING = 'Processing';
    CONST FAILED = 'Failed';
    CONST COMPLETED = 'Completed';
    CONST INCOMPLETE = 'Incomplete';
    CONST OVERRIDEN = 'Overriden';
    CONST DELETED = 'Deleted';
    
    public function fetchByStatus($status, $limit=1)
    {
        $query = "SELECT * FROM {$this->getLogTable()} "
                . "WHERE status = '{$status}' "
                . "LIMIT {$limit}";
                
        $statement = $this->getDbAdapter()->createStatement($query);
        $result = $statement->execute();
        
        if ($result->getAffectedRows() <= 0) {
            return [];
        }
        
        if ($result instanceof ResultInterface && $result->isQueryResult()) {
            $resultSet = new ResultSet;
            $resultSet->initialize($result);
            
            return $resultSet->toArray();
        }
    }
    
    public function hasQueued()
    {
        $status = self::QUEUED;
        
        $query = "SELECT * FROM {$this->getLogTable()} "
                . "WHERE status = '{$status}' "
                . "LIMIT 1";
                
        $statement = $this->getDbAdapter()->createStatement($query);
        $row = $statement->execute();

        if ($row->getAffectedRows() <= 0) {
            return false;
        }
        
        return true;
    }    
    
    public function setStatus($status)
    {
        $query = "UPDATE {$this->getLogTable()} "
                . "SET status = '{$status}' "
                . "WHERE log_id = {$this->getLogId()} "
                . "LIMIT 1";
                
        $statement = $this->getDbAdapter()->createStatement($query);
        return  $statement->execute();
    }
}
