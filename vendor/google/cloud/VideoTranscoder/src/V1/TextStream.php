<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/video/transcoder/v1/resources.proto

namespace Google\Cloud\Video\Transcoder\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Encoding of a text stream. For example, closed captions or subtitles.
 *
 * Generated from protobuf message <code>google.cloud.video.transcoder.v1.TextStream</code>
 */
class TextStream extends \Google\Protobuf\Internal\Message
{
    /**
     * The codec for this text stream. The default is `webvtt`.
     * Supported text codecs:
     * - `srt`
     * - `ttml`
     * - `cea608`
     * - `cea708`
     * - `webvtt`
     *
     * Generated from protobuf field <code>string codec = 1;</code>
     */
    private $codec = '';
    /**
     * The mapping for the `Job.edit_list` atoms with text `EditAtom.inputs`.
     *
     * Generated from protobuf field <code>repeated .google.cloud.video.transcoder.v1.TextStream.TextMapping mapping = 3;</code>
     */
    private $mapping;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $codec
     *           The codec for this text stream. The default is `webvtt`.
     *           Supported text codecs:
     *           - `srt`
     *           - `ttml`
     *           - `cea608`
     *           - `cea708`
     *           - `webvtt`
     *     @type array<\Google\Cloud\Video\Transcoder\V1\TextStream\TextMapping>|\Google\Protobuf\Internal\RepeatedField $mapping
     *           The mapping for the `Job.edit_list` atoms with text `EditAtom.inputs`.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Cloud\Video\Transcoder\V1\Resources::initOnce();
        parent::__construct($data);
    }

    /**
     * The codec for this text stream. The default is `webvtt`.
     * Supported text codecs:
     * - `srt`
     * - `ttml`
     * - `cea608`
     * - `cea708`
     * - `webvtt`
     *
     * Generated from protobuf field <code>string codec = 1;</code>
     * @return string
     */
    public function getCodec()
    {
        return $this->codec;
    }

    /**
     * The codec for this text stream. The default is `webvtt`.
     * Supported text codecs:
     * - `srt`
     * - `ttml`
     * - `cea608`
     * - `cea708`
     * - `webvtt`
     *
     * Generated from protobuf field <code>string codec = 1;</code>
     * @param string $var
     * @return $this
     */
    public function setCodec($var)
    {
        GPBUtil::checkString($var, True);
        $this->codec = $var;

        return $this;
    }

    /**
     * The mapping for the `Job.edit_list` atoms with text `EditAtom.inputs`.
     *
     * Generated from protobuf field <code>repeated .google.cloud.video.transcoder.v1.TextStream.TextMapping mapping = 3;</code>
     * @return \Google\Protobuf\Internal\RepeatedField
     */
    public function getMapping()
    {
        return $this->mapping;
    }

    /**
     * The mapping for the `Job.edit_list` atoms with text `EditAtom.inputs`.
     *
     * Generated from protobuf field <code>repeated .google.cloud.video.transcoder.v1.TextStream.TextMapping mapping = 3;</code>
     * @param array<\Google\Cloud\Video\Transcoder\V1\TextStream\TextMapping>|\Google\Protobuf\Internal\RepeatedField $var
     * @return $this
     */
    public function setMapping($var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Video\Transcoder\V1\TextStream\TextMapping::class);
        $this->mapping = $arr;

        return $this;
    }

}

