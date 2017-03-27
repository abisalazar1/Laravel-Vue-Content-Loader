<?php
/**
 * Created by PhpStorm.
 * User: abisalazar
 * Date: 25/03/2017
 * Time: 09:44
 */

namespace App\Http\Controllers\ContentLoader\CoreMainLoader;

abstract class MainContentLoader implements ContentLoaderInterface
{
    protected $SingleItem;
    protected $Pagination = 10;

    public function __construct($SingleItem = null)
    {
        $this->SingleItem = $SingleItem;
    }

    abstract function execute();


    public function results(){
        return $this->execute()->paginate($this->Pagination);
    }
}