<?php

namespace App\Classes\CustomerData;

use App\Models\Contact;
use App\Models\Country;
use \Ixudra\Curl\CurlService;

require "start.php";

class CustomerData
{

    public static function populateUsers()
    {
        $curl = new CurlService();
        $response = $curl->to(env('CUSTOMER_DATA_ENDPOINT'))
            ->asJson()
            ->get();
        $users = [];
        foreach ($response->objects as $item) {
            $users[] = [
                'job_title' => $item->job_title,
                'email' => $item->email,
                'first_name' => $item->first_name,
                'last_name' => $item->last_name,
                'document' => $item->document,
                'phone_number' => $item->phone_number,
                'country' => $item->country,
                'state' => $item->state,
                'city' => $item->city
            ];
        }
        Contact::insert($users);
    }

    public static function populateCountries()
    {
        $curl = new CurlService();
        $response = $curl->to(env('COUNTRY_DATA_ENDPOINT'))
            ->asJson()
            ->get();

        $countries = [];
        foreach ($response as $item) {
            $countries[] = [
                'name' => $item->name,
                'code' => $item->alpha2Code,
            ];
        }
        Country::insert($countries);
    }
}