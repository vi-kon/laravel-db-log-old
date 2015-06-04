<?php

namespace ViKon\DbLog;

use Illuminate\Database\Eloquent\Collection;
use ViKon\DbLog\Models\Log;

class DbLogger
{

    private $types = [];

    /**
     * @param string $name
     *
     * @return \ViKon\DbLog\Type\AbstractLogEntry
     *
     * @throws \ViKon\DbLog\DbLoggerException
     */
    public function log($name)
    {
        if (isset($this->types[$name])) {
            return new $this->types[$name]($name);
        }

        throw new DbLoggerException('With ' . $name . ' name log type not exists');
    }

    /**
     * @param \Illuminate\Database\Eloquent\Collection $collection
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function map(Collection $collection)
    {
        return $collection->map(function (Log $log) {
            if (isset($this->types[$log->name])) {
                return new $this->types[$log->name]($log->name, $log);
            }

            throw new DbLoggerException('With ' . $log->name . ' name log type not exists');
        });
    }

    /**
     * @param string $name
     * @param string $class
     */
    public function register($name, $class)
    {
        $this->types[$name] = $class;
    }

}