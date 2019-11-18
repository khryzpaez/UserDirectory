<?php
use Illuminate\Database\Capsule\Manager as Capsule;
Capsule::schema()->create('users', function ($table) {

    $table->increments('id');

    $table->string('name');
    $table->string('document');
    $table->string('email')->unique();
    $table->string('password');
    $table->integer('country_id');
    $table->timestamps();

    $table->foreign('country_id')->references('id')->on('countries');

});