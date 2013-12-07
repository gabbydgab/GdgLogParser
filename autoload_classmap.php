<?php

/*  * 
 * Copyright (c) 2013, Gab Amba <gamba@gabbydgab.com>
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

namespace GdgLogProvider;

return [
    'GdgLogProvider\Module'                            =>  __DIR__ . '/Module.php',
    'GdgLogProvider\Controller\LogInterface'           =>  __DIR__ . '/src/GdgLogProvider/Controller/LogInterface.php',
    'GdgLogProvider\Controller\AbstractLogProvider'    =>  __DIR__ . '/src/GdgLogProvider/Controller/AbstractLogProvider.php',
    'GdgLogProvider\Controller\Plugin\GdgLogJournal'    =>  __DIR__ . '/src/GdgLogProvider/Controller/Plugin/GdgLogJournal.php',
    
    'GdgLogProvider\Mapper\LogInterface'    =>  __DIR__ . '/src/GdgLogProvider/Mapper/LogInterface.php',
    'GdgLogProvider\Mapper\AbstractLogMapper'    =>  __DIR__ . '/src/GdgLogProvider/Mapper/AbstractLogMapper.php',
    'GdgLogProvider\Mapper\ChangeLogTable'    =>  __DIR__ . '/src/GdgLogProvider/Mapper/ChangeLogTable.php',
    
    'GdgLogProvider\Entity\LogInterface'    =>  __DIR__ . '/src/GdgLogProvider/Entity/LogInterface.php',
    'GdgLogProvider\Entity\AbstractLogEntity'    =>  __DIR__ . '/src/GdgLogProvider/Entity/AbstractLogEntity.php',
    'GdgLogProvider\Entity\ChangeLogTable'    =>  __DIR__ . '/src/GdgLogProvider/Entity/ChangeLogTable.php',
    
];