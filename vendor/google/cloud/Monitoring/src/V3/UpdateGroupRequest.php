<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/monitoring/v3/group_service.proto

namespace Google\Cloud\Monitoring\V3;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The `UpdateGroup` request.
 *
 * Generated from protobuf message <code>google.monitoring.v3.UpdateGroupRequest</code>
 */
class UpdateGroupRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The new definition of the group.  All fields of the existing group,
     * excepting `name`, are replaced with the corresponding fields of this group.
     *
     * Generated from protobuf field <code>.google.monitoring.v3.Group group = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $group = null;
    /**
     * If true, validate this request but do not update the existing group.
     *
     * Generated from protobuf field <code>bool validate_only = 3;</code>
     */
    private $validate_only = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Monitoring\V3\Group $group
     *           Required. The new definition of the group.  All fields of the existing group,
     *           excepting `name`, are replaced with the corresponding fields of this group.
     *     @type bool $validate_only
     *           If true, validate this request but do not update the existing group.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Monitoring\V3\GroupService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The new definition of the group.  All fields of the existing group,
     * excepting `name`, are replaced with the corresponding fields of this group.
     *
     * Generated from protobuf field <code>.google.monitoring.v3.Group group = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Monitoring\V3\Group|null
     */
    public function getGroup()
    {
        return $this->group;
    }

    public function hasGroup()
    {
        return isset($this->group);
    }

    public function clearGroup()
    {
        unset($this->group);
    }

    /**
     * Required. The new definition of the group.  All fields of the existing group,
     * excepting `name`, are replaced with the corresponding fields of this group.
     *
     * Generated from protobuf field <code>.google.monitoring.v3.Group group = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Monitoring\V3\Group $var
     * @return $this
     */
    public function setGroup($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Monitoring\V3\Group::class);
        $this->group = $var;

        return $this;
    }

    /**
     * If true, validate this request but do not update the existing group.
     *
     * Generated from protobuf field <code>bool validate_only = 3;</code>
     * @return bool
     */
    public function getValidateOnly()
    {
        return $this->validate_only;
    }

    /**
     * If true, validate this request but do not update the existing group.
     *
     * Generated from protobuf field <code>bool validate_only = 3;</code>
     * @param bool $var
     * @return $this
     */
    public function setValidateOnly($var)
    {
        GPBUtil::checkBool($var);
        $this->validate_only = $var;

        return $this;
    }

}

