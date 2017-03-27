<?php
/*
 By Abi Salazar https://abisalazar.co.uk/ && https://development.abisalazar.co.uk/
 Available for use under the MIT License
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