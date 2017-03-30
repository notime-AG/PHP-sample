<?php
// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';

$request = new Http_Request2('https://v1.notimeapi.com/api/shipment/approve');
$url = $request->getUrl();

$subscriptionKey = 'your_subscription_key';

$headers = array(
    'Content-Type' => 'application/json',
    'Ocp-Apim-Subscription-Key' => $subscriptionKey,
);

$body = '{
"ShipmentId":"FDDBA08C-0B5F-48E4-AA84-801181F1EFB7",
"Reference":"order01",
"Dropoff":
{
"Name":"notime AG",
"Phone":"+41 44 508 48 48",
"ContactEmailAddress":"customer@gmail.com",
"City":"Z\u00fcrich",
"CountryCode":"CH",
"Postcode":"8003",
"Streetaddress":"Birmensdorferstrasse 94"
},
"Parcels":
[{
"ParcelNumber":"01",
"Barcode":"Unique value which is not used for another shipment",
"Size":"S",
"Weight": 0.5
}]
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