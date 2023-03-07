<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/automl/v1beta1/data_stats.proto

namespace Google\Cloud\AutoMl\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A correlation statistics between two series of DataType values. The series
 * may have differing DataType-s, but within a single series the DataType must
 * be the same.
 *
 * Generated from protobuf message <code>google.cloud.automl.v1beta1.CorrelationStats</code>
 */
class CorrelationStats extends \Google\Protobuf\Internal\Message
{
    /**
     * The correlation value using the Cramer's V measure.
     *
     * Generated from protobuf field <code>double cramers_v = 1;</code>
     */
    private $cramers_v = 0.0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type float $cramers_v
     *           The correlation value using the Cramer's V measure.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Automl\V1Beta1\DataStats::initOnce();
        parent::__construct($data);
    }

    /**
     * The correlation value using the Cramer's V measure.
     *
     * Generated from protobuf field <code>double cramers_v = 1;</code>
     * @return float
     */
    public function getCramersV()
    {
        return $this->cramers_v;
    }

    /**
     * The correlation value using the Cramer's V measure.
     *
     * Generated from protobuf field <code>double cramers_v = 1;</code>
     * @param float $var
     * @return $this
     */
    public function setCramersV($var)
    {
        GPBUtil::checkDouble($var);
        $this->cramers_v = $var;

        return $this;
    }

}

