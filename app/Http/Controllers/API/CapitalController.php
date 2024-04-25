<?php

namespace App\Http\Controllers\API;

use App\Models\City;
use App\Models\Capital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Artisan;
use App\Models\User;
use App\Models\Checkout;

// use App\Http\Controllers\API\BaseController as BaseController;


class CapitalController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Log::info('This is my log');
        // $cities = City::orderBy('name', 'asc')->get();
        $capitals = Capital::orderBy('name', 'asc')->get();
        // $cities = City::orderBy('name', 'asc')->with(['capital'])->get();

        // $cities = City::join('attractions', 'city_id', 'id')->get();


        return $this->sendResponse($capitals, 'Capitals');
    }

    public function show($id)
    {
        $capital = Capital::findOrFail($id);
        return $this->sendResponse($capital, 'Capital details');
    }
}
