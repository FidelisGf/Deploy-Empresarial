<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/resourcesettings/v1/resource_settings.proto

namespace Google\Cloud\ResourceSettings\V1\Value;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A string set value that can hold a set of strings. The maximum length of
 * each string is 200 characters and there can be a maximum of 50 strings in
 * the string set.
 *
 * Generated from protobuf message <code>google.cloud.resourcesettings.v1.Value.StringSet</code>
 */
class StringSet extends \Google\Protobuf\Internal\Message
{
    /**
     * The strings in the set
     *
     * Generated from protobuf field <code>repeated string values = 1;</code>
     */
    private $values;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $values
     *           The strings in the set
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Resourcesettings\V1\ResourceSettings::initOnce();
        parent::__construct($data);
    }

    /**
     * The strings in the set
     *
     * Generated from protobuf field <code>repeated string values = 1;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getValues()
    {
        return $this->values;
    }

    /**
     * The strings in the set
     *
     * Generated from protobuf field <code>repeated string values = 1;</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setValues($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->values = $arr;

        return $this;
    }

}


