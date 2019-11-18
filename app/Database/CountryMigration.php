<?php
use Illuminate\Database\Capsule\Manager as Capsule;
Capsule::schema()->create('countries', function ($table) {
    $table->increments('id');

    $table->string('name');
    $table->string('code')->unique();

});