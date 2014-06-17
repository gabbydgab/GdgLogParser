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

namespace GdgLogProvider\Controller;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;
use GdgLogProvider\Service\AbstractLogTable AS AbstractLogTableService;

/**
 * GdgLogProvider\Controller\LogProviderServicePlugin
 *
 * @author Gab Amba <gamba@gabbydgab.com>
 * @package GdgLogProvider\Controller
 */
class ServicePlugin extends AbstractPlugin implements ServicePluginAwareInterface
{
    /**
     * @var \GdgLogProvider\Service\AbstractLogTable
     */
    protected $_service;

    /**
     * 
     * @param \GdgLogProvider\Service\AbstractLogTable $service
     */
    public function setLoggingService(AbstractLogTableService $service)
    {
        $this->_service = $service;
    }
    
    /**
     * {@inheritDoc}
     * 
     * @return \GdgLogProvider\Service\AbstractLogTable
     */
    public function getLoggingService()
    {
        return $this->_service;
    }
    
    /**
     * {@inheritDoc}
     * 
     * @return boolean
     */
    public function hasQueued()
    {
        return $this->getLoggingService()->hasQueued();
    }
    
    /**
     * {@inheritDoc}
     * 
     * @return \GdgLogProvider\Entity\AbstractPrototype
     */
    public function getServiceEntity()
    {
        return $this->getLoggingService()->getEntity();
    }
    
    /**
     * {@inheritDoc}
     * 
     * @return \GdgLogProvider\Mapper\AbstractLogTable
     */
    public function getServiceMapper()
    {
        return $this->getLoggingService()->getMapper();
    }
    
    /**
     * {@inheritDoc}
     * 
     * @param string $status
     * @return array data collection
     */
    public function fetchByStatus($status = "")
    {
        $this->getLoggingService()->fetchByStatus($status);
    }
}
