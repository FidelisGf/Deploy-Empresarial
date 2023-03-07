<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/memcache/v1/cloud_memcache.proto

namespace Google\Cloud\Memcache\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Upcoming maintenance schedule.
 *
 * Generated from protobuf message <code>google.cloud.memcache.v1.MaintenanceSchedule</code>
 */
class MaintenanceSchedule extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The start time of any upcoming scheduled maintenance for this instance.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp start_time = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $start_time = null;
    /**
     * Output only. The end time of any upcoming scheduled maintenance for this instance.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $end_time = null;
    /**
     * Output only. The deadline that the maintenance schedule start time can not go beyond,
     * including reschedule.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp schedule_deadline_time = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $schedule_deadline_time = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Protobuf\Timestamp $start_time
     *           Output only. The start time of any upcoming scheduled maintenance for this instance.
     *     @type \Google\Protobuf\Timestamp $end_time
     *           Output only. The end time of any upcoming scheduled maintenance for this instance.
     *     @type \Google\Protobuf\Timestamp $schedule_deadline_time
     *           Output only. The deadline that the maintenance schedule start time can not go beyond,
     *           including reschedule.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Memcache\V1\CloudMemcache::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The start time of any upcoming scheduled maintenance for this instance.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp start_time = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getStartTime()
    {
        return $this->start_time;
    }

    public function hasStartTime()
    {
        return isset($this->start_time);
    }

    public function clearStartTime()
    {
        unset($this->start_time);
    }

    /**
     * Output only. The start time of any upcoming scheduled maintenance for this instance.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp start_time = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setStartTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->start_time = $var;

        return $this;
    }

    /**
     * Output only. The end time of any upcoming scheduled maintenance for this instance.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getEndTime()
    {
        return $this->end_time;
    }

    public function hasEndTime()
    {
        return isset($this->end_time);
    }

    public function clearEndTime()
    {
        unset($this->end_time);
    }

    /**
     * Output only. The end time of any upcoming scheduled maintenance for this instance.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp end_time = 2 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setEndTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->end_time = $var;

        return $this;
    }

    /**
     * Output only. The deadline that the maintenance schedule start time can not go beyond,
     * including reschedule.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp schedule_deadline_time = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getScheduleDeadlineTime()
    {
        return $this->schedule_deadline_time;
    }

    public function hasScheduleDeadlineTime()
    {
        return isset($this->schedule_deadline_time);
    }

    public function clearScheduleDeadlineTime()
    {
        unset($this->schedule_deadline_time);
    }

    /**
     * Output only. The deadline that the maintenance schedule start time can not go beyond,
     * including reschedule.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp schedule_deadline_time = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setScheduleDeadlineTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->schedule_deadline_time = $var;

        return $this;
    }

}

