<?php

namespace ViKon\DbLog\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * \ViKon\DbLog\Model\Log
 *
 * @property integer        $id
 * @property string         $message
 * @property mixed[]        $context
 * @property int            $level
 * @property string         $channel
 * @property \Carbon\Carbon $created_at
 * @property mixed[]        $extra
 *
 * @method static \Illuminate\Database\Query\Builder|\ViKon\DbLog\Model\Log whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\ViKon\DbLog\Model\Log whereMessage($value)
 * @method static \Illuminate\Database\Query\Builder|\ViKon\DbLog\Model\Log whereContext($value)
 * @method static \Illuminate\Database\Query\Builder|\ViKon\DbLog\Model\Log whereLevel($value)
 * @method static \Illuminate\Database\Query\Builder|\ViKon\DbLog\Model\Log whereChannel($value)
 * @method static \Illuminate\Database\Query\Builder|\ViKon\DbLog\Model\Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\ViKon\DbLog\Model\Log whereExtra($value)
 */
class Log extends Model
{

    /**
     * {@inheritDoc}
     */
    public function __construct(array $attributes = [])
    {
        $this->table      = config('vi-kon.db-log.table');
        $this->timestamps = false;

        parent::__construct($attributes);
    }

    /**
     * @param string $context
     *
     * @return mixed[]
     */
    public function getContextAttribute($context)
    {
        return unserialize($context);
    }

    /**
     * @param mixed[] $context
     */
    public function setContextAttribute(array $context)
    {
        $this->attributes['context'] = serialize($context);
    }

    /**
     * @param string $extra
     *
     * @return mixed[]
     */
    public function getExtraAttribute($extra)
    {
        return unserialize($extra);
    }

    /**
     * @param mixed[] $extra
     */
    public function setExtraAttribute(array $extra)
    {
        $this->attributes['context'] = serialize($extra);
    }
}