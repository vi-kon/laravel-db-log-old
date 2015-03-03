<?php
namespace ViKon\DbLog\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class DbLoggerFacade
 *
 * @author  Kovács Vince <vincekovacs@hotmail.com>
 *
 * @package ViKon\DbLog\Facades
 */
class DbLoggerFacade extends Facade {
    /**
     * @return string
     */
    protected static function getFacadeAccessor() {
        return 'log.db';
    }
}