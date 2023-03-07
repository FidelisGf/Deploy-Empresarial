<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/iot/v1/device_manager.proto

namespace GPBMetadata\Google\Cloud\Iot\V1;

class DeviceManager
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Cloud\Iot\V1\Resources::initOnce();
        \GPBMetadata\Google\Iam\V1\IamPolicy::initOnce();
        \GPBMetadata\Google\Iam\V1\Policy::initOnce();
        \GPBMetadata\Google\Protobuf\GPBEmpty::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        $pool->internalAddGeneratedFile(
            '
�?
(google/cloud/iot/v1/device_manager.protogoogle.cloud.iot.v1google/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto#google/cloud/iot/v1/resources.protogoogle/iam/v1/iam_policy.protogoogle/iam/v1/policy.protogoogle/protobuf/empty.proto google/protobuf/field_mask.proto"�
CreateDeviceRegistryRequest9
parent (	B)�A�A#
!locations.googleapis.com/LocationA
device_registry (2#.google.cloud.iot.v1.DeviceRegistryB�A"R
GetDeviceRegistryRequest6
name (	B(�A�A"
 cloudiot.googleapis.com/Registry"U
DeleteDeviceRegistryRequest6
name (	B(�A�A"
 cloudiot.googleapis.com/Registry"�
UpdateDeviceRegistryRequestA
device_registry (2#.google.cloud.iot.v1.DeviceRegistryB�A4
update_mask (2.google.protobuf.FieldMaskB�A"
ListDeviceRegistriesRequest9
parent (	B)�A�A#
!locations.googleapis.com/Location
	page_size (

page_token (	"w
ListDeviceRegistriesResponse>
device_registries (2#.google.cloud.iot.v1.DeviceRegistry
next_page_token (	"�
CreateDeviceRequest8
parent (	B(�A�A"
 cloudiot.googleapis.com/Registry0
device (2.google.cloud.iot.v1.DeviceB�A"x
GetDeviceRequest4
name (	B&�A�A 
cloudiot.googleapis.com/Device.

field_mask (2.google.protobuf.FieldMask"}
UpdateDeviceRequest0
device (2.google.cloud.iot.v1.DeviceB�A4
update_mask (2.google.protobuf.FieldMaskB�A"K
DeleteDeviceRequest4
name (	B&�A�A 
cloudiot.googleapis.com/Device"�
ListDevicesRequest8
parent (	B(�A�A"
 cloudiot.googleapis.com/Registry
device_num_ids (

device_ids (	.

field_mask (2.google.protobuf.FieldMaskE
gateway_list_options (2\'.google.cloud.iot.v1.GatewayListOptions
	page_sized (

page_tokene (	"�
GatewayListOptions8
gateway_type (2 .google.cloud.iot.v1.GatewayTypeH !
associations_gateway_id (	H  
associations_device_id (	H B
filter"\\
ListDevicesResponse,
devices (2.google.cloud.iot.v1.Device
next_page_token (	"�
 ModifyCloudToDeviceConfigRequest4
name (	B&�A�A 
cloudiot.googleapis.com/Device
version_to_update (
binary_data (B�A"m
ListDeviceConfigVersionsRequest4
name (	B&�A�A 
cloudiot.googleapis.com/Device
num_versions ("]
 ListDeviceConfigVersionsResponse9
device_configs (2!.google.cloud.iot.v1.DeviceConfig"c
ListDeviceStatesRequest4
name (	B&�A�A 
cloudiot.googleapis.com/Device

num_states ("S
ListDeviceStatesResponse7
device_states (2 .google.cloud.iot.v1.DeviceState"
SendCommandToDeviceRequest4
name (	B&�A�A 
cloudiot.googleapis.com/Device
binary_data (B�A
	subfolder (	"
SendCommandToDeviceResponse"�
BindDeviceToGatewayRequest8
parent (	B(�A�A"
 cloudiot.googleapis.com/Registry

gateway_id (	B�A
	device_id (	B�A"
BindDeviceToGatewayResponse"�
UnbindDeviceFromGatewayRequest8
parent (	B(�A�A"
 cloudiot.googleapis.com/Registry

gateway_id (	B�A
	device_id (	B�A"!
UnbindDeviceFromGatewayResponse2�&
DeviceManager�
CreateDeviceRegistry0.google.cloud.iot.v1.CreateDeviceRegistryRequest#.google.cloud.iot.v1.DeviceRegistry"`���A"./v1/{parent=projects/*/locations/*}/registries:device_registry�Aparent,device_registry�
GetDeviceRegistry-.google.cloud.iot.v1.GetDeviceRegistryRequest#.google.cloud.iot.v1.DeviceRegistry"=���0./v1/{name=projects/*/locations/*/registries/*}�Aname�
UpdateDeviceRegistry0.google.cloud.iot.v1.UpdateDeviceRegistryRequest#.google.cloud.iot.v1.DeviceRegistry"u���Q2>/v1/{device_registry.name=projects/*/locations/*/registries/*}:device_registry�Adevice_registry,update_mask�
DeleteDeviceRegistry0.google.cloud.iot.v1.DeleteDeviceRegistryRequest.google.protobuf.Empty"=���0*./v1/{name=projects/*/locations/*/registries/*}�Aname�
ListDeviceRegistries0.google.cloud.iot.v1.ListDeviceRegistriesRequest1.google.cloud.iot.v1.ListDeviceRegistriesResponse"?���0./v1/{parent=projects/*/locations/*}/registries�Aparent�
CreateDevice(.google.cloud.iot.v1.CreateDeviceRequest.google.cloud.iot.v1.Device"X���B"8/v1/{parent=projects/*/locations/*/registries/*}/devices:device�Aparent,device�
	GetDevice%.google.cloud.iot.v1.GetDeviceRequest.google.cloud.iot.v1.Device"����8/v1/{name=projects/*/locations/*/registries/*/devices/*}ZCA/v1/{name=projects/*/locations/*/registries/*/groups/*/devices/*}�Aname�
UpdateDevice(.google.cloud.iot.v1.UpdateDeviceRequest.google.cloud.iot.v1.Device"�����2?/v1/{device.name=projects/*/locations/*/registries/*/devices/*}:deviceZR2H/v1/{device.name=projects/*/locations/*/registries/*/groups/*/devices/*}:device�Adevice,update_mask�
DeleteDevice(.google.cloud.iot.v1.DeleteDeviceRequest.google.protobuf.Empty"G���:*8/v1/{name=projects/*/locations/*/registries/*/devices/*}�Aname�
ListDevices\'.google.cloud.iot.v1.ListDevicesRequest(.google.cloud.iot.v1.ListDevicesResponse"����8/v1/{parent=projects/*/locations/*/registries/*}/devicesZCA/v1/{parent=projects/*/locations/*/registries/*/groups/*}/devices�Aparent�
ModifyCloudToDeviceConfig5.google.cloud.iot.v1.ModifyCloudToDeviceConfigRequest!.google.cloud.iot.v1.DeviceConfig"�����"R/v1/{name=projects/*/locations/*/registries/*/devices/*}:modifyCloudToDeviceConfig:*Z`"[/v1/{name=projects/*/locations/*/registries/*/groups/*/devices/*}:modifyCloudToDeviceConfig:*�Aname,binary_data�
ListDeviceConfigVersions4.google.cloud.iot.v1.ListDeviceConfigVersionsRequest5.google.cloud.iot.v1.ListDeviceConfigVersionsResponse"�����G/v1/{name=projects/*/locations/*/registries/*/devices/*}/configVersionsZRP/v1/{name=projects/*/locations/*/registries/*/groups/*/devices/*}/configVersions�Aname�
ListDeviceStates,.google.cloud.iot.v1.ListDeviceStatesRequest-.google.cloud.iot.v1.ListDeviceStatesResponse"�����?/v1/{name=projects/*/locations/*/registries/*/devices/*}/statesZJH/v1/{name=projects/*/locations/*/registries/*/groups/*/devices/*}/states�Aname�
SetIamPolicy".google.iam.v1.SetIamPolicyRequest.google.iam.v1.Policy"�����"?/v1/{resource=projects/*/locations/*/registries/*}:setIamPolicy:*ZM"H/v1/{resource=projects/*/locations/*/registries/*/groups/*}:setIamPolicy:*�Aresource,policy�
GetIamPolicy".google.iam.v1.GetIamPolicyRequest.google.iam.v1.Policy"�����"?/v1/{resource=projects/*/locations/*/registries/*}:getIamPolicy:*ZM"H/v1/{resource=projects/*/locations/*/registries/*/groups/*}:getIamPolicy:*�Aresource�
TestIamPermissions(.google.iam.v1.TestIamPermissionsRequest).google.iam.v1.TestIamPermissionsResponse"�����"E/v1/{resource=projects/*/locations/*/registries/*}:testIamPermissions:*ZS"N/v1/{resource=projects/*/locations/*/registries/*/groups/*}:testIamPermissions:*�Aresource,permissions�
SendCommandToDevice/.google.cloud.iot.v1.SendCommandToDeviceRequest0.google.cloud.iot.v1.SendCommandToDeviceResponse"�����"L/v1/{name=projects/*/locations/*/registries/*/devices/*}:sendCommandToDevice:*ZZ"U/v1/{name=projects/*/locations/*/registries/*/groups/*/devices/*}:sendCommandToDevice:*�Aname,binary_data�Aname,binary_data,subfolder�
BindDeviceToGateway/.google.cloud.iot.v1.BindDeviceToGatewayRequest0.google.cloud.iot.v1.BindDeviceToGatewayResponse"�����"D/v1/{parent=projects/*/locations/*/registries/*}:bindDeviceToGateway:*ZR"M/v1/{parent=projects/*/locations/*/registries/*/groups/*}:bindDeviceToGateway:*�Aparent,gateway_id,device_id�
UnbindDeviceFromGateway3.google.cloud.iot.v1.UnbindDeviceFromGatewayRequest4.google.cloud.iot.v1.UnbindDeviceFromGatewayResponse"�����"H/v1/{parent=projects/*/locations/*/registries/*}:unbindDeviceFromGateway:*ZV"Q/v1/{parent=projects/*/locations/*/registries/*/groups/*}:unbindDeviceFromGateway:*�Aparent,gateway_id,device_idt�Acloudiot.googleapis.com�AWhttps://www.googleapis.com/auth/cloud-platform,https://www.googleapis.com/auth/cloudiotBj
com.google.cloud.iot.v1BDeviceManagerProtoPZ6google.golang.org/genproto/googleapis/cloud/iot/v1;iot�bproto3'
        , true);

        static::$is_initialized = true;
    }
}

