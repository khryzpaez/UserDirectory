<?php
use Illuminate\Database\Capsule\Manager as Capsule;
Capsule::schema()->create('contacts', function ($table) {

    $table->increments('id');

    $table->string('job_title');
    $table->string('email')->unique();
    $table->string('first_name');
    $table->string('last_name');
    $table->string('document');
    $table->string('phone_number');
    $table->string('country');
    $table->string('state');
    $table->string('city');

});