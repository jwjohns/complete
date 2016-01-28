<?php
// get csv file from tmp upload dir
$csv = $_FILES['csv']['tmp_name'];
// parse csv into array
$csvAsArray = array_map('str_getcsv', file($csv));

$gps = array();

$columns = array(
    $_POST['col1'],
    $_POST['col2'],
    $_POST['col3'],
    $_POST['col4'],
    $_POST['col5']
);

$streetIndex = array_search('Street', $columns);
$cityIndex = array_search('City', $columns);
$stateIndex = array_search('State', $columns);
$catIndex = array_search('Category', $columns);

$categories = array("test"=>'value');

foreach ($csvAsArray as $key => $value) {
    // loop through each row in the csv, parse the values
    $address = $value[$streetIndex] . ' ' . $value[$cityIndex] . ', ' . $value[$stateIndex];
    $category = $value[$catIndex];

    $coords = geocode($address);
    $lat = $coords['lat'];
    $lon = $coords['lon'];
    $gps[$key]['lat'] = $lat;
    $gps[$key]['lon'] = $lon;
    // gets the color based on a truncated md5 hex of the category
    $gps[$key]['img'] = substr(md5($category), 0, 6);
    // the google maps geocode api has a 10 req/sec limit, so a delay between each loop prevents 
    // the code from failing
    usleep(100000);
}

echo json_encode($gps);

//echo json_encode($csvAsArray); 

// TODO

// GEOCODE ADDRESSES IN THE LOOP LIKELY IN THIS PAGE

// RETURN DATA FORMATTED DIRECTLY FOR MAP MARKERS FROM THIS PAGE
// function to geocode address, it will return false if unable to geocode address


function geocode($address){

    // url encode the address
    $address = urlencode($address);

    // google map geocode api url
    $url = "http://maps.google.com/maps/api/geocode/json?address={$address}";

    // get the json response
    $resp_json = file_get_contents($url);

    // decode the json
    $resp = json_decode($resp_json, true);

    // response status will be 'OK', if able to geocode given address 
    if ($resp['status']=='OK') {

        // get the important data
        $lati = $resp['results'][0]['geometry']['location']['lat'];
        $longi = $resp['results'][0]['geometry']['location']['lng'];

        // verify if data is complete
        if ($lati && $longi) {

            // put the data in the array
            $data_arr = array();            
            $data_arr['lat'] = $lati;
            $data_arr['lon'] = $longi;

            return $data_arr;

        } else {
            return false;
        }

    } else {
        return false;
    }
}
