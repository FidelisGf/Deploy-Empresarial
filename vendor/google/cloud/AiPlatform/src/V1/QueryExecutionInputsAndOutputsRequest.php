<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/metadata_service.proto

namespace Google\Cloud\AIPlatform\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for [MetadataService.QueryExecutionInputsAndOutputs][google.cloud.aiplatform.v1.MetadataService.QueryExecutionInputsAndOutputs].
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.QueryExecutionInputsAndOutputsRequest</code>
 */
class QueryExecutionInputsAndOutputsRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The resource name of the Execution whose input and output Artifacts should
     * be retrieved as a LineageSubgraph.
     * Format:
     * `projects/{project}/locations/{location}/metadataStores/{metadatastore}/executions/{execution}`
     *
     * Generated from protobuf field <code>string execution = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $execution = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $execution
     *           Required. The resource name of the Execution whose input and output Artifacts should
     *           be retrieved as a LineageSubgraph.
     *           Format:
     *           `projects/{project}/locations/{location}/metadataStores/{metadatastore}/executions/{execution}`
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\MetadataService::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The resource name of the Execution whose input and output Artifacts should
     * be retrieved as a LineageSubgraph.
     * Format:
     * `projects/{project}/locations/{location}/metadataStores/{metadatastore}/executions/{execution}`
     *
     * Generated from protobuf field <code>string execution = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getExecution()
    {
        return $this->execution;
    }

    /**
     * Required. The resource name of the Execution whose input and output Artifacts should
     * be retrieved as a LineageSubgraph.
     * Format:
     * `projects/{project}/locations/{location}/metadataStores/{metadatastore}/executions/{execution}`
     *
     * Generated from protobuf field <code>string execution = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setExecution($var)
    {
        GPBUtil::checkString($var, True);
        $this->execution = $var;

        return $this;
    }

}

