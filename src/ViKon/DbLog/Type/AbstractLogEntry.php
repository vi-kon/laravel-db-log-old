<?php

namespace ViKon\DbLog\Type;

use Carbon\Carbon;
use ViKon\DbLog\Models\Log;

/**
 * Class AbstractLogType
 *
 * @author  Kovács Vince <vincekovacs@hotmail.com>
 *
 * @package ViKon\DbLog
 */
abstract class AbstractLogEntry
{
    /** @var string */
    protected $name;
    /** @var array */
    protected $data = [];
    /** @var null|\ViKon\DbLog\Models\Log */
    private $log = null;

    /**
     * @param string                       $name
     * @param null|\ViKon\DbLog\Models\Log $log
     */
    public function __construct($name, Log $log = null)
    {
        $this->name = $name;
        if ($this->log !== null) {
            $this->log  = $log;
            $this->data = $this->log->data;
        }
    }

    /**
     * @return null|\ViKon\Auth\Models\User
     */
    public function createdByUser()
    {
        if ($this->log) {
            return $this->log->createdByUser;
        }

        return null;
    }

    /**
     * @return \Carbon\Carbon|null
     */
    public function createdAt()
    {
        if ($this->log) {
            return $this->log->created_at;
        }

        return null;
    }

    public function save()
    {
        if ($this->log === null) {
            $this->log             = new Log();
            $this->log->created_at = new Carbon();
            if (\Auth::check()) {
                $this->log->created_by_user_id = \Auth::user()->id;
            }
        }

        $this->log->name = $this->name;
        $this->log->data = $this->data;
        $this->log->save();
    }

}