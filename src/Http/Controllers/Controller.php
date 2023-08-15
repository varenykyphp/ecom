<?php

namespace VarenykyECom\Http\Controllers;

use VarenykyECom\Support\EComSearchEngineFactory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Varenyky\Http\Controllers\BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $seo;

    public function __construct()
    {
        $this->seo = resolve(EComSearchEngineFactory::class);
    }
}