<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/bigquery/dataexchange/v1beta1/dataexchange.proto

namespace Google\Cloud\BigQuery\DataExchange\V1beta1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Message for updating a data exchange.
 *
 * Generated from protobuf message <code>google.cloud.bigquery.dataexchange.v1beta1.UpdateDataExchangeRequest</code>
 */
class UpdateDataExchangeRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Field mask specifies the fields to update in the data exchange
     * resource. The fields specified in the
     * `updateMask` are relative to the resource and are not a full request.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $update_mask = null;
    /**
     * Required. The data exchange to update.
     *
     * Generated from protobuf field <code>.google.cloud.bigquery.dataexchange.v1beta1.DataExchange data_exchange = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $data_exchange = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type \Google\Protobuf\FieldMask $update_mask
     *           Required. Field mask specifies the fields to update in the data exchange
     *           resource. The fields specified in the
     *           `updateMask` are relative to the resource and are not a full request.
     *     @type \Google\Cloud\BigQuery\DataExchange\V1beta1\DataExchange $data_exchange
     *           Required. The data exchange to update.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Bigquery\Dataexchange\V1Beta1\Dataexchange::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Field mask specifies the fields to update in the data exchange
     * resource. The fields specified in the
     * `updateMask` are relative to the resource and are not a full request.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Protobuf\FieldMask|null
     */
    public function getUpdateMask()
    {
        return $this->update_mask;
    }

    public function hasUpdateMask()
    {
        return isset($this->update_mask);
    }

    public function clearUpdateMask()
    {
        unset($this->update_mask);
    }

    /**
     * Required. Field mask specifies the fields to update in the data exchange
     * resource. The fields specified in the
     * `updateMask` are relative to the resource and are not a full request.
     *
     * Generated from protobuf field <code>.google.protobuf.FieldMask update_mask = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Protobuf\FieldMask $var
     * @return $this
     */
    public function setUpdateMask($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\FieldMask::class);
        $this->update_mask = $var;

        return $this;
    }

    /**
     * Required. The data exchange to update.
     *
     * Generated from protobuf field <code>.google.cloud.bigquery.dataexchange.v1beta1.DataExchange data_exchange = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\BigQuery\DataExchange\V1beta1\DataExchange|null
     */
    public function getDataExchange()
    {
        return $this->data_exchange;
    }

    public function hasDataExchange()
    {
        return isset($this->data_exchange);
    }

    public function clearDataExchange()
    {
        unset($this->data_exchange);
    }

    /**
     * Required. The data exchange to update.
     *
     * Generated from protobuf field <code>.google.cloud.bigquery.dataexchange.v1beta1.DataExchange data_exchange = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\BigQuery\DataExchange\V1beta1\DataExchange $var
     * @return $this
     */
    public function setDataExchange($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\BigQuery\DataExchange\V1beta1\DataExchange::class);
        $this->data_exchange = $var;

        return $this;
    }

}

