<?php


namespace App\Http\Controllers\ContentLoader\CoreMainLoader;

use App\Http\Requests\ContentLoaderRequest;

class ContentLoaderHandler
{
    protected $ContentType;
    protected $SingleItem;
    public function __construct(ContentLoaderRequest $request)
    {
        $this->ContentType = $request->ContentType;
        $this->SingleItem = $request->SingleItem;
    }


    public function LoadContent () {

        $Class = str_replace('CoreMainLoader','', __NAMESPACE__.$this->ContentType.'ContentLoader');
        try{
          return (new $Class($this->SingleItem))->results();
        }catch (\Exception $exception){
            return response(['message' => 'Something went wrong.']);
        }
    }




}