<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/security/privateca/v1/resources.proto

namespace Google\Cloud\Security\PrivateCA\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * A [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] represents an individual Certificate Authority.
 * A [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] can be used to create [Certificates][google.cloud.security.privateca.v1.Certificate].
 *
 * Generated from protobuf message <code>google.cloud.security.privateca.v1.CertificateAuthority</code>
 */
class CertificateAuthority extends \Google\Protobuf\Internal\Message
{
    /**
     * Output only. The resource name for this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] in the
     * format `projects/&#42;&#47;locations/&#42;&#47;caPools/&#42;&#47;certificateAuthorities/&#42;`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $name = '';
    /**
     * Required. Immutable. The [Type][google.cloud.security.privateca.v1.CertificateAuthority.Type] of this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority].
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.CertificateAuthority.Type type = 2 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     */
    private $type = 0;
    /**
     * Required. Immutable. The config used to create a self-signed X.509 certificate or CSR.
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.CertificateConfig config = 3 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     */
    private $config = null;
    /**
     * Required. Immutable. The desired lifetime of the CA certificate. Used to create the
     * "not_before_time" and "not_after_time" fields inside an X.509
     * certificate.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration lifetime = 4 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     */
    private $lifetime = null;
    /**
     * Required. Immutable. Used when issuing certificates for this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]. If this
     * [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] is a self-signed CertificateAuthority, this key
     * is also used to sign the self-signed CA certificate. Otherwise, it
     * is used to sign a CSR.
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.CertificateAuthority.KeyVersionSpec key_spec = 5 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     */
    private $key_spec = null;
    /**
     * Optional. If this is a subordinate [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority], this field will be set
     * with the subordinate configuration, which describes its issuers. This may
     * be updated, but this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] must continue to validate.
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.SubordinateConfig subordinate_config = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $subordinate_config = null;
    /**
     * Output only. The [CaPool.Tier][google.cloud.security.privateca.v1.CaPool.Tier] of the [CaPool][google.cloud.security.privateca.v1.CaPool] that includes this
     * [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority].
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.CaPool.Tier tier = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $tier = 0;
    /**
     * Output only. The [State][google.cloud.security.privateca.v1.CertificateAuthority.State] for this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority].
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.CertificateAuthority.State state = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $state = 0;
    /**
     * Output only. This [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]'s certificate chain, including the current
     * [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]'s certificate. Ordered such that the root issuer
     * is the final element (consistent with RFC 5246). For a self-signed CA, this
     * will only list the current [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]'s certificate.
     *
     * Generated from protobuf field <code>repeated string pem_ca_certificates = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $pem_ca_certificates;
    /**
     * Output only. A structured description of this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]'s CA certificate
     * and its issuers. Ordered as self-to-root.
     *
     * Generated from protobuf field <code>repeated .google.cloud.security.privateca.v1.CertificateDescription ca_certificate_descriptions = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $ca_certificate_descriptions;
    /**
     * Immutable. The name of a Cloud Storage bucket where this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] will
     * publish content, such as the CA certificate and CRLs. This must be a bucket
     * name, without any prefixes (such as `gs://`) or suffixes (such as
     * `.googleapis.com`). For example, to use a bucket named `my-bucket`, you
     * would simply specify `my-bucket`. If not specified, a managed bucket will
     * be created.
     *
     * Generated from protobuf field <code>string gcs_bucket = 11 [(.google.api.field_behavior) = IMMUTABLE];</code>
     */
    private $gcs_bucket = '';
    /**
     * Output only. URLs for accessing content published by this CA, such as the CA certificate
     * and CRLs.
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.CertificateAuthority.AccessUrls access_urls = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $access_urls = null;
    /**
     * Output only. The time at which this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $create_time = null;
    /**
     * Output only. The time at which this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] was last updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $update_time = null;
    /**
     * Output only. The time at which this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] was soft deleted, if
     * it is in the [DELETED][google.cloud.security.privateca.v1.CertificateAuthority.State.DELETED] state.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp delete_time = 15 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $delete_time = null;
    /**
     * Output only. The time at which this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] will be permanently purged,
     * if it is in the [DELETED][google.cloud.security.privateca.v1.CertificateAuthority.State.DELETED] state.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp expire_time = 16 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     */
    private $expire_time = null;
    /**
     * Optional. Labels with user-defined metadata.
     *
     * Generated from protobuf field <code>map<string, string> labels = 17 [(.google.api.field_behavior) = OPTIONAL];</code>
     */
    private $labels;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $name
     *           Output only. The resource name for this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] in the
     *           format `projects/&#42;&#47;locations/&#42;&#47;caPools/&#42;&#47;certificateAuthorities/&#42;`.
     *     @type int $type
     *           Required. Immutable. The [Type][google.cloud.security.privateca.v1.CertificateAuthority.Type] of this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority].
     *     @type \Google\Cloud\Security\PrivateCA\V1\CertificateConfig $config
     *           Required. Immutable. The config used to create a self-signed X.509 certificate or CSR.
     *     @type \Google\Protobuf\Duration $lifetime
     *           Required. Immutable. The desired lifetime of the CA certificate. Used to create the
     *           "not_before_time" and "not_after_time" fields inside an X.509
     *           certificate.
     *     @type \Google\Cloud\Security\PrivateCA\V1\CertificateAuthority\KeyVersionSpec $key_spec
     *           Required. Immutable. Used when issuing certificates for this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]. If this
     *           [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] is a self-signed CertificateAuthority, this key
     *           is also used to sign the self-signed CA certificate. Otherwise, it
     *           is used to sign a CSR.
     *     @type \Google\Cloud\Security\PrivateCA\V1\SubordinateConfig $subordinate_config
     *           Optional. If this is a subordinate [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority], this field will be set
     *           with the subordinate configuration, which describes its issuers. This may
     *           be updated, but this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] must continue to validate.
     *     @type int $tier
     *           Output only. The [CaPool.Tier][google.cloud.security.privateca.v1.CaPool.Tier] of the [CaPool][google.cloud.security.privateca.v1.CaPool] that includes this
     *           [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority].
     *     @type int $state
     *           Output only. The [State][google.cloud.security.privateca.v1.CertificateAuthority.State] for this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority].
     *     @type array<string>|\Google\Protobuf\Internal\RepeatedField $pem_ca_certificates
     *           Output only. This [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]'s certificate chain, including the current
     *           [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]'s certificate. Ordered such that the root issuer
     *           is the final element (consistent with RFC 5246). For a self-signed CA, this
     *           will only list the current [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]'s certificate.
     *     @type array<\Google\Cloud\Security\PrivateCA\V1\CertificateDescription>|\Google\Protobuf\Internal\RepeatedField $ca_certificate_descriptions
     *           Output only. A structured description of this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]'s CA certificate
     *           and its issuers. Ordered as self-to-root.
     *     @type string $gcs_bucket
     *           Immutable. The name of a Cloud Storage bucket where this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] will
     *           publish content, such as the CA certificate and CRLs. This must be a bucket
     *           name, without any prefixes (such as `gs://`) or suffixes (such as
     *           `.googleapis.com`). For example, to use a bucket named `my-bucket`, you
     *           would simply specify `my-bucket`. If not specified, a managed bucket will
     *           be created.
     *     @type \Google\Cloud\Security\PrivateCA\V1\CertificateAuthority\AccessUrls $access_urls
     *           Output only. URLs for accessing content published by this CA, such as the CA certificate
     *           and CRLs.
     *     @type \Google\Protobuf\Timestamp $create_time
     *           Output only. The time at which this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] was created.
     *     @type \Google\Protobuf\Timestamp $update_time
     *           Output only. The time at which this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] was last updated.
     *     @type \Google\Protobuf\Timestamp $delete_time
     *           Output only. The time at which this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] was soft deleted, if
     *           it is in the [DELETED][google.cloud.security.privateca.v1.CertificateAuthority.State.DELETED] state.
     *     @type \Google\Protobuf\Timestamp $expire_time
     *           Output only. The time at which this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] will be permanently purged,
     *           if it is in the [DELETED][google.cloud.security.privateca.v1.CertificateAuthority.State.DELETED] state.
     *     @type array|\Google\Protobuf\Internal\MapField $labels
     *           Optional. Labels with user-defined metadata.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Security\Privateca\V1\Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * Output only. The resource name for this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] in the
     * format `projects/&#42;&#47;locations/&#42;&#47;caPools/&#42;&#47;certificateAuthorities/&#42;`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Output only. The resource name for this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] in the
     * format `projects/&#42;&#47;locations/&#42;&#47;caPools/&#42;&#47;certificateAuthorities/&#42;`.
     *
     * Generated from protobuf field <code>string name = 1 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Required. Immutable. The [Type][google.cloud.security.privateca.v1.CertificateAuthority.Type] of this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority].
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.CertificateAuthority.Type type = 2 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Required. Immutable. The [Type][google.cloud.security.privateca.v1.CertificateAuthority.Type] of this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority].
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.CertificateAuthority.Type type = 2 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @param int $var
     * @return $this
     */
    public function setType($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Security\PrivateCA\V1\CertificateAuthority\Type::class);
        $this->type = $var;

        return $this;
    }

    /**
     * Required. Immutable. The config used to create a self-signed X.509 certificate or CSR.
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.CertificateConfig config = 3 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @return \Google\Cloud\Security\PrivateCA\V1\CertificateConfig|null
     */
    public function getConfig()
    {
        return $this->config;
    }

    public function hasConfig()
    {
        return isset($this->config);
    }

    public function clearConfig()
    {
        unset($this->config);
    }

    /**
     * Required. Immutable. The config used to create a self-signed X.509 certificate or CSR.
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.CertificateConfig config = 3 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @param \Google\Cloud\Security\PrivateCA\V1\CertificateConfig $var
     * @return $this
     */
    public function setConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Security\PrivateCA\V1\CertificateConfig::class);
        $this->config = $var;

        return $this;
    }

    /**
     * Required. Immutable. The desired lifetime of the CA certificate. Used to create the
     * "not_before_time" and "not_after_time" fields inside an X.509
     * certificate.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration lifetime = 4 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @return \Google\Protobuf\Duration|null
     */
    public function getLifetime()
    {
        return $this->lifetime;
    }

    public function hasLifetime()
    {
        return isset($this->lifetime);
    }

    public function clearLifetime()
    {
        unset($this->lifetime);
    }

    /**
     * Required. Immutable. The desired lifetime of the CA certificate. Used to create the
     * "not_before_time" and "not_after_time" fields inside an X.509
     * certificate.
     *
     * Generated from protobuf field <code>.google.protobuf.Duration lifetime = 4 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @param \Google\Protobuf\Duration $var
     * @return $this
     */
    public function setLifetime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Duration::class);
        $this->lifetime = $var;

        return $this;
    }

    /**
     * Required. Immutable. Used when issuing certificates for this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]. If this
     * [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] is a self-signed CertificateAuthority, this key
     * is also used to sign the self-signed CA certificate. Otherwise, it
     * is used to sign a CSR.
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.CertificateAuthority.KeyVersionSpec key_spec = 5 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @return \Google\Cloud\Security\PrivateCA\V1\CertificateAuthority\KeyVersionSpec|null
     */
    public function getKeySpec()
    {
        return $this->key_spec;
    }

    public function hasKeySpec()
    {
        return isset($this->key_spec);
    }

    public function clearKeySpec()
    {
        unset($this->key_spec);
    }

    /**
     * Required. Immutable. Used when issuing certificates for this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]. If this
     * [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] is a self-signed CertificateAuthority, this key
     * is also used to sign the self-signed CA certificate. Otherwise, it
     * is used to sign a CSR.
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.CertificateAuthority.KeyVersionSpec key_spec = 5 [(.google.api.field_behavior) = REQUIRED, (.google.api.field_behavior) = IMMUTABLE];</code>
     * @param \Google\Cloud\Security\PrivateCA\V1\CertificateAuthority\KeyVersionSpec $var
     * @return $this
     */
    public function setKeySpec($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Security\PrivateCA\V1\CertificateAuthority\KeyVersionSpec::class);
        $this->key_spec = $var;

        return $this;
    }

    /**
     * Optional. If this is a subordinate [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority], this field will be set
     * with the subordinate configuration, which describes its issuers. This may
     * be updated, but this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] must continue to validate.
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.SubordinateConfig subordinate_config = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Cloud\Security\PrivateCA\V1\SubordinateConfig|null
     */
    public function getSubordinateConfig()
    {
        return $this->subordinate_config;
    }

    public function hasSubordinateConfig()
    {
        return isset($this->subordinate_config);
    }

    public function clearSubordinateConfig()
    {
        unset($this->subordinate_config);
    }

    /**
     * Optional. If this is a subordinate [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority], this field will be set
     * with the subordinate configuration, which describes its issuers. This may
     * be updated, but this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] must continue to validate.
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.SubordinateConfig subordinate_config = 6 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param \Google\Cloud\Security\PrivateCA\V1\SubordinateConfig $var
     * @return $this
     */
    public function setSubordinateConfig($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Security\PrivateCA\V1\SubordinateConfig::class);
        $this->subordinate_config = $var;

        return $this;
    }

    /**
     * Output only. The [CaPool.Tier][google.cloud.security.privateca.v1.CaPool.Tier] of the [CaPool][google.cloud.security.privateca.v1.CaPool] that includes this
     * [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority].
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.CaPool.Tier tier = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getTier()
    {
        return $this->tier;
    }

    /**
     * Output only. The [CaPool.Tier][google.cloud.security.privateca.v1.CaPool.Tier] of the [CaPool][google.cloud.security.privateca.v1.CaPool] that includes this
     * [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority].
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.CaPool.Tier tier = 7 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setTier($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Security\PrivateCA\V1\CaPool\Tier::class);
        $this->tier = $var;

        return $this;
    }

    /**
     * Output only. The [State][google.cloud.security.privateca.v1.CertificateAuthority.State] for this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority].
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.CertificateAuthority.State state = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return int
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Output only. The [State][google.cloud.security.privateca.v1.CertificateAuthority.State] for this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority].
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.CertificateAuthority.State state = 8 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param int $var
     * @return $this
     */
    public function setState($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Security\PrivateCA\V1\CertificateAuthority\State::class);
        $this->state = $var;

        return $this;
    }

    /**
     * Output only. This [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]'s certificate chain, including the current
     * [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]'s certificate. Ordered such that the root issuer
     * is the final element (consistent with RFC 5246). For a self-signed CA, this
     * will only list the current [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]'s certificate.
     *
     * Generated from protobuf field <code>repeated string pem_ca_certificates = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getPemCaCertificates()
    {
        return $this->pem_ca_certificates;
    }

    /**
     * Output only. This [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]'s certificate chain, including the current
     * [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]'s certificate. Ordered such that the root issuer
     * is the final element (consistent with RFC 5246). For a self-signed CA, this
     * will only list the current [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]'s certificate.
     *
     * Generated from protobuf field <code>repeated string pem_ca_certificates = 9 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<string>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setPemCaCertificates($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::STRING);
        $this->pem_ca_certificates = $arr;

        return $this;
    }

    /**
     * Output only. A structured description of this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]'s CA certificate
     * and its issuers. Ordered as self-to-root.
     *
     * Generated from protobuf field <code>repeated .google.cloud.security.privateca.v1.CertificateDescription ca_certificate_descriptions = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getCaCertificateDescriptions()
    {
        return $this->ca_certificate_descriptions;
    }

    /**
     * Output only. A structured description of this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority]'s CA certificate
     * and its issuers. Ordered as self-to-root.
     *
     * Generated from protobuf field <code>repeated .google.cloud.security.privateca.v1.CertificateDescription ca_certificate_descriptions = 10 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param array<\Google\Cloud\Security\PrivateCA\V1\CertificateDescription>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setCaCertificateDescriptions($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Security\PrivateCA\V1\CertificateDescription::class);
        $this->ca_certificate_descriptions = $arr;

        return $this;
    }

    /**
     * Immutable. The name of a Cloud Storage bucket where this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] will
     * publish content, such as the CA certificate and CRLs. This must be a bucket
     * name, without any prefixes (such as `gs://`) or suffixes (such as
     * `.googleapis.com`). For example, to use a bucket named `my-bucket`, you
     * would simply specify `my-bucket`. If not specified, a managed bucket will
     * be created.
     *
     * Generated from protobuf field <code>string gcs_bucket = 11 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @return string
     */
    public function getGcsBucket()
    {
        return $this->gcs_bucket;
    }

    /**
     * Immutable. The name of a Cloud Storage bucket where this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] will
     * publish content, such as the CA certificate and CRLs. This must be a bucket
     * name, without any prefixes (such as `gs://`) or suffixes (such as
     * `.googleapis.com`). For example, to use a bucket named `my-bucket`, you
     * would simply specify `my-bucket`. If not specified, a managed bucket will
     * be created.
     *
     * Generated from protobuf field <code>string gcs_bucket = 11 [(.google.api.field_behavior) = IMMUTABLE];</code>
     * @param string $var
     * @return $this
     */
    public function setGcsBucket($var)
    {
        GPBUtil::checkString($var, True);
        $this->gcs_bucket = $var;

        return $this;
    }

    /**
     * Output only. URLs for accessing content published by this CA, such as the CA certificate
     * and CRLs.
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.CertificateAuthority.AccessUrls access_urls = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Cloud\Security\PrivateCA\V1\CertificateAuthority\AccessUrls|null
     */
    public function getAccessUrls()
    {
        return $this->access_urls;
    }

    public function hasAccessUrls()
    {
        return isset($this->access_urls);
    }

    public function clearAccessUrls()
    {
        unset($this->access_urls);
    }

    /**
     * Output only. URLs for accessing content published by this CA, such as the CA certificate
     * and CRLs.
     *
     * Generated from protobuf field <code>.google.cloud.security.privateca.v1.CertificateAuthority.AccessUrls access_urls = 12 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Cloud\Security\PrivateCA\V1\CertificateAuthority\AccessUrls $var
     * @return $this
     */
    public function setAccessUrls($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Security\PrivateCA\V1\CertificateAuthority\AccessUrls::class);
        $this->access_urls = $var;

        return $this;
    }

    /**
     * Output only. The time at which this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The time at which this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] was created.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp create_time = 13 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The time at which this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] was last updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The time at which this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] was last updated.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp update_time = 14 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
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
     * Output only. The time at which this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] was soft deleted, if
     * it is in the [DELETED][google.cloud.security.privateca.v1.CertificateAuthority.State.DELETED] state.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp delete_time = 15 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getDeleteTime()
    {
        return $this->delete_time;
    }

    public function hasDeleteTime()
    {
        return isset($this->delete_time);
    }

    public function clearDeleteTime()
    {
        unset($this->delete_time);
    }

    /**
     * Output only. The time at which this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] was soft deleted, if
     * it is in the [DELETED][google.cloud.security.privateca.v1.CertificateAuthority.State.DELETED] state.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp delete_time = 15 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setDeleteTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->delete_time = $var;

        return $this;
    }

    /**
     * Output only. The time at which this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] will be permanently purged,
     * if it is in the [DELETED][google.cloud.security.privateca.v1.CertificateAuthority.State.DELETED] state.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp expire_time = 16 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @return \Google\Protobuf\Timestamp|null
     */
    public function getExpireTime()
    {
        return $this->expire_time;
    }

    public function hasExpireTime()
    {
        return isset($this->expire_time);
    }

    public function clearExpireTime()
    {
        unset($this->expire_time);
    }

    /**
     * Output only. The time at which this [CertificateAuthority][google.cloud.security.privateca.v1.CertificateAuthority] will be permanently purged,
     * if it is in the [DELETED][google.cloud.security.privateca.v1.CertificateAuthority.State.DELETED] state.
     *
     * Generated from protobuf field <code>.google.protobuf.Timestamp expire_time = 16 [(.google.api.field_behavior) = OUTPUT_ONLY];</code>
     * @param \Google\Protobuf\Timestamp $var
     * @return $this
     */
    public function setExpireTime($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Timestamp::class);
        $this->expire_time = $var;

        return $this;
    }

    /**
     * Optional. Labels with user-defined metadata.
     *
     * Generated from protobuf field <code>map<string, string> labels = 17 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getLabels()
    {
        return $this->labels;
    }

    /**
     * Optional. Labels with user-defined metadata.
     *
     * Generated from protobuf field <code>map<string, string> labels = 17 [(.google.api.field_behavior) = OPTIONAL];</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setLabels($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::STRING);
        $this->labels = $arr;

        return $this;
    }

}

