<?php
// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';

$request = new Http_Request2('https://v1.notimeapi.com/api/shipment/{shipmentGuid}/cancel');
$url = $request->getUrl();
$subscriptionKey = 'your_subscription_key';
$shipmentGuid = 'your_shipment_guid';

$headers = array(
    'Ocp-Apim-Subscription-Key' => $subscriptionKey
);

$request->setHeader($headers);

$parameters = array(
    'shipmentGuid' => $shipmentGuid
);

$url->setQueryVariables($parameters);

$request->setMethod(HTTP_Request2::METHOD_PUT);

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