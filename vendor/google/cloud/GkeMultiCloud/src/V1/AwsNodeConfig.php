<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/gkemulticloud/v1/aws_resources.proto

namespace Google\Cloud\GkeMultiCloud\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Parameters that describe the nodes in a cluster.
 *
 * Generated from protobuf message <code>google.cloud.gkemulticloud.v1.AwsNodeConfig</code>
 */
class AwsNodeConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * Optional. The AWS instance type.
     * When unspecified, it uses a default based on the node pool's version.
     *
     * Generated from protobuf field <code>string instance_type = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $instance_type = '';
    /**
     * Optional. Template for the root volume provisioned for node pool nodes.
     * Volumes will be provisioned in the availability zone assigned
     * to the node pool subnet.
     * When unspecified, it defaults to 32 GiB with the GP2 volume type.
     *
     * Generated from protobuf field <code>.google.cloud.gkemulticloud.v1.AwsVolumeTemplate root_volume = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $root_volume = null;
    /**
     * Optional. The initial taints assigned to nodes of this node pool.
     *
     * Generated from protobuf field <code>repeated .google.cloud.gkemulticloud.v1.NodeTaint taints = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $taints;
    /**
     * Optional. The initial labels assigned to nodes of this node pool. An object
     * containing a list of "key": value pairs. Example: { "name": "wrench",
     * "mass": "1.3kg", "count": "3" }.
     *
     * Generated from protobuf field <code>map<string, string> labels = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $labels;
    /**
     * Optional. Key/value metadata to assign to each underlying AWS resource. Specify at
     * most 50 pairs containing alphanumerics, spaces, and symbols (.+-=_:&#64;/).
     * Keys can be up to 127 Unicode characters.
     * Values can be up to 255 Unicode characters.
     *
     * Generated from protobuf field <code>map<string, string> tags = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $tags;
    /**
     * Required. The name or ARN of the AWS IAM role assigned to nodes in the pool.
     *
     * Generated from protobuf field <code>string iam_instance_profile = 6 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $iam_instance_profile = '';
    /**
     * Optional. The OS image type to use on node pool instances.
     * Can have a value of `ubuntu`, or `windows` if the cluster enables
     * the Windows node pool preview feature.
     * When unspecified, it defaults to `ubuntu`.
     *
     * Generated from protobuf field <code>string image_type = 11 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $image_type = '';
    /**
     * Optional. The SSH configuration.
     *
     * Generated from protobuf field <code>.google.cloud.gkemulticloud.v1.AwsSshConfig ssh_config = 9 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $ssh_config = null;
    /**
     * Optional. The IDs of additional security groups to add to nodes in this pool. The
     * manager will automatically create security groups with minimum rules
     * needed for a functioning cluster.
     *
     * Generated from protobuf field <code>repeated string security_group_ids = 10 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $security_group_ids;
    /**
     * Optional. Proxy configuration for outbound HTTP(S) traffic.
     *
     * Generated from protobuf field <code>.google.cloud.gkemulticloud.v1.AwsProxyConfig proxy_config = 12 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $proxy_config = null;
    /**
     * Required. Config encryption for user data.
     *
     * Generated from protobuf field <code>.google.cloud.gkemulticloud.v1.AwsConfigEncryption config_encryption = 13 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $config_encryption = null;
    /**
     * Optional. Placement related info for this node.
     * When unspecified, the VPC's default tenancy will be used.
     *
     * Generated from protobuf field <code>.google.cloud.gkemulticloud.v1.AwsInstancePlacement instance_placement = 14 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $instance_placement = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $instance_type
     *           Optional. The AWS instance type.
     *           When unspecified, it uses a default based on the node pool's version.
     *     @type \Google\Cloud\GkeMultiCloud\V1\AwsVolumeTemplate $root_volume
     *           Optional. Template for the root volume provisioned for node pool nodes.
     *           Volumes will be provisioned in the availability zone assigned
     *           to the node pool subnet.
     *           When unspecified, it defaults to 32 GiB with the GP2 volume type.
     *     @type array<\Google\Cloud\GkeMultiCloud\V1\NodeTaint>|\Google\Protobuf\Internal\RepeatedField $taints
     *           Optional. The initial taints assigned to nodes of this node pool.
     *     @type array|\Google\Protobuf\Internal\MapField $labels
     *           Optional. The initial labels assigned to nodes of this node pool. An object
     *           containing a list of "key": value pairs. Example: { "name": "wrench",
     *           "mass": "1.3kg", "count": "3" }.
     *     @type array|\Google\Protobuf\Internal\MapField $tags
     *           Optional. Key/value metadata to assign to each underlying AWS resource. Specify at
     *           most 50 pairs containing alphanumerics, spaces, and symbols (.+-=_:&#64;/).
     *           Keys can be up to 127 Unicode characters.
     *           Values can be up to 255 Unicode characters.
     *     @type string $iam_instance_profile
     *           Required. The name or ARN of the AWS IAM role assigned to nodes in the pool.
     *     @type string $image_type
     *           Optional. The OS image type to use on node pool instances.
     *           Can have a value of `ubuntu`, or `windows` if the cluster enables
     *           the Windows node pool preview feature.
     *           When unspecified, it defaults to `ubuntu`.
     *     @type \Google\Cloud\GkeMultiCloud\V1\AwsSshConfig $ssh_config
     *           Optional. The SSH configuration.
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $security_group_ids
     *           Optional. The IDs of additional security groups to add to nodes in this pool. The
     *           manager will automatically create security groups with minimum rules
     *           needed for a functioning cluster.
     *     @type \Google\Cloud\GkeMultiCloud\V1\AwsProxyConfig $proxy_config
     *           Optional. Proxy configuration for outbound HTTP(S) traffic.
     *     @type \Google\Cloud\GkeMultiCloud\V1\AwsConfigEncryption $config_encryption
     *           Required. Config encryption for user data.
     *     @type \Google\Cloud\GkeMultiCloud\V1\AwsInstancePlacement $instance_placement
     *           Optional. Placement related info for this node.
     *           When unspecified, the VPC's default tenancy will be used.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Gkemulticloud\V1\AwsResources::initOnce();
        parent::__construct($data);
    }

    /**
     * Optional. The AWS instance type.
     * When unspecified, it uses a default based on the node pool's version.
     *
     * Generated from protobuf field <code>string instance_type = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getInstanceType()
    {
        return $this->instance_type;
    }

    /**
     * Optional. The AWS instance type.
     * When unspecified, it uses a default based on the node pool's version.
     *
     * Generated from protobuf field <code>string instance_type = 1 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setInstanceType($var)
    {
        GPBUtil::checkString($var, True);
        $this->instance_type = $var;

        return $this;
    }

    /**
     * Optional. Template for the root volume provisioned for node pool nodes.
     * Volumes will be provisioned in the availability zone assigned
     * to the node pool subnet.
     * When unspecified, it defaults to 32 GiB with the GP2 volume type.
     *
     * Generated from protobuf field <code>.google.cloud.gkemulticloud.v1.AwsVolumeTemplate root_volume = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Cloud\GkeMultiCloud\V1\AwsVolumeTemplate|null
     */
    public function getRootVolume()
    {
        return $this->root_volume;
    }

    public function hasRootVolume()
    {
        return isset($this->root_volume);
    }

    public function clearRootVolume()
    {
        unset($this->root_volume);
    }

    /**
     * Optional. Template for the root volume provisioned for node pool nodes.
     * Volumes will be provisioned in the availability zone assigned
     * to the node pool subnet.
     * When unspecified, it defaults to 32 GiB with the GP2 volume type.
     *
     * Generated from protobuf field <code>.google.cloud.gkemulticloud.v1.AwsVolumeTemplate root_volume = 2 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Cloud\GkeMultiCloud\V1\AwsVolumeTemplate $var
     * @return $this
     */
    public function setRootVolume($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\GkeMultiCloud\V1\AwsVolumeTemplate::class);
        $this->root_volume = $var;

        return $this;
    }

    /**
     * Optional. The initial taints assigned to nodes of this node pool.
     *
     * Generated from protobuf field <code>repeated .google.cloud.gkemulticloud.v1.NodeTaint taints = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getTaints()
    {
        return $this->taints;
    }

    /**
     * Optional. The initial taints assigned to nodes of this node pool.
     *
     * Generated from protobuf field <code>repeated .google.cloud.gkemulticloud.v1.NodeTaint taints = 3 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array<\Google\Cloud\GkeMultiCloud\V1\NodeTaint>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setTaints($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\GkeMultiCloud\V1\NodeTaint::class);
        $this->taints = $arr;

        return $this;
    }

    /**
     * Optional. The initial labels assigned to nodes of this node pool. An object
     * containing a list of "key": value pairs. Example: { "name": "wrench",
     * "mass": "1.3kg", "count": "3" }.
     *
     * Generated from protobuf field <code>map<string, string> labels = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Optional. The initial labels assigned to nodes of this node pool. An object
     * containing a list of "key": value pairs. Example: { "name": "wrench",
     * "mass": "1.3kg", "count": "3" }.
     *
     * Generated from protobuf field <code>map<string, string> labels = 4 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setLabels($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->labels = $arr;

        return $this;
    }

    /**
     * Optional. Key/value metadata to assign to each underlying AWS resource. Specify at
     * most 50 pairs containing alphanumerics, spaces, and symbols (.+-=_:&#64;/).
     * Keys can be up to 127 Unicode characters.
     * Values can be up to 255 Unicode characters.
     *
     * Generated from protobuf field <code>map<string, string> tags = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Optional. Key/value metadata to assign to each underlying AWS resource. Specify at
     * most 50 pairs containing alphanumerics, spaces, and symbols (.+-=_:&#64;/).
     * Keys can be up to 127 Unicode characters.
     * Values can be up to 255 Unicode characters.
     *
     * Generated from protobuf field <code>map<string, string> tags = 5 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setTags($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->tags = $arr;

        return $this;
    }

    /**
     * Required. The name or ARN of the AWS IAM role assigned to nodes in the pool.
     *
     * Generated from protobuf field <code>string iam_instance_profile = 6 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getIamInstanceProfile()
    {
        return $this->iam_instance_profile;
    }

    /**
     * Required. The name or ARN of the AWS IAM role assigned to nodes in the pool.
     *
     * Generated from protobuf field <code>string iam_instance_profile = 6 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setIamInstanceProfile($var)
    {
        GPBUtil::checkString($var, True);
        $this->iam_instance_profile = $var;

        return $this;
    }

    /**
     * Optional. The OS image type to use on node pool instances.
     * Can have a value of `ubuntu`, or `windows` if the cluster enables
     * the Windows node pool preview feature.
     * When unspecified, it defaults to `ubuntu`.
     *
     * Generated from protobuf field <code>string image_type = 11 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return string
     */
    public function getImageType()
    {
        return $this->image_type;
    }

    /**
     * Optional. The OS image type to use on node pool instances.
     * Can have a value of `ubuntu`, or `windows` if the cluster enables
     * the Windows node pool preview feature.
     * When unspecified, it defaults to `ubuntu`.
     *
     * Generated from protobuf field <code>string image_type = 11 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param string $var
     * @return $this
     */
    public function setImageType($var)
    {
        GPBUtil::checkString($var, True);
        $this->image_type = $var;

        return $this;
    }

    /**
     * Optional. The SSH configuration.
     *
     * Generated from protobuf field <code>.google.cloud.gkemulticloud.v1.AwsSshConfig ssh_config = 9 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Cloud\GkeMultiCloud\V1\AwsSshConfig|null
     */
    public function getSshConfig()
    {
        return $this->ssh_config;
    }

    public function hasSshConfig()
    {
        return isset($this->ssh_config);
    }

    public function clearSshConfig()
    {
        unset($this->ssh_config);
    }

    /**
     * Optional. The SSH configuration.
     *
     * Generated from protobuf field <code>.google.cloud.gkemulticloud.v1.AwsSshConfig ssh_config = 9 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Cloud\GkeMultiCloud\V1\AwsSshConfig $var
     * @return $this
     */
    public function setSshConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\GkeMultiCloud\V1\AwsSshConfig::class);
        $this->ssh_config = $var;

        return $this;
    }

    /**
     * Optional. The IDs of additional security groups to add to nodes in this pool. The
     * manager will automatically create security groups with minimum rules
     * needed for a functioning cluster.
     *
     * Generated from protobuf field <code>repeated string security_group_ids = 10 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getSecurityGroupIds()
    {
        return $this->security_group_ids;
    }

    /**
     * Optional. The IDs of additional security groups to add to nodes in this pool. The
     * manager will automatically create security groups with minimum rules
     * needed for a functioning cluster.
     *
     * Generated from protobuf field <code>repeated string security_group_ids = 10 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setSecurityGroupIds($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->security_group_ids = $arr;

        return $this;
    }

    /**
     * Optional. Proxy configuration for outbound HTTP(S) traffic.
     *
     * Generated from protobuf field <code>.google.cloud.gkemulticloud.v1.AwsProxyConfig proxy_config = 12 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Cloud\GkeMultiCloud\V1\AwsProxyConfig|null
     */
    public function getProxyConfig()
    {
        return $this->proxy_config;
    }

    public function hasProxyConfig()
    {
        return isset($this->proxy_config);
    }

    public function clearProxyConfig()
    {
        unset($this->proxy_config);
    }

    /**
     * Optional. Proxy configuration for outbound HTTP(S) traffic.
     *
     * Generated from protobuf field <code>.google.cloud.gkemulticloud.v1.AwsProxyConfig proxy_config = 12 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Cloud\GkeMultiCloud\V1\AwsProxyConfig $var
     * @return $this
     */
    public function setProxyConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\GkeMultiCloud\V1\AwsProxyConfig::class);
        $this->proxy_config = $var;

        return $this;
    }

    /**
     * Required. Config encryption for user data.
     *
     * Generated from protobuf field <code>.google.cloud.gkemulticloud.v1.AwsConfigEncryption config_encryption = 13 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\GkeMultiCloud\V1\AwsConfigEncryption|null
     */
    public function getConfigEncryption()
    {
        return $this->config_encryption;
    }

    public function hasConfigEncryption()
    {
        return isset($this->config_encryption);
    }

    public function clearConfigEncryption()
    {
        unset($this->config_encryption);
    }

    /**
     * Required. Config encryption for user data.
     *
     * Generated from protobuf field <code>.google.cloud.gkemulticloud.v1.AwsConfigEncryption config_encryption = 13 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\GkeMultiCloud\V1\AwsConfigEncryption $var
     * @return $this
     */
    public function setConfigEncryption($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\GkeMultiCloud\V1\AwsConfigEncryption::class);
        $this->config_encryption = $var;

        return $this;
    }

    /**
     * Optional. Placement related info for this node.
     * When unspecified, the VPC's default tenancy will be used.
     *
     * Generated from protobuf field <code>.google.cloud.gkemulticloud.v1.AwsInstancePlacement instance_placement = 14 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Cloud\GkeMultiCloud\V1\AwsInstancePlacement|null
     */
    public function getInstancePlacement()
    {
        return $this->instance_placement;
    }

    public function hasInstancePlacement()
    {
        return isset($this->instance_placement);
    }

    public function clearInstancePlacement()
    {
        unset($this->instance_placement);
    }

    /**
     * Optional. Placement related info for this node.
     * When unspecified, the VPC's default tenancy will be used.
     *
     * Generated from protobuf field <code>.google.cloud.gkemulticloud.v1.AwsInstancePlacement instance_placement = 14 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Cloud\GkeMultiCloud\V1\AwsInstancePlacement $var
     * @return $this
     */
    public function setInstancePlacement($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\GkeMultiCloud\V1\AwsInstancePlacement::class);
        $this->instance_placement = $var;

        return $this;
    }

}

