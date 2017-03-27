<?php
/**
 * Created by PhpStorm.
 * User: abisalazar
 * Date: 25/03/2017
 * Time: 09:43
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