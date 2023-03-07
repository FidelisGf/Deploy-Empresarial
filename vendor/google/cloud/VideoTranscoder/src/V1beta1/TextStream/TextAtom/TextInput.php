<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/video/transcoder/v1beta1/resources.proto

namespace Google\Cloud\Video\Transcoder\V1beta1\TextStream\TextAtom;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Identifies which input file and track should be used.
 *
 * Generated from protobuf message <code>google.cloud.video.transcoder.v1beta1.TextStream.TextAtom.TextInput</code>
 */
class TextInput extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The `Input.key` that identifies the input file.
     *
     * Generated from protobuf field <code>string key = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $key = '';
    /**
     * Required. The zero-based index of the track in the input file.
     *
     * Generated from protobuf field <code>int32 track = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $track = 0;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $key
     *           Required. The `Input.key` that identifies the input file.
     *     @type int $track
     *           Required. The zero-based index of the track in the input file.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Video\Transcoder\V1Beta1\Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. The `Input.key` that identifies the input file.
     *
     * Generated from protobuf field <code>string key = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * Required. The `Input.key` that identifies the input file.
     *
     * Generated from protobuf field <code>string key = 1 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setKey($var)
    {
        GPBUtil::checkString($var, True);
        $this->key = $var;

        return $this;
    }

    /**
     * Required. The zero-based index of the track in the input file.
     *
     * Generated from protobuf field <code>int32 track = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return int
     */
    public function getTrack()
    {
        return $this->track;
    }

    /**
     * Required. The zero-based index of the track in the input file.
     *
     * Generated from protobuf field <code>int32 track = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param int $var
     * @return $this
     */
    public function setTrack($var)
    {
        GPBUtil::checkInt32($var);
        $this->track = $var;

        return $this;
    }

}


