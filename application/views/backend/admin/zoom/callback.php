<?php
// print_r("hi");
// var_dump();
$this->load->helper('zoom_oauth_helper');  
// require_once 'zoom_oauth_helper.php';
  
// var_dump($code);
// $client = new http\Client;
// $request = new http\Client\Request;

// $request->setRequestUrl('https://api.zoom.us/v2/users');
// $request->setRequestMethod('GET');
// $request->setQuery(new http\QueryString(array(
//   'page_number' => '1',
//   'page_size' => '30',
//   'status' => 'active'
// )));

// $request->setHeaders(array(
//   'authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6InZlVmFjM1pUUV8tT3JTR1hRaDNvUEEiLCJleHAiOjE1ODczNDU4NTUsImlhdCI6MTU4NzM0MDQ1NX0.UP9SEMsrh10zBfwrIyAeo-pMyOlRYVqXMhW4TGZemM0'
// ));

// $client->enqueue($request)->send();
// $response = $client->getResponse();

// echo $response->getBody();



try {
    $client = new GuzzleHttp\Client(['base_uri' => 'https://zoom.us']);
  print(REDIRECT_URI);
    $response = $client->request('POST', '/oauth/token', [
        "headers" => [
            "Authorization" => "Basic ". base64_encode(CLIENT_ID.':'.CLIENT_SECRET)
        ],
        'form_params' => [
            "grant_type" => "authorization_code",
            "code" => "TXIdST2FSlaWmoCV3KPS5A",//$_GET['code'],
            "redirect_uri" => REDIRECT_URI
        ],
    ]);
  
    $token = json_decode($response->getBody()->getContents(), true);
  
    $db = new DB();
    $db->update_access_token(json_encode($token));
    echo "Access token inserted successfully.";
} catch(Exception $e) {
    echo $e->getMessage();
}