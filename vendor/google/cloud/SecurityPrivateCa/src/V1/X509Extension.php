<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/security/privateca/v1/resources.proto

namespace Google\Cloud\Security\PrivateCA\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * An [X509Extension][google.cloud.security.privateca.v1.X509Extension] specifies an X.509 extension, which may be used in
 * different parts of X.509 objects like certificates, CSRs, and CRLs.
 *
 * Generated from protobuf message <code>google.cloud.security.privateca.v1.X509Extension</code>
 */
class X509Extension extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The OID for this X.509 extension.
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.ObjectId object_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $object_id = null;
    /**
     * Optional. Indicates whether or not this extension is critical (i.e., if the client
     * does not know how to handle this extension, the client should consider this
     * to be an error).
     *
     * Generated from protobuf field <code>bool critical = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $critical = false;
    /**
     * Required. The value of this X.509 extension.
     *
     * Generated from protobuf field <code>bytes value = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $value = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Cloud\Security\PrivateCA\V1\ObjectId $object_id
     *           Required. The OID for this X.509 extension.
     *     @type bool $critical
     *           Optional. Indicates whether or not this extension is critical (i.e., if the client
     *           does not know how to handle this extension, the client should consider this
     *           to be an error).
     *     @type string $value
     *           Required. The value of this X.509 extension.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Security\Privateca\V1\Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The OID for this X.509 extension.
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.ObjectId object_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Security\PrivateCA\V1\ObjectId|null
     */
    public function getObjectId()
    {
        return $this->object_id;
    }

    public function hasObjectId()
    {
        return isset($this->object_id);
    }

    public function clearObjectId()
    {
        unset($this->object_id);
    }

    /**
     * Required. The OID for this X.509 extension.
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.ObjectId object_id = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Security\PrivateCA\V1\ObjectId $var
     * @return $this
     */
    public function setObjectId($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Security\PrivateCA\V1\ObjectId::class);
        $this->object_id = $var;

        return $this;
    }

    /**
     * Optional. Indicates whether or not this extension is critical (i.e., if the client
     * does not know how to handle this extension, the client should consider this
     * to be an error).
     *
     * Generated from protobuf field <code>bool critical = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return bool
     */
    public function getCritical()
    {
        return $this->critical;
    }

    /**
     * Optional. Indicates whether or not this extension is critical (i.e., if the client
     * does not know how to handle this extension, the client should consider this
     * to be an error).
     *
     * Generated from protobuf field <code>bool critical = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param bool $var
     * @return $this
     */
    public function setCritical($var)
    {
        GPBUtil::checkBool($var);
        $this->critical = $var;

        return $this;
    }

    /**
     * Required. The value of this X.509 extension.
     *
     * Generated from protobuf field <code>bytes value = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Required. The value of this X.509 extension.
     *
     * Generated from protobuf field <code>bytes value = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setValue($var)
    {
        GPBUtil::checkString($var, False);
        $this->value = $var;

        return $this;
    }

}

