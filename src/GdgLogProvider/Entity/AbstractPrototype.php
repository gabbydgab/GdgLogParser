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

namespace GdgLogProvider\Entity;

use GdgCommons\DataMapper\Entity\AbstractPrototype AS AbstractEntityPrototype;
use GdgCommons\Exception\InvalidArgumentException AS GdgCommonsInvalidArgumentException;
use GdgCommons\Exception\RuntimeException AS GdgCommonsRuntimeException;

/**
 * GdgLogProvider\Entity\AbstractPrototype
 *
 * @author Gab Amba <gamba@gabbydgab.com>
 */
class AbstractPrototype extends AbstractEntityPrototype implements AwareInterface
{
    /**
     * @var string
     */
    protected $_status;

    /**
     * {@inheritDoc}
     *
     * @param string $status
     * @throws GdgCommonsInvalidArgumentException
     */
    public function setStatus($status = "")
    {
        if (empty($status)) {
            throw new GdgCommonsInvalidArgumentException("Status should not be null");
        }

        $this->_status = $status;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     * @throws GdgCommonsRuntimeException
     */
    public function getStatus()
    {
        if (empty($this->_status)) {
            throw new GdgCommonsRuntimeException("Status is null");
        }

        return $this->_status;
    }

    public function getCollection()
    {
        //DO SOMETHING HERE;
    }
}
