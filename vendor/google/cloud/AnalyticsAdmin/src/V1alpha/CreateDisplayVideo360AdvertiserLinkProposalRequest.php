<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/analytics/admin/v1alpha/analytics_admin.proto

namespace Google\Analytics\Admin\V1alpha;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Request message for CreateDisplayVideo360AdvertiserLinkProposal RPC.
 *
 * Generated from protobuf message <code>google.analytics.admin.v1alpha.CreateDisplayVideo360AdvertiserLinkProposalRequest</code>
 */
class CreateDisplayVideo360AdvertiserLinkProposalRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. Example format: properties/1234
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $parent = '';
    /**
     * Required. The DisplayVideo360AdvertiserLinkProposal to create.
     *
     * Generated from protobuf field <code>.google.analytics.admin.v1alpha.DisplayVideo360AdvertiserLinkProposal display_video_360_advertiser_link_proposal = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $display_video_360_advertiser_link_proposal = null;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. Example format: properties/1234
     *     @type \Google\Analytics\Admin\V1alpha\DisplayVideo360AdvertiserLinkProposal $display_video_360_advertiser_link_proposal
     *           Required. The DisplayVideo360AdvertiserLinkProposal to create.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Analytics\Admin\V1Alpha\AnalyticsAdmin::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. Example format: properties/1234
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. Example format: properties/1234
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
     * Required. The DisplayVideo360AdvertiserLinkProposal to create.
     *
     * Generated from protobuf field <code>.google.analytics.admin.v1alpha.DisplayVideo360AdvertiserLinkProposal display_video_360_advertiser_link_proposal = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Analytics\Admin\V1alpha\DisplayVideo360AdvertiserLinkProposal|null
     */
    public function getDisplayVideo360AdvertiserLinkProposal()
    {
        return $this->display_video_360_advertiser_link_proposal;
    }

    public function hasDisplayVideo360AdvertiserLinkProposal()
    {
        return isset($this->display_video_360_advertiser_link_proposal);
    }

    public function clearDisplayVideo360AdvertiserLinkProposal()
    {
        unset($this->display_video_360_advertiser_link_proposal);
    }

    /**
     * Required. The DisplayVideo360AdvertiserLinkProposal to create.
     *
     * Generated from protobuf field <code>.google.analytics.admin.v1alpha.DisplayVideo360AdvertiserLinkProposal display_video_360_advertiser_link_proposal = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Analytics\Admin\V1alpha\DisplayVideo360AdvertiserLinkProposal $var
     * @return $this
     */
    public function setDisplayVideo360AdvertiserLinkProposal($var)
    {
        GPBUtil::checkMessage($var, \Google\Analytics\Admin\V1alpha\DisplayVideo360AdvertiserLinkProposal::class);
        $this->display_video_360_advertiser_link_proposal = $var;

        return $this;
    }

}

