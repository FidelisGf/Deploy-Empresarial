<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/cloud/contactcenterinsights/v1/contact_center_insights.proto

namespace GPBMetadata\Google\Cloud\Contactcenterinsights\V1;

class ContactCenterInsights
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
        \GPBMetadata\Google\Cloud\Contactcenterinsights\V1\Resources::initOnce();
        \GPBMetadata\Google\Longrunning\Operations::initOnce();
        \GPBMetadata\Google\Protobuf\Duration::initOnce();
        \GPBMetadata\Google\Protobuf\GPBEmpty::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        \GPBMetadata\Google\Rpc\Status::initOnce();
        $pool->internalAddGeneratedFile(
            '
Ӂ
Cgoogle/cloud/contactcenterinsights/v1/contact_center_insights.proto%google.cloud.contactcenterinsights.v1google/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.proto5google/cloud/contactcenterinsights/v1/resources.proto#google/longrunning/operations.protogoogle/protobuf/duration.protogoogle/protobuf/empty.proto google/protobuf/field_mask.protogoogle/protobuf/timestamp.protogoogle/rpc/status.proto"d
CalculateStatsRequest;
location (	B)�A�A#
!locations.googleapis.com/Location
filter (	"�

CalculateStatsResponse3
average_duration (2.google.protobuf.Duration
average_turn_count (
conversation_count (}
smart_highlighter_matches (2Z.google.cloud.contactcenterinsights.v1.CalculateStatsResponse.SmartHighlighterMatchesEntry
custom_highlighter_matches (2[.google.cloud.contactcenterinsights.v1.CalculateStatsResponse.CustomHighlighterMatchesEntryj
issue_matches (2O.google.cloud.contactcenterinsights.v1.CalculateStatsResponse.IssueMatchesEntryBq
issue_matches_stats (2T.google.cloud.contactcenterinsights.v1.CalculateStatsResponse.IssueMatchesStatsEntryp
conversation_count_time_series (2H.google.cloud.contactcenterinsights.v1.CalculateStatsResponse.TimeSeries�

TimeSeries4
interval_duration (2.google.protobuf.Durationa
points (2Q.google.cloud.contactcenterinsights.v1.CalculateStatsResponse.TimeSeries.IntervalV
Interval.

start_time (2.google.protobuf.Timestamp
conversation_count (>
SmartHighlighterMatchesEntry
key (	
value (:8?
CustomHighlighterMatchesEntry
key (	
value (:83
IssueMatchesEntry
key (	
value (:8�
IssueMatchesStatsEntry
key (	U
value (2F.google.cloud.contactcenterinsights.v1.IssueModelLabelStats.IssueStats:8"�
CreateAnalysisOperationMetadata4
create_time (2.google.protobuf.TimestampB�A1
end_time (2.google.protobuf.TimestampB�AO
conversation (	B9�A�A3
1contactcenterinsights.googleapis.com/Conversation"�
CreateConversationRequest9
parent (	B)�A�A#
!locations.googleapis.com/LocationN
conversation (23.google.cloud.contactcenterinsights.v1.ConversationB�A
conversation_id (	"�
ListConversationsRequest9
parent (	B)�A�A#
!locations.googleapis.com/Location
	page_size (

page_token (	
filter (	E
view (27.google.cloud.contactcenterinsights.v1.ConversationView"�
ListConversationsResponseJ
conversations (23.google.cloud.contactcenterinsights.v1.Conversation
next_page_token (	"�
GetConversationRequestG
name (	B9�A�A3
1contactcenterinsights.googleapis.com/ConversationE
view (27.google.cloud.contactcenterinsights.v1.ConversationView"�
UpdateConversationRequestN
conversation (23.google.cloud.contactcenterinsights.v1.ConversationB�A/
update_mask (2.google.protobuf.FieldMask"s
DeleteConversationRequestG
name (	B9�A�A3
1contactcenterinsights.googleapis.com/Conversation
force ("�
CreateAnalysisRequestI
parent (	B9�A�A3
1contactcenterinsights.googleapis.com/ConversationF
analysis (2/.google.cloud.contactcenterinsights.v1.AnalysisB�A"�
ListAnalysesRequestI
parent (	B9�A�A3
1contactcenterinsights.googleapis.com/Conversation
	page_size (

page_token (	
filter (	"r
ListAnalysesResponseA
analyses (2/.google.cloud.contactcenterinsights.v1.Analysis
next_page_token (	"Y
GetAnalysisRequestC
name (	B5�A�A/
-contactcenterinsights.googleapis.com/Analysis"\\
DeleteAnalysisRequestC
name (	B5�A�A/
-contactcenterinsights.googleapis.com/Analysis"�
ExportInsightsDataRequestu
big_query_destination (2T.google.cloud.contactcenterinsights.v1.ExportInsightsDataRequest.BigQueryDestinationH 9
parent (	B)�A�A#
!locations.googleapis.com/Location
filter (	
kms_key (	l
write_disposition (2Q.google.cloud.contactcenterinsights.v1.ExportInsightsDataRequest.WriteDispositionN
BigQueryDestination

project_id (	
dataset (	B�A
table (	"[
WriteDisposition!
WRITE_DISPOSITION_UNSPECIFIED 
WRITE_TRUNCATE
WRITE_APPENDB
destination"�
ExportInsightsDataMetadata4
create_time (2.google.protobuf.TimestampB�A1
end_time (2.google.protobuf.TimestampB�AQ
request (2@.google.cloud.contactcenterinsights.v1.ExportInsightsDataRequest*
partial_errors (2.google.rpc.Status"
ExportInsightsDataResponse"�
CreateIssueModelRequest9
parent (	B)�A�A#
!locations.googleapis.com/LocationK
issue_model (21.google.cloud.contactcenterinsights.v1.IssueModelB�A"�
CreateIssueModelMetadata4
create_time (2.google.protobuf.TimestampB�A1
end_time (2.google.protobuf.TimestampB�AO
request (2>.google.cloud.contactcenterinsights.v1.CreateIssueModelRequest"�
UpdateIssueModelRequestK
issue_model (21.google.cloud.contactcenterinsights.v1.IssueModelB�A/
update_mask (2.google.protobuf.FieldMask"S
ListIssueModelsRequest9
parent (	B)�A�A#
!locations.googleapis.com/Location"b
ListIssueModelsResponseG
issue_models (21.google.cloud.contactcenterinsights.v1.IssueModel"]
GetIssueModelRequestE
name (	B7�A�A1
/contactcenterinsights.googleapis.com/IssueModel"`
DeleteIssueModelRequestE
name (	B7�A�A1
/contactcenterinsights.googleapis.com/IssueModel"�
DeleteIssueModelMetadata4
create_time (2.google.protobuf.TimestampB�A1
end_time (2.google.protobuf.TimestampB�AO
request (2>.google.cloud.contactcenterinsights.v1.DeleteIssueModelRequest"`
DeployIssueModelRequestE
name (	B7�A�A1
/contactcenterinsights.googleapis.com/IssueModel"
DeployIssueModelResponse"�
DeployIssueModelMetadata4
create_time (2.google.protobuf.TimestampB�A1
end_time (2.google.protobuf.TimestampB�AO
request (2>.google.cloud.contactcenterinsights.v1.DeployIssueModelRequest"b
UndeployIssueModelRequestE
name (	B7�A�A1
/contactcenterinsights.googleapis.com/IssueModel"
UndeployIssueModelResponse"�
UndeployIssueModelMetadata4
create_time (2.google.protobuf.TimestampB�A1
end_time (2.google.protobuf.TimestampB�AQ
request (2@.google.cloud.contactcenterinsights.v1.UndeployIssueModelRequest"S
GetIssueRequest@
name (	B2�A�A,
*contactcenterinsights.googleapis.com/Issue"\\
ListIssuesRequestG
parent (	B7�A�A1
/contactcenterinsights.googleapis.com/IssueModel"R
ListIssuesResponse<
issues (2,.google.cloud.contactcenterinsights.v1.Issue"�
UpdateIssueRequest@
issue (2,.google.cloud.contactcenterinsights.v1.IssueB�A/
update_mask (2.google.protobuf.FieldMask"o
CalculateIssueModelStatsRequestL
issue_model (	B7�A�A1
/contactcenterinsights.googleapis.com/IssueModel"v
 CalculateIssueModelStatsResponseR
current_stats (2;.google.cloud.contactcenterinsights.v1.IssueModelLabelStats"�
CreatePhraseMatcherRequest9
parent (	B)�A�A#
!locations.googleapis.com/LocationQ
phrase_matcher (24.google.cloud.contactcenterinsights.v1.PhraseMatcherB�A"�
ListPhraseMatchersRequest9
parent (	B)�A�A#
!locations.googleapis.com/Location
	page_size (

page_token (	
filter (	"�
ListPhraseMatchersResponseM
phrase_matchers (24.google.cloud.contactcenterinsights.v1.PhraseMatcher
next_page_token (	"c
GetPhraseMatcherRequestH
name (	B:�A�A4
2contactcenterinsights.googleapis.com/PhraseMatcher"f
DeletePhraseMatcherRequestH
name (	B:�A�A4
2contactcenterinsights.googleapis.com/PhraseMatcher"�
UpdatePhraseMatcherRequestQ
phrase_matcher (24.google.cloud.contactcenterinsights.v1.PhraseMatcherB�A/
update_mask (2.google.protobuf.FieldMask"Y
GetSettingsRequestC
name (	B5�A�A/
-contactcenterinsights.googleapis.com/Settings"�
UpdateSettingsRequestF
settings (2/.google.cloud.contactcenterinsights.v1.SettingsB�A4
update_mask (2.google.protobuf.FieldMaskB�A"�
CreateViewRequest9
parent (	B)�A�A#
!locations.googleapis.com/Location>
view (2+.google.cloud.contactcenterinsights.v1.ViewB�A"Q
GetViewRequest?
name (	B1�A�A+
)contactcenterinsights.googleapis.com/View"t
ListViewsRequest9
parent (	B)�A�A#
!locations.googleapis.com/Location
	page_size (

page_token (	"h
ListViewsResponse:
views (2+.google.cloud.contactcenterinsights.v1.View
next_page_token (	"�
UpdateViewRequest>
view (2+.google.cloud.contactcenterinsights.v1.ViewB�A/
update_mask (2.google.protobuf.FieldMask"T
DeleteViewRequest?
name (	B1�A�A+
)contactcenterinsights.googleapis.com/View*J
ConversationView!
CONVERSATION_VIEW_UNSPECIFIED 
FULL	
BASIC2�:
ContactCenterInsights�
CreateConversation@.google.cloud.contactcenterinsights.v1.CreateConversationRequest3.google.cloud.contactcenterinsights.v1.Conversation"m���A"1/v1/{parent=projects/*/locations/*}/conversations:conversation�A#parent,conversation,conversation_id�
UpdateConversation@.google.cloud.contactcenterinsights.v1.UpdateConversationRequest3.google.cloud.contactcenterinsights.v1.Conversation"o���N2>/v1/{conversation.name=projects/*/locations/*/conversations/*}:conversation�Aconversation,update_mask�
GetConversation=.google.cloud.contactcenterinsights.v1.GetConversationRequest3.google.cloud.contactcenterinsights.v1.Conversation"@���31/v1/{name=projects/*/locations/*/conversations/*}�Aname�
ListConversations?.google.cloud.contactcenterinsights.v1.ListConversationsRequest@.google.cloud.contactcenterinsights.v1.ListConversationsResponse"B���31/v1/{parent=projects/*/locations/*}/conversations�Aparent�
DeleteConversation@.google.cloud.contactcenterinsights.v1.DeleteConversationRequest.google.protobuf.Empty"@���3*1/v1/{name=projects/*/locations/*/conversations/*}�Aname�
CreateAnalysis<.google.cloud.contactcenterinsights.v1.CreateAnalysisRequest.google.longrunning.Operation"����H"</v1/{parent=projects/*/locations/*/conversations/*}/analyses:analysis�Aparent,analysis�A+
AnalysisCreateAnalysisOperationMetadata�
GetAnalysis9.google.cloud.contactcenterinsights.v1.GetAnalysisRequest/.google.cloud.contactcenterinsights.v1.Analysis"K���></v1/{name=projects/*/locations/*/conversations/*/analyses/*}�Aname�
ListAnalyses:.google.cloud.contactcenterinsights.v1.ListAnalysesRequest;.google.cloud.contactcenterinsights.v1.ListAnalysesResponse"M���></v1/{parent=projects/*/locations/*/conversations/*}/analyses�Aparent�
DeleteAnalysis<.google.cloud.contactcenterinsights.v1.DeleteAnalysisRequest.google.protobuf.Empty"K���>*</v1/{name=projects/*/locations/*/conversations/*/analyses/*}�Aname�
ExportInsightsData@.google.cloud.contactcenterinsights.v1.ExportInsightsDataRequest.google.longrunning.Operation"����<"7/v1/{parent=projects/*/locations/*}/insightsdata:export:*�Aparent�A8
ExportInsightsDataResponseExportInsightsDataMetadata�
CreateIssueModel>.google.cloud.contactcenterinsights.v1.CreateIssueModelRequest.google.longrunning.Operation"����>"//v1/{parent=projects/*/locations/*}/issueModels:issue_model�Aparent,issue_model�A&

IssueModelCreateIssueModelMetadata�
UpdateIssueModel>.google.cloud.contactcenterinsights.v1.UpdateIssueModelRequest1.google.cloud.contactcenterinsights.v1.IssueModel"j���J2;/v1/{issue_model.name=projects/*/locations/*/issueModels/*}:issue_model�Aissue_model,update_mask�
GetIssueModel;.google.cloud.contactcenterinsights.v1.GetIssueModelRequest1.google.cloud.contactcenterinsights.v1.IssueModel">���1//v1/{name=projects/*/locations/*/issueModels/*}�Aname�
ListIssueModels=.google.cloud.contactcenterinsights.v1.ListIssueModelsRequest>.google.cloud.contactcenterinsights.v1.ListIssueModelsResponse"@���1//v1/{parent=projects/*/locations/*}/issueModels�Aparent�
DeleteIssueModel>.google.cloud.contactcenterinsights.v1.DeleteIssueModelRequest.google.longrunning.Operation"r���1*//v1/{name=projects/*/locations/*/issueModels/*}�Aname�A1
google.protobuf.EmptyDeleteIssueModelMetadata�
DeployIssueModel>.google.cloud.contactcenterinsights.v1.DeployIssueModelRequest.google.longrunning.Operation"���;"6/v1/{name=projects/*/locations/*/issueModels/*}:deploy:*�Aname�A4
DeployIssueModelResponseDeployIssueModelMetadata�
UndeployIssueModel@.google.cloud.contactcenterinsights.v1.UndeployIssueModelRequest.google.longrunning.Operation"����="8/v1/{name=projects/*/locations/*/issueModels/*}:undeploy:*�Aname�A8
UndeployIssueModelResponseUndeployIssueModelMetadata�
GetIssue6.google.cloud.contactcenterinsights.v1.GetIssueRequest,.google.cloud.contactcenterinsights.v1.Issue"G���:8/v1/{name=projects/*/locations/*/issueModels/*/issues/*}�Aname�

ListIssues8.google.cloud.contactcenterinsights.v1.ListIssuesRequest9.google.cloud.contactcenterinsights.v1.ListIssuesResponse"I���:8/v1/{parent=projects/*/locations/*/issueModels/*}/issues�Aparent�
UpdateIssue9.google.cloud.contactcenterinsights.v1.UpdateIssueRequest,.google.cloud.contactcenterinsights.v1.Issue"a���G2>/v1/{issue.name=projects/*/locations/*/issueModels/*/issues/*}:issue�Aissue,update_mask�
CalculateIssueModelStatsF.google.cloud.contactcenterinsights.v1.CalculateIssueModelStatsRequestG.google.cloud.contactcenterinsights.v1.CalculateIssueModelStatsResponse"e���QO/v1/{issue_model=projects/*/locations/*/issueModels/*}:calculateIssueModelStats�Aissue_model�
CreatePhraseMatcherA.google.cloud.contactcenterinsights.v1.CreatePhraseMatcherRequest4.google.cloud.contactcenterinsights.v1.PhraseMatcher"b���D"2/v1/{parent=projects/*/locations/*}/phraseMatchers:phrase_matcher�Aparent,phrase_matcher�
GetPhraseMatcher>.google.cloud.contactcenterinsights.v1.GetPhraseMatcherRequest4.google.cloud.contactcenterinsights.v1.PhraseMatcher"A���42/v1/{name=projects/*/locations/*/phraseMatchers/*}�Aname�
ListPhraseMatchers@.google.cloud.contactcenterinsights.v1.ListPhraseMatchersRequestA.google.cloud.contactcenterinsights.v1.ListPhraseMatchersResponse"C���42/v1/{parent=projects/*/locations/*}/phraseMatchers�Aparent�
DeletePhraseMatcherA.google.cloud.contactcenterinsights.v1.DeletePhraseMatcherRequest.google.protobuf.Empty"A���4*2/v1/{name=projects/*/locations/*/phraseMatchers/*}�Aname�
UpdatePhraseMatcherA.google.cloud.contactcenterinsights.v1.UpdatePhraseMatcherRequest4.google.cloud.contactcenterinsights.v1.PhraseMatcher"v���S2A/v1/{phrase_matcher.name=projects/*/locations/*/phraseMatchers/*}:phrase_matcher�Aphrase_matcher,update_mask�
CalculateStats<.google.cloud.contactcenterinsights.v1.CalculateStatsRequest=.google.cloud.contactcenterinsights.v1.CalculateStatsResponse"U���DB/v1/{location=projects/*/locations/*}/conversations:calculateStats�Alocation�
GetSettings9.google.cloud.contactcenterinsights.v1.GetSettingsRequest/.google.cloud.contactcenterinsights.v1.Settings"9���,*/v1/{name=projects/*/locations/*/settings}�Aname�
UpdateSettings<.google.cloud.contactcenterinsights.v1.UpdateSettingsRequest/.google.cloud.contactcenterinsights.v1.Settings"\\���?23/v1/{settings.name=projects/*/locations/*/settings}:settings�Asettings,update_mask�

CreateView8.google.cloud.contactcenterinsights.v1.CreateViewRequest+.google.cloud.contactcenterinsights.v1.View"E���1")/v1/{parent=projects/*/locations/*}/views:view�Aparent,view�
GetView5.google.cloud.contactcenterinsights.v1.GetViewRequest+.google.cloud.contactcenterinsights.v1.View"8���+)/v1/{name=projects/*/locations/*/views/*}�Aname�
	ListViews7.google.cloud.contactcenterinsights.v1.ListViewsRequest8.google.cloud.contactcenterinsights.v1.ListViewsResponse":���+)/v1/{parent=projects/*/locations/*}/views�Aparent�

UpdateView8.google.cloud.contactcenterinsights.v1.UpdateViewRequest+.google.cloud.contactcenterinsights.v1.View"O���62./v1/{view.name=projects/*/locations/*/views/*}:view�Aview,update_mask�

DeleteView8.google.cloud.contactcenterinsights.v1.DeleteViewRequest.google.protobuf.Empty"8���+*)/v1/{name=projects/*/locations/*/views/*}�AnameX�A$contactcenterinsights.googleapis.com�A.https://www.googleapis.com/auth/cloud-platformB�
)com.google.cloud.contactcenterinsights.v1BContactCenterInsightsProtoPZZgoogle.golang.org/genproto/googleapis/cloud/contactcenterinsights/v1;contactcenterinsights�%Google.Cloud.ContactCenterInsights.V1�%Google\\Cloud\\ContactCenterInsights\\V1�(Google::Cloud::ContactCenterInsights::V1bproto3'
        , true);

        static::$is_initialized = true;
    }
}

