<?php

class NumverifyApi {

    public function getCountryNameByNumber($phoneNumber) {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://apilayer.net/api/validate?access_key=ab4b2ff2746460b238b9f276b9e86ebc&number=' . $phoneNumber . '&country_code=&format=1');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);

        return json_decode($response, true);
    }
}