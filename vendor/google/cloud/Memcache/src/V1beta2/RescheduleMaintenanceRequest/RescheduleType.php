<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/memcache/v1beta2/cloud_memcache.proto

namespace Google\Cloud\Memcache\V1beta2\RescheduleMaintenanceRequest;

use UnexpectedValueException;

/**
 * Reschedule options.
 *
 * Protobuf type <code>google.cloud.memcache.v1beta2.RescheduleMaintenanceRequest.RescheduleType</code>
 */
class RescheduleType
{
    /**
     * Not set.
     *
     * Generated from protobuf enum <code>RESCHEDULE_TYPE_UNSPECIFIED = 0;</code>
     */
    const RESCHEDULE_TYPE_UNSPECIFIED = 0;
    /**
     * If the user wants to schedule the maintenance to happen now.
     *
     * Generated from protobuf enum <code>IMMEDIATE = 1;</code>
     */
    const IMMEDIATE = 1;
    /**
     * If the user wants to use the existing maintenance policy to find the
     * next available window.
     *
     * Generated from protobuf enum <code>NEXT_AVAILABLE_WINDOW = 2;</code>
     */
    const NEXT_AVAILABLE_WINDOW = 2;
    /**
     * If the user wants to reschedule the maintenance to a specific time.
     *
     * Generated from protobuf enum <code>SPECIFIC_TIME = 3;</code>
     */
    const SPECIFIC_TIME = 3;

    private static $valueToName = [
        self::RESCHEDULE_TYPE_UNSPECIFIED => 'RESCHEDULE_TYPE_UNSPECIFIED',
        self::IMMEDIATE => 'IMMEDIATE',
        self::NEXT_AVAILABLE_WINDOW => 'NEXT_AVAILABLE_WINDOW',
        self::SPECIFIC_TIME => 'SPECIFIC_TIME',
    ];

    public static function name($value)
    {
        if (!isset(self::$valueToName[$value])) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no name defined for value %s', __CLASS__, $value));
        }
        return self::$valueToName[$value];
    }


    public static function value($name)
    {
        $const = __CLASS__ . '::' . strtoupper($name);
        if (!defined($const)) {
            throw new UnexpectedValueException(sprintf(
                    'Enum %s has no value defined for name %s', __CLASS__, $name));
        }
        return constant($const);
    }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(RescheduleType::class, \Google\Cloud\Memcache\V1beta2\RescheduleMaintenanceRequest_RescheduleType::class);

