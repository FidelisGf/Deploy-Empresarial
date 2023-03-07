<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/logging/v2/logging_metrics.proto

namespace Google\Cloud\Logging\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The parameters to CreateLogMetric.
 *
 * Generated from protobuf message <code>google.logging.v2.CreateLogMetricRequest</code>
 */
class CreateLogMetricRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The resource name of the project in which to create the metric:
     *     "projects/[PROJECT_ID]"
     * The new metric must be provided in the request.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $parent = '';
    /**
     * Required. The new logs-based metric, which must not have an identifier that
     * already exists.
     *
     * Generated from protobuf field <code>.google.logging.v2.LogMetric metric = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $metric = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. The resource name of the project in which to create the metric:
     *               "projects/[PROJECT_ID]"
     *           The new metric must be provided in the request.
     *     @type \Google\Cloud\Logging\V2\LogMetric $metric
     *           Required. The new logs-based metric, which must not have an identifier that
     *           already exists.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Logging\V2\LoggingMetrics::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The resource name of the project in which to create the metric:
     *     "projects/[PROJECT_ID]"
     * The new metric must be provided in the request.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. The resource name of the project in which to create the metric:
     *     "projects/[PROJECT_ID]"
     * The new metric must be provided in the request.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->parent = $var;

        return $this;
    }

    /**
     * Required. The new logs-based metric, which must not have an identifier that
     * already exists.
     *
     * Generated from protobuf field <code>.google.logging.v2.LogMetric metric = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Logging\V2\LogMetric|null
     */
    public function getMetric()
    {
        return $this->metric;
    }

    public function hasMetric()
    {
        return isset($this->metric);
    }

    public function clearMetric()
    {
        unset($this->metric);
    }

    /**
     * Required. The new logs-based metric, which must not have an identifier that
     * already exists.
     *
     * Generated from protobuf field <code>.google.logging.v2.LogMetric metric = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Logging\V2\LogMetric $var
     * @return $this
     */
    public function setMetric($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Logging\V2\LogMetric::class);
        $this->metric = $var;

        return $this;
    }

}

