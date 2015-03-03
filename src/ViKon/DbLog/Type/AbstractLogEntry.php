<?php

namespace ViKon\DbLog\Type;
use ViKon\DbLog\Models\Log;

/**
 * Class AbstractLogType
 *
 * @author  Kovács Vince <vincekovacs@hotmail.com>
 *
 * @package ViKon\DbLog
 */
abstract class AbstractLogEntry {
    /** @var null|\ViKon\DbLog\Models\Log */
    protected $log = null;

    /** @var string */
    protected $name;

    /** @var array */
    protected $data = [];

    /**
     * @param string                       $name
     * @param null|\ViKon\DbLog\Models\Log $log
     */
    public function __construct($name, Log $log = null) {
        $this->name = $name;
        $this->log = $log;
    }

    public function save() {
        if ($this->log === null) {
            $this->log = new Log();
        }

        $this->log->name = $this->name;
        $this->log->data = $this->data;
        $this->log->save();
    }

}