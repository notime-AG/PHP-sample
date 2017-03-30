<?php
// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';

$request = new Http_Request2('https://v1.notimeapi.com/api/CheckService/?groupGuid={groupGuid}&postCode_Pickup={postCode_Pickup}&postCode_Dropoff={postCode_Dropoff}');
$url = $request->getUrl();
$subscriptionKey = 'your_subscription_key';
$groupGuid = 'your_group_guid';
$postCode_Pickup = '8003';
$postCode_Dropoff = '8004';

$headers = array(
    // Request headers
    'Ocp-Apim-Subscription-Key' => $subscriptionKey,
);

$request->setHeader($headers);

$parameters = array(
    // Request parameters
    'groupGuid' => $groupGuid,
    'postCode_Pickup' => $postCode_Pickup,
    'postCode_Dropoff' => $postCode_Dropoff
);

$url->setQueryVariables($parameters);

$request->setMethod(HTTP_Request2::METHOD_GET);

try
{
    $response = $request->send();
    echo $response->getBody();
}
catch (HttpException $ex)
{
    echo $ex;
}

?>