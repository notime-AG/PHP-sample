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
   "ShipmentGuid":"AA465025-0795-4938-8C1E-6FFC0ECD6EC6",
   "Action":8,
   "Param":{  
      "ServiceId":"3492052A-8FBB-43EF-ABD0-184F7D144BE3",
      "Date":"2017-05-09"
   },
   "Location":{  
      "City":"Z\u00fcrich",
      "CountryCode":"CH",
      "Postcode":"8005",
      "Streetaddress":"Giessereistrasse 18"
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