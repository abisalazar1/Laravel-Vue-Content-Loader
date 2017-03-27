<?php

/*
 By Abi Salazar https://abisalazar.co.uk/ && https://development.abisalazar.co.uk/
 Available for use under the MIT License
 */
namespace App\Http\Controllers\ContentLoader\CoreMainLoader;

interface ContentLoaderInterface
{

    public function __construct($SingleItem = null);

    public function execute();

    public function results();

}