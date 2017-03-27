<?php


namespace App\Http\Controllers\ContentLoader\CoreMainLoader;

interface ContentLoaderInterface
{

    public function __construct($SingleItem = null);

    public function execute();

    public function results();

}