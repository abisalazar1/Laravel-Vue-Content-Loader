<?php
/**
 * Created by PhpStorm.
 * User: abisalazar
 * Date: 27/03/2017
 * Time: 17:03
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