<?php
// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';

$request = new Http_Request2('https://v1.notimeapi.com/api/shipment/id?groupGuid={groupGuid}&reference={reference}');
$url = $request->getUrl();
$subscriptionKey = 'your_subscription_key';
$groupGuid = 'your_group_guid';
$reference = 'your_shipment_reference';

// Possibe values are 1: German 2: English 3: French
$language = '1';

// Applicable range is 1..14
$countDays = '3';

$headers = array(
    // Request headers
    'Ocp-Apim-Subscription-Key' => $subscriptionKey,
);

$request->setHeader($headers);

$parameters = array(
    // Request parameters
    'groupGuid' => $groupGuid,
    'reference' => $reference
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