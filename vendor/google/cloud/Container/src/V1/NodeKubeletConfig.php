<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/container/v1/cluster_service.proto

namespace Google\Cloud\Container\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Node kubelet configs.
 *
 * Generated from protobuf message <code>google.container.v1.NodeKubeletConfig</code>
 */
class NodeKubeletConfig extends \Google\Protobuf\Internal\Message
{
    /**
     * Control the CPU management policy on the node.
     * See
     * https://kubernetes.io/docs/tasks/administer-cluster/cpu-management-policies/
     * The following values are allowed.
     * * "none": the default, which represents the existing scheduling behavior.
     * * "static": allows pods with certain resource characteristics to be granted
     * increased CPU affinity and exclusivity on the node.
     * The default value is 'none' if unspecified.
     *
     * Generated from protobuf field <code>string cpu_manager_policy = 1;</code>
     */
    private $cpu_manager_policy = '';
    /**
     * Enable CPU CFS quota enforcement for containers that specify CPU limits.
     * This option is enabled by default which makes kubelet use CFS quota
     * (https://www.kernel.org/doc/Documentation/scheduler/sched-bwc.txt) to
     * enforce container CPU limits. Otherwise, CPU limits will not be enforced at
     * all.
     * Disable this option to mitigate CPU throttling problems while still having
     * your pods to be in Guaranteed QoS class by specifying the CPU limits.
     * The default value is 'true' if unspecified.
     *
     * Generated from protobuf field <code>.google.protobuf.BoolValue cpu_cfs_quota = 2;</code>
     */
    private $cpu_cfs_quota = null;
    /**
     * Set the CPU CFS quota period value 'cpu.cfs_period_us'.
     * The string must be a sequence of decimal numbers, each with optional
     * fraction and a unit suffix, such as "300ms".
     * Valid time units are "ns", "us" (or "µs"), "ms", "s", "m", "h".
     * The value must be a positive duration.
     *
     * Generated from protobuf field <code>string cpu_cfs_quota_period = 3;</code>
     */
    private $cpu_cfs_quota_period = '';
    /**
     * Set the Pod PID limits. See
     * https://kubernetes.io/docs/concepts/policy/pid-limiting/#pod-pid-limits
     * Controls the maximum number of processes allowed to run in a pod. The value
     * must be greater than or equal to 1024 and less than 4194304.
     *
     * Generated from protobuf field <code>int64 pod_pids_limit = 4;</code>
     */
    private $pod_pids_limit = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $cpu_manager_policy
     *           Control the CPU management policy on the node.
     *           See
     *           https://kubernetes.io/docs/tasks/administer-cluster/cpu-management-policies/
     *           The following values are allowed.
     *           * "none": the default, which represents the existing scheduling behavior.
     *           * "static": allows pods with certain resource characteristics to be granted
     *           increased CPU affinity and exclusivity on the node.
     *           The default value is 'none' if unspecified.
     *     @type \Google\Protobuf\BoolValue $cpu_cfs_quota
     *           Enable CPU CFS quota enforcement for containers that specify CPU limits.
     *           This option is enabled by default which makes kubelet use CFS quota
     *           (https://www.kernel.org/doc/Documentation/scheduler/sched-bwc.txt) to
     *           enforce container CPU limits. Otherwise, CPU limits will not be enforced at
     *           all.
     *           Disable this option to mitigate CPU throttling problems while still having
     *           your pods to be in Guaranteed QoS class by specifying the CPU limits.
     *           The default value is 'true' if unspecified.
     *     @type string $cpu_cfs_quota_period
     *           Set the CPU CFS quota period value 'cpu.cfs_period_us'.
     *           The string must be a sequence of decimal numbers, each with optional
     *           fraction and a unit suffix, such as "300ms".
     *           Valid time units are "ns", "us" (or "µs"), "ms", "s", "m", "h".
     *           The value must be a positive duration.
     *     @type int|string $pod_pids_limit
     *           Set the Pod PID limits. See
     *           https://kubernetes.io/docs/concepts/policy/pid-limiting/#pod-pid-limits
     *           Controls the maximum number of processes allowed to run in a pod. The value
     *           must be greater than or equal to 1024 and less than 4194304.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Container\V1\ClusterService::initOnce();
        parent::__construct($data);
    }

    /**
     * Control the CPU management policy on the node.
     * See
     * https://kubernetes.io/docs/tasks/administer-cluster/cpu-management-policies/
     * The following values are allowed.
     * * "none": the default, which represents the existing scheduling behavior.
     * * "static": allows pods with certain resource characteristics to be granted
     * increased CPU affinity and exclusivity on the node.
     * The default value is 'none' if unspecified.
     *
     * Generated from protobuf field <code>string cpu_manager_policy = 1;</code>
     * @return string
     */
    public function getCpuManagerPolicy()
    {
        return $this->cpu_manager_policy;
    }

    /**
     * Control the CPU management policy on the node.
     * See
     * https://kubernetes.io/docs/tasks/administer-cluster/cpu-management-policies/
     * The following values are allowed.
     * * "none": the default, which represents the existing scheduling behavior.
     * * "static": allows pods with certain resource characteristics to be granted
     * increased CPU affinity and exclusivity on the node.
     * The default value is 'none' if unspecified.
     *
     * Generated from protobuf field <code>string cpu_manager_policy = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setCpuManagerPolicy($var)
    {
        GPBUtil::checkString($var, True);
        $this->cpu_manager_policy = $var;

        return $this;
    }

    /**
     * Enable CPU CFS quota enforcement for containers that specify CPU limits.
     * This option is enabled by default which makes kubelet use CFS quota
     * (https://www.kernel.org/doc/Documentation/scheduler/sched-bwc.txt) to
     * enforce container CPU limits. Otherwise, CPU limits will not be enforced at
     * all.
     * Disable this option to mitigate CPU throttling problems while still having
     * your pods to be in Guaranteed QoS class by specifying the CPU limits.
     * The default value is 'true' if unspecified.
     *
     * Generated from protobuf field <code>.google.protobuf.BoolValue cpu_cfs_quota = 2;</code>
     * @return \Google\Protobuf\BoolValue|null
     */
    public function getCpuCfsQuota()
    {
        return $this->cpu_cfs_quota;
    }

    public function hasCpuCfsQuota()
    {
        return isset($this->cpu_cfs_quota);
    }

    public function clearCpuCfsQuota()
    {
        unset($this->cpu_cfs_quota);
    }

    /**
     * Returns the unboxed value from <code>getCpuCfsQuota()</code>

     * Enable CPU CFS quota enforcement for containers that specify CPU limits.
     * This option is enabled by default which makes kubelet use CFS quota
     * (https://www.kernel.org/doc/Documentation/scheduler/sched-bwc.txt) to
     * enforce container CPU limits. Otherwise, CPU limits will not be enforced at
     * all.
     * Disable this option to mitigate CPU throttling problems while still having
     * your pods to be in Guaranteed QoS class by specifying the CPU limits.
     * The default value is 'true' if unspecified.
     *
     * Generated from protobuf field <code>.google.protobuf.BoolValue cpu_cfs_quota = 2;</code>
     * @return bool|null
     */
    public function getCpuCfsQuotaValue()
    {
        return $this->readWrapperValue("cpu_cfs_quota");
    }

    /**
     * Enable CPU CFS quota enforcement for containers that specify CPU limits.
     * This option is enabled by default which makes kubelet use CFS quota
     * (https://www.kernel.org/doc/Documentation/scheduler/sched-bwc.txt) to
     * enforce container CPU limits. Otherwise, CPU limits will not be enforced at
     * all.
     * Disable this option to mitigate CPU throttling problems while still having
     * your pods to be in Guaranteed QoS class by specifying the CPU limits.
     * The default value is 'true' if unspecified.
     *
     * Generated from protobuf field <code>.google.protobuf.BoolValue cpu_cfs_quota = 2;</code>
     * @param \Google\Protobuf\BoolValue $var
     * @return $this
     */
    public function setCpuCfsQuota($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\BoolValue::class);
        $this->cpu_cfs_quota = $var;

        return $this;
    }

    /**
     * Sets the field by wrapping a primitive type in a Google\Protobuf\BoolValue object.

     * Enable CPU CFS quota enforcement for containers that specify CPU limits.
     * This option is enabled by default which makes kubelet use CFS quota
     * (https://www.kernel.org/doc/Documentation/scheduler/sched-bwc.txt) to
     * enforce container CPU limits. Otherwise, CPU limits will not be enforced at
     * all.
     * Disable this option to mitigate CPU throttling problems while still having
     * your pods to be in Guaranteed QoS class by specifying the CPU limits.
     * The default value is 'true' if unspecified.
     *
     * Generated from protobuf field <code>.google.protobuf.BoolValue cpu_cfs_quota = 2;</code>
     * @param bool|null $var
     * @return $this
     */
    public function setCpuCfsQuotaValue($var)
    {
        $this->writeWrapperValue("cpu_cfs_quota", $var);
        return $this;}

    /**
     * Set the CPU CFS quota period value 'cpu.cfs_period_us'.
     * The string must be a sequence of decimal numbers, each with optional
     * fraction and a unit suffix, such as "300ms".
     * Valid time units are "ns", "us" (or "µs"), "ms", "s", "m", "h".
     * The value must be a positive duration.
     *
     * Generated from protobuf field <code>string cpu_cfs_quota_period = 3;</code>
     * @return string
     */
    public function getCpuCfsQuotaPeriod()
    {
        return $this->cpu_cfs_quota_period;
    }

    /**
     * Set the CPU CFS quota period value 'cpu.cfs_period_us'.
     * The string must be a sequence of decimal numbers, each with optional
     * fraction and a unit suffix, such as "300ms".
     * Valid time units are "ns", "us" (or "µs"), "ms", "s", "m", "h".
     * The value must be a positive duration.
     *
     * Generated from protobuf field <code>string cpu_cfs_quota_period = 3;</code>
     * @param string $var
     * @return $this
     */
    public function setCpuCfsQuotaPeriod($var)
    {
        GPBUtil::checkString($var, True);
        $this->cpu_cfs_quota_period = $var;

        return $this;
    }

    /**
     * Set the Pod PID limits. See
     * https://kubernetes.io/docs/concepts/policy/pid-limiting/#pod-pid-limits
     * Controls the maximum number of processes allowed to run in a pod. The value
     * must be greater than or equal to 1024 and less than 4194304.
     *
     * Generated from protobuf field <code>int64 pod_pids_limit = 4;</code>
     * @return int|string
     */
    public function getPodPidsLimit()
    {
        return $this->pod_pids_limit;
    }

    /**
     * Set the Pod PID limits. See
     * https://kubernetes.io/docs/concepts/policy/pid-limiting/#pod-pid-limits
     * Controls the maximum number of processes allowed to run in a pod. The value
     * must be greater than or equal to 1024 and less than 4194304.
     *
     * Generated from protobuf field <code>int64 pod_pids_limit = 4;</code>
     * @param int|string $var
     * @return $this
     */
    public function setPodPidsLimit($var)
    {
        GPBUtil::checkInt64($var);
        $this->pod_pids_limit = $var;

        return $this;
    }

}

