<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/aiplatform/v1/explanation.proto

namespace Google\Cloud\AIPlatform\V1\FeatureNoiseSigma;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Noise sigma for a single feature.
 *
 * Generated from protobuf message <code>google.cloud.aiplatform.v1.FeatureNoiseSigma.NoiseSigmaForFeature</code>
 */
class NoiseSigmaForFeature extends \Google\Protobuf\Internal\Message
{
    /**
     * The name of the input feature for which noise sigma is provided. The
     * features are defined in
     * [explanation metadata inputs][google.cloud.aiplatform.v1.ExplanationMetadata.inputs].
     *
     * Generated from protobuf field <code>string name = 1;</code>
     */
    private $name = '';
    /**
     * This represents the standard deviation of the Gaussian kernel that will
     * be used to add noise to the feature prior to computing gradients. Similar
     * to [noise_sigma][google.cloud.aiplatform.v1.SmoothGradConfig.noise_sigma] but represents the
     * noise added to the current feature. Defaults to 0.1.
     *
     * Generated from protobuf field <code>float sigma = 2;</code>
     */
    private $sigma = 0.0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           The name of the input feature for which noise sigma is provided. The
     *           features are defined in
     *           [explanation metadata inputs][google.cloud.aiplatform.v1.ExplanationMetadata.inputs].
     *     @type float $sigma
     *           This represents the standard deviation of the Gaussian kernel that will
     *           be used to add noise to the feature prior to computing gradients. Similar
     *           to [noise_sigma][google.cloud.aiplatform.v1.SmoothGradConfig.noise_sigma] but represents the
     *           noise added to the current feature. Defaults to 0.1.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Aiplatform\V1\Explanation::initOnce();
        parent::__construct($data);
    }

    /**
     * The name of the input feature for which noise sigma is provided. The
     * features are defined in
     * [explanation metadata inputs][google.cloud.aiplatform.v1.ExplanationMetadata.inputs].
     *
     * Generated from protobuf field <code>string name = 1;</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * The name of the input feature for which noise sigma is provided. The
     * features are defined in
     * [explanation metadata inputs][google.cloud.aiplatform.v1.ExplanationMetadata.inputs].
     *
     * Generated from protobuf field <code>string name = 1;</code>
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
     * This represents the standard deviation of the Gaussian kernel that will
     * be used to add noise to the feature prior to computing gradients. Similar
     * to [noise_sigma][google.cloud.aiplatform.v1.SmoothGradConfig.noise_sigma] but represents the
     * noise added to the current feature. Defaults to 0.1.
     *
     * Generated from protobuf field <code>float sigma = 2;</code>
     * @return float
     */
    public function getSigma()
    {
        return $this->sigma;
    }

    /**
     * This represents the standard deviation of the Gaussian kernel that will
     * be used to add noise to the feature prior to computing gradients. Similar
     * to [noise_sigma][google.cloud.aiplatform.v1.SmoothGradConfig.noise_sigma] but represents the
     * noise added to the current feature. Defaults to 0.1.
     *
     * Generated from protobuf field <code>float sigma = 2;</code>
     * @param float $var
     * @return $this
     */
    public function setSigma($var)
    {
        GPBUtil::checkFloat($var);
        $this->sigma = $var;

        return $this;
    }

}


