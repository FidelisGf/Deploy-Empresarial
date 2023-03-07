<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/compute/v1/compute.proto

namespace Google\Cloud\Compute\V1\Scheduling;

use UnexpectedValueException;

/**
 * Specifies the provisioning model of the instance.
 *
 * Protobuf type <code>google.cloud.compute.v1.Scheduling.ProvisioningModel</code>
 */
class ProvisioningModel
{
    /**
     * A value indicating that the enum field is not set.
     *
     * Generated from protobuf enum <code>UNDEFINED_PROVISIONING_MODEL = 0;</code>
     */
    const UNDEFINED_PROVISIONING_MODEL = 0;
    /**
     * Heavily discounted, no guaranteed runtime.
     *
     * Generated from protobuf enum <code>SPOT = 2552066;</code>
     */
    const SPOT = 2552066;
    /**
     * Standard provisioning with user controlled runtime, no discounts.
     *
     * Generated from protobuf enum <code>STANDARD = 484642493;</code>
     */
    const STANDARD = 484642493;

    private static $valueToName = [
        self::UNDEFINED_PROVISIONING_MODEL => 'UNDEFINED_PROVISIONING_MODEL',
        self::SPOT => 'SPOT',
        self::STANDARD => 'STANDARD',
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


