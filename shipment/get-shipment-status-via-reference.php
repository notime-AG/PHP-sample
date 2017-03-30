<?php
// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';

$request = new Http_Request2('https://v1.notimeapi.com/api/shipment/{shipmentId}/status?languageid={languageId}&groupGuid={groupGuid}');
$url = $request->getUrl();
$subscriptionKey = 'your_subscription_key';
$shipmentReference = 'your_shipment_reference';
$groupGuid = 'your_group_guid';

$headers = array(
    // Request headers
    'Ocp-Apim-Subscription-Key' => $subscriptionKey,
);

$request->setHeader($headers);

$parameters = array(
    'shipmentId' => $shipmentReference,
    'groupGuid' => $groupGuid,
    'languageId' => '1'
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