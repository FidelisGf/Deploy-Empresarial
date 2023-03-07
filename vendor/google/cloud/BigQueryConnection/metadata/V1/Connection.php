<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/bigquery/connection/v1/connection.proto

namespace GPBMetadata\Google\Cloud\Bigquery\Connection\V1;

class Connection
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
        \GPBMetadata\Google\Iam\V1\IamPolicy::initOnce();
        \GPBMetadata\Google\Iam\V1\Policy::initOnce();
        \GPBMetadata\Google\Protobuf\GPBEmpty::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        $pool->internalAddGeneratedFile(
            '
�&
4google/cloud/bigquery/connection/v1/connection.proto#google.cloud.bigquery.connection.v1google/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/iam/v1/iam_policy.protogoogle/iam/v1/policy.protogoogle/protobuf/empty.proto google/protobuf/field_mask.proto"�
CreateConnectionRequest9
parent (	B)�A�A#
!locations.googleapis.com/Location
connection_id (	B�AH

connection (2/.google.cloud.bigquery.connection.v1.ConnectionB�A"Z
GetConnectionRequestB
name (	B4�A�A.
,bigqueryconnection.googleapis.com/Connection"
ListConnectionsRequest9
parent (	B)�A�A#
!locations.googleapis.com/Location
	page_size (B�A

page_token (	"x
ListConnectionsResponse
next_page_token (	D
connections (2/.google.cloud.bigquery.connection.v1.Connection"�
UpdateConnectionRequestB
name (	B4�A�A.
,bigqueryconnection.googleapis.com/ConnectionH

connection (2/.google.cloud.bigquery.connection.v1.ConnectionB�A4
update_mask (2.google.protobuf.FieldMaskB�A"]
DeleteConnectionRequestB
name (	B4�A�A.
,bigqueryconnection.googleapis.com/Connection"�

Connection
name (	
friendly_name (	
description (	L
	cloud_sql (27.google.cloud.bigquery.connection.v1.CloudSqlPropertiesH A
aws (22.google.cloud.bigquery.connection.v1.AwsPropertiesH E
azure (24.google.cloud.bigquery.connection.v1.AzurePropertiesH T
cloud_spanner (2;.google.cloud.bigquery.connection.v1.CloudSpannerPropertiesH V
cloud_resource (2<.google.cloud.bigquery.connection.v1.CloudResourcePropertiesH 
creation_time (B�A
last_modified_time (B�A
has_credential (B�A:s�Ap
,bigqueryconnection.googleapis.com/Connection@projects/{project}/locations/{location}/connections/{connection}B

properties"�
CloudSqlProperties
instance_id (	
database (	R
type (2D.google.cloud.bigquery.connection.v1.CloudSqlProperties.DatabaseTypeP

credential (27.google.cloud.bigquery.connection.v1.CloudSqlCredentialB�A
service_account_id (	B�A"F
DatabaseType
DATABASE_TYPE_UNSPECIFIED 
POSTGRES	
MYSQL"8
CloudSqlCredential
username (	
password (	"C
CloudSpannerProperties
database (	
use_parallelism ("�
AwsPropertiesZ
cross_account_role (28.google.cloud.bigquery.connection.v1.AwsCrossAccountRoleBH I
access_role (22.google.cloud.bigquery.connection.v1.AwsAccessRoleH B
authentication_method"^
AwsCrossAccountRole
iam_role_id (	
iam_user_id (	B�A
external_id (	B�A"6
AwsAccessRole
iam_role_id (	
identity (	"�
AzureProperties
application (	B�A
	client_id (	B�A
	object_id (	B�A
customer_tenant_id (	
redirect_uri (	\'
federated_application_client_id (	
identity (	B�A":
CloudResourceProperties
service_account_id (	B�A2�
ConnectionService�
CreateConnection<.google.cloud.bigquery.connection.v1.CreateConnectionRequest/.google.cloud.bigquery.connection.v1.Connection"e���="//v1/{parent=projects/*/locations/*}/connections:
connection�Aparent,connection,connection_id�
GetConnection9.google.cloud.bigquery.connection.v1.GetConnectionRequest/.google.cloud.bigquery.connection.v1.Connection">���1//v1/{name=projects/*/locations/*/connections/*}�Aname�
ListConnections;.google.cloud.bigquery.connection.v1.ListConnectionsRequest<.google.cloud.bigquery.connection.v1.ListConnectionsResponse"@���1//v1/{parent=projects/*/locations/*}/connections�Aparent�
UpdateConnection<.google.cloud.bigquery.connection.v1.UpdateConnectionRequest/.google.cloud.bigquery.connection.v1.Connection"a���=2//v1/{name=projects/*/locations/*/connections/*}:
connection�Aname,connection,update_mask�
DeleteConnection<.google.cloud.bigquery.connection.v1.DeleteConnectionRequest.google.protobuf.Empty">���1*//v1/{name=projects/*/locations/*/connections/*}�Aname�
GetIamPolicy".google.iam.v1.GetIamPolicyRequest.google.iam.v1.Policy"^���E"@/v1/{resource=projects/*/locations/*/connections/*}:getIamPolicy:*�Aresource,options�
SetIamPolicy".google.iam.v1.SetIamPolicyRequest.google.iam.v1.Policy"]���E"@/v1/{resource=projects/*/locations/*/connections/*}:setIamPolicy:*�Aresource,policy�
TestIamPermissions(.google.iam.v1.TestIamPermissionsRequest).google.iam.v1.TestIamPermissionsResponse"h���K"F/v1/{resource=projects/*/locations/*/connections/*}:testIamPermissions:*�Aresource,permissions~�A!bigqueryconnection.googleapis.com�AWhttps://www.googleapis.com/auth/bigquery,https://www.googleapis.com/auth/cloud-platformB�
\'com.google.cloud.bigquery.connection.v1PZMgoogle.golang.org/genproto/googleapis/cloud/bigquery/connection/v1;connection�#Google.Cloud.BigQuery.Connection.V1�#Google\\Cloud\\BigQuery\\Connection\\V1bproto3'
        , true);

        static::$is_initialized = true;
    }
}

