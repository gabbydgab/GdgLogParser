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
 * GdgLogProvider\Service\AbstractLogTable
 *
 * @author Gab Amba <gamba@gabbydgab.com>
 * @package GdgLogProvider\Service
 */

namespace GdgLogProvider\Service;

use GdgLogProvider\Entity\AbstractPrototype AS AbstractLogEntity;
use GdgLogProvider\Mapper\AbstractLogTable AS AbstractLogMapper;

abstract class AbstractLogTable implements LogInterface
{
    /**
     *
     * @var GdgLogProvider\Mapper\AbstractLogTable
     */
    protected $_mapper;

    /**
     *
     * @var GdgLogProvider\Entity\AbstractPrototype
     */
    protected $_entity;


    public function setEntity(AbstractLogEntity $entity)
    {
        $this->_entity = $entity;
    }

    public function setMapper(AbstractLogMapper $mapper)
    {
        $this->_mapper = $mapper;
    }

    /**
     * 
     * @return GdgLogProvider\Entity\AbstractPrototype
     */
    public function getEntity()
    {
        return $this->_entity;
    }

    /**
     * 
     * @return GdgLogProvider\Mapper\AbstractLogTable
     */
    public function getMapper()
    {
        return $this->_mapper;
    }

    public function hasQueued()
    {
        return $this->getMapper()->hasQueued();
    }

    public function fetchByStatus($status, $limit=1)
    {
        return $this->getMapper()->fetchByStatus($status, $limit);
    }

    public function setLogId($logId)
    {
        $this->getEntity()->setLogId($logId);
    }

    /**
     * @todo For implementation
     * @param string $status
     * @return boolean
     */
    public function updateStatus($status)
    {
        $mapper = $this->getMapper();
        $mapper->setLogId($this->getEntity()->getLogId());

        if (!$mapper->setStatus($status)) {
            throw new Exception("Cannot update status: {$status}");
        }

        return true;
    }
}
