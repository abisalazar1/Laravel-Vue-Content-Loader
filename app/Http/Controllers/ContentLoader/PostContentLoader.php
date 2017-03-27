<?php
/*
 By Abi Salazar https://abisalazar.co.uk/ && https://development.abisalazar.co.uk/
 Available for use under the MIT License
 */
namespace App\Http\Controllers\ContentLoader;

use App\Http\Controllers\ContentLoader\CoreMainLoader\MainContentLoader;
use App\User;

class PostContentLoader extends MainContentLoader
{
    function execute()
    {
        return (new User())->newQuery();
    }
}