<?php
// This sample uses the Apache HTTP client from HTTP Components (http://hc.apache.org/httpcomponents-client-ga/)
require_once 'HTTP/Request2.php';

$request = new Http_Request2('https://v1.notimeapi.com/api/shipment');
$url = $request->getUrl();

$subscriptionKey = 'your_subscription_key';

$headers = array(
    'Content-Type' => 'application/json',
    'Ocp-Apim-Subscription-Key' => $subscriptionKey,
);

$body = '{
"GroupGuid": "your_group_guid",
"PickupDate":"2016-03-23",
"PickupTimeFrom":"13:43:10Z",
"PickupTimeTo":"13:44:10Z",
"DropoffTimeFrom":"13:45:10Z",
"DropoffTimeTo":"13:46:10Z",
"PaymentInfo":"Bar",
"PaymentType":1,
"Fee":7.00,
"Note":"Test Note",
"ShipmentType": 100,
"ASAP": true,
"Labels": ["Test", "Test2"],
"Pickup":
{
"Name":"Bar",
"Phone":"+41987654321",
"City":"Z\u00fcrich",
"CountryCode":"CH",
"Postcode":"8004",
"Streetaddress":"Badenerstrasse 97",
"Labels": ["Test", "Test2"]
},
"Dropoff":
{"Name":"notime AG",
"Phone":"+41-44 520 86 34",
"City":"Z\u00fcrich",
"CountryCode":"CH",
"Postcode":"8003",
"Streetaddress":"Birmensdorferstrasse 94"
},
"Products":
[{
"Reference":"prodref01",
"Name":"Test Product",
"Fee":14.00,
"Quantity":1,
"ImageUrl": "http://test.com/image.png",
"Type": 100,
"Labels": ["Test"]
}],
"Parcels":
[{
"ParcelNumber":"01",
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