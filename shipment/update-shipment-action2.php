<?php
// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';

$request = new Http_Request2('https://v1.notimeapi.com/api/shipment/update');
$url = $request->getUrl();

$subscriptionKey = 'your_subscription_key';

$headers = array(
    'Content-Type' => 'application/json',
    'Ocp-Apim-Subscription-Key' => $subscriptionKey,
);

$body = '{ 
"ShipmentGuid" : "534efae5-8425-4b4b-85f4-c162470d8952",
"Action": "2",
"Param": 
{
"TimeWindowGuid": "A59EDEC0-2280-429F-97AE-63AD0E55F762"
}
}';

$request->setHeader($headers);
$request->setMethod(HTTP_Request2::METHOD_POST);
$request->setBody($body);

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