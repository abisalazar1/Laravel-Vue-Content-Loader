<?php
/*
 By Abi Salazar https://abisalazar.co.uk/ && https://development.abisalazar.co.uk/
 Available for use under the MIT License
 */
namespace App\Http\Controllers\ContentLoader;
use App\User;
use App\Http\Controllers\ContentLoader\CoreMainLoader\MainContentLoader;

class UserContentLoader extends MainContentLoader
{
    protected $Pagination = 4;



    public function execute()
    {
        return (new User())->newQuery();
    }
}