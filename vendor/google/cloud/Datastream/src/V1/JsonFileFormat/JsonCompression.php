<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/datastream/v1/datastream_resources.proto

namespace Google\Cloud\Datastream\V1\JsonFileFormat;

use UnexpectedValueException;

/**
 * Json file compression.
 *
 * Protobuf type <code>google.cloud.datastream.v1.JsonFileFormat.JsonCompression</code>
 */
class JsonCompression
{
    /**
     * Unspecified json file compression.
     *
     * Generated from protobuf enum <code>JSON_COMPRESSION_UNSPECIFIED = 0;</code>
     */
    const JSON_COMPRESSION_UNSPECIFIED = 0;
    /**
     * Do not compress JSON file.
     *
     * Generated from protobuf enum <code>NO_COMPRESSION = 1;</code>
     */
    const NO_COMPRESSION = 1;
    /**
     * Gzip compression.
     *
     * Generated from protobuf enum <code>GZIP = 2;</code>
     */
    const GZIP = 2;

    private static $valueToName = [
        self::JSON_COMPRESSION_UNSPECIFIED => 'JSON_COMPRESSION_UNSPECIFIED',
        self::NO_COMPRESSION => 'NO_COMPRESSION',
        self::GZIP => 'GZIP',
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


