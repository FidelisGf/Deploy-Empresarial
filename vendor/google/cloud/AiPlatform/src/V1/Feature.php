<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/feature.proto

namespace Google\Cloud\AIPlatform\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Feature Metadata information that describes an attribute of an entity type.
 * For example, apple is an entity type, and color is a feature that describes
 * apple.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.Feature</code>
 */
class Feature extends \Google\Protobuf\Internal\Message
{
    /**
     * Immutable. Name of the Feature.
     * Format:
     * `projects/{project}/locations/{location}/featurestores/{featurestore}/entityTypes/{entity_type}/features/{feature}`
     * The last part feature is assigned by the client. The feature can be up to
     * 64 characters long and can consist only of ASCII Latin letters A-Z and a-z,
     * underscore(_), and ASCII digits 0-9 starting with a letter. The value will
     * be unique given an entity type.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = IMMUTABLE];</code>
     */
    private $name = '';
    /**
     * Description of the Feature.
     *
     * Generated from protobuf field <code>string description = 2;</code>
     */
    private $description = '';
    /**
     * Required. Immutable. Type of Feature value.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.Feature.ValueType value_type = 3 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     */
    private $value_type = 0;
    /**
     * Output only. Timestamp when this EntityType was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $create_time = null;
    /**
     * Output only. Timestamp when this EntityType was most recently updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $update_time = null;
    /**
     * Optional. The labels with user-defined metadata to organize your Features.
     * Label keys and values can be no longer than 64 characters
     * (Unicode codepoints), can only contain lowercase letters, numeric
     * characters, underscores and dashes. International characters are allowed.
     * See https://goo.gl/xmQnxf for more information on and examples of labels.
     * No more than 64 user labels can be associated with one Feature (System
     * labels are excluded)."
     * System reserved label keys are prefixed with "aiplatform.googleapis.com/"
     * and are immutable.
     *
     * Generated from protobuf field <code>map<string, string> labels = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $labels;
    /**
     * Used to perform a consistent read-modify-write updates. If not set, a blind
     * "overwrite" update happens.
     *
     * Generated from protobuf field <code>string etag = 7;</code>
     */
    private $etag = '';
    /**
     * Optional. If not set, use the monitoring_config defined for the EntityType this
     * Feature belongs to.
     * Only Features with type ([Feature.ValueType][google.cloud.aiplatform.v1.Feature.ValueType]) BOOL, STRING, DOUBLE or
     * INT64 can enable monitoring.
     * If set to true, all types of data monitoring are disabled despite the
     * config on EntityType.
     *
     * Generated from protobuf field <code>bool disable_monitoring = 12 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $disable_monitoring = false;
    /**
     * Output only. The list of historical stats and anomalies with specified objectives.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.v1.Feature.MonitoringStatsAnomaly monitoring_stats_anomalies = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $monitoring_stats_anomalies;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Immutable. Name of the Feature.
     *           Format:
     *           `projects/{project}/locations/{location}/featurestores/{featurestore}/entityTypes/{entity_type}/features/{feature}`
     *           The last part feature is assigned by the client. The feature can be up to
     *           64 characters long and can consist only of ASCII Latin letters A-Z and a-z,
     *           underscore(_), and ASCII digits 0-9 starting with a letter. The value will
     *           be unique given an entity type.
     *     @type string $description
     *           Description of the Feature.
     *     @type int $value_type
     *           Required. Immutable. Type of Feature value.
     *     @type \Google\Protobuf\Timestamp $create_time
     *           Output only. Timestamp when this EntityType was created.
     *     @type \Google\Protobuf\Timestamp $update_time
     *           Output only. Timestamp when this EntityType was most recently updated.
     *     @type array|\Google\Protobuf\Internal\MapField $labels
     *           Optional. The labels with user-defined metadata to organize your Features.
     *           Label keys and values can be no longer than 64 characters
     *           (Unicode codepoints), can only contain lowercase letters, numeric
     *           characters, underscores and dashes. International characters are allowed.
     *           See https://goo.gl/xmQnxf for more information on and examples of labels.
     *           No more than 64 user labels can be associated with one Feature (System
     *           labels are excluded)."
     *           System reserved label keys are prefixed with "aiplatform.googleapis.com/"
     *           and are immutable.
     *     @type string $etag
     *           Used to perform a consistent read-modify-write updates. If not set, a blind
     *           "overwrite" update happens.
     *     @type bool $disable_monitoring
     *           Optional. If not set, use the monitoring_config defined for the EntityType this
     *           Feature belongs to.
     *           Only Features with type ([Feature.ValueType][google.cloud.aiplatform.v1.Feature.ValueType]) BOOL, STRING, DOUBLE or
     *           INT64 can enable monitoring.
     *           If set to true, all types of data monitoring are disabled despite the
     *           config on EntityType.
     *     @type array<\Google\Cloud\AIPlatform\V1\Feature\MonitoringStatsAnomaly>|\Google\Protobuf\Internal\RepeatedField $monitoring_stats_anomalies
     *           Output only. The list of historical stats and anomalies with specified objectives.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\Feature::initOnce();
        parent::__construct($data);
    }

    /**
     * Immutable. Name of the Feature.
     * Format:
     * `projects/{project}/locations/{location}/featurestores/{featurestore}/entityTypes/{entity_type}/features/{feature}`
     * The last part feature is assigned by the client. The feature can be up to
     * 64 characters long and can consist only of ASCII Latin letters A-Z and a-z,
     * underscore(_), and ASCII digits 0-9 starting with a letter. The value will
     * be unique given an entity type.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Immutable. Name of the Feature.
     * Format:
     * `projects/{project}/locations/{location}/featurestores/{featurestore}/entityTypes/{entity_type}/features/{feature}`
     * The last part feature is assigned by the client. The feature can be up to
     * 64 characters long and can consist only of ASCII Latin letters A-Z and a-z,
     * underscore(_), and ASCII digits 0-9 starting with a letter. The value will
     * be unique given an entity type.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param string $var
     * @return $this
     */
    public function setName($var)
    {
        GPBUtil::checkString($var, True);
        $this->name = $var;

        return $this;
    }

    /**
     * Description of the Feature.
     *
     * Generated from protobuf field <code>string description = 2;</code>
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Description of the Feature.
     *
     * Generated from protobuf field <code>string description = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setDescription($var)
    {
        GPBUtil::checkString($var, True);
        $this->description = $var;

        return $this;
    }

    /**
     * Required. Immutable. Type of Feature value.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.Feature.ValueType value_type = 3 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @return int
     */
    public function getValueType()
    {
        return $this->value_type;
    }

    /**
     * Required. Immutable. Type of Feature value.
     *
     * Generated from protobuf field <code>.google.cloud.aiplatform.v1.Feature.ValueType value_type = 3 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @param int $var
     * @return $this
     */
    public function setValueType($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\AIPlatform\V1\Feature\ValueType::class);
        $this->value_type = $var;

        return $this;
    }

    /**
     * Output only. Timestamp when this EntityType was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getCreateTime()
    {
        return $this->create_time;
    }

    public function hasCreateTime()
    {
        return isset($this->create_time);
    }

    public function clearCreateTime()
    {
        unset($this->create_time);
    }

    /**
     * Output only. Timestamp when this EntityType was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 4 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setCreateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->create_time = $var;

        return $this;
    }

    /**
     * Output only. Timestamp when this EntityType was most recently updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getUpdateTime()
    {
        return $this->update_time;
    }

    public function hasUpdateTime()
    {
        return isset($this->update_time);
    }

    public function clearUpdateTime()
    {
        unset($this->update_time);
    }

    /**
     * Output only. Timestamp when this EntityType was most recently updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 5 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setUpdateTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->update_time = $var;

        return $this;
    }

    /**
     * Optional. The labels with user-defined metadata to organize your Features.
     * Label keys and values can be no longer than 64 characters
     * (Unicode codepoints), can only contain lowercase letters, numeric
     * characters, underscores and dashes. International characters are allowed.
     * See https://goo.gl/xmQnxf for more information on and examples of labels.
     * No more than 64 user labels can be associated with one Feature (System
     * labels are excluded)."
     * System reserved label keys are prefixed with "aiplatform.googleapis.com/"
     * and are immutable.
     *
     * Generated from protobuf field <code>map<string, string> labels = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Optional. The labels with user-defined metadata to organize your Features.
     * Label keys and values can be no longer than 64 characters
     * (Unicode codepoints), can only contain lowercase letters, numeric
     * characters, underscores and dashes. International characters are allowed.
     * See https://goo.gl/xmQnxf for more information on and examples of labels.
     * No more than 64 user labels can be associated with one Feature (System
     * labels are excluded)."
     * System reserved label keys are prefixed with "aiplatform.googleapis.com/"
     * and are immutable.
     *
     * Generated from protobuf field <code>map<string, string> labels = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
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
     * Used to perform a consistent read-modify-write updates. If not set, a blind
     * "overwrite" update happens.
     *
     * Generated from protobuf field <code>string etag = 7;</code>
     * @return string
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * Used to perform a consistent read-modify-write updates. If not set, a blind
     * "overwrite" update happens.
     *
     * Generated from protobuf field <code>string etag = 7;</code>
     * @param string $var
     * @return $this
     */
    public function setEtag($var)
    {
        GPBUtil::checkString($var, True);
        $this->etag = $var;

        return $this;
    }

    /**
     * Optional. If not set, use the monitoring_config defined for the EntityType this
     * Feature belongs to.
     * Only Features with type ([Feature.ValueType][google.cloud.aiplatform.v1.Feature.ValueType]) BOOL, STRING, DOUBLE or
     * INT64 can enable monitoring.
     * If set to true, all types of data monitoring are disabled despite the
     * config on EntityType.
     *
     * Generated from protobuf field <code>bool disable_monitoring = 12 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return bool
     */
    public function getDisableMonitoring()
    {
        return $this->disable_monitoring;
    }

    /**
     * Optional. If not set, use the monitoring_config defined for the EntityType this
     * Feature belongs to.
     * Only Features with type ([Feature.ValueType][google.cloud.aiplatform.v1.Feature.ValueType]) BOOL, STRING, DOUBLE or
     * INT64 can enable monitoring.
     * If set to true, all types of data monitoring are disabled despite the
     * config on EntityType.
     *
     * Generated from protobuf field <code>bool disable_monitoring = 12 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param bool $var
     * @return $this
     */
    public function setDisableMonitoring($var)
    {
        GPBUtil::checkBool($var);
        $this->disable_monitoring = $var;

        return $this;
    }

    /**
     * Output only. The list of historical stats and anomalies with specified objectives.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.v1.Feature.MonitoringStatsAnomaly monitoring_stats_anomalies = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getMonitoringStatsAnomalies()
    {
        return $this->monitoring_stats_anomalies;
    }

    /**
     * Output only. The list of historical stats and anomalies with specified objectives.
     *
     * Generated from protobuf field <code>repeated .google.cloud.aiplatform.v1.Feature.MonitoringStatsAnomaly monitoring_stats_anomalies = 11 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<\Google\Cloud\AIPlatform\V1\Feature\MonitoringStatsAnomaly>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setMonitoringStatsAnomalies($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\AIPlatform\V1\Feature\MonitoringStatsAnomaly::class);
        $this->monitoring_stats_anomalies = $arr;

        return $this;
    }

}

