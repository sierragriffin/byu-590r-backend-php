<?php
namespace App\Http\Controllers\API;

use App\Models\City;
use App\Models\Capital;
use App\Models\Attraction;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Artisan;
use App\Models\User;
use App\Models\Checkout;

class CityPersonController extends BaseController
{
    public function attachPersonToCity($cityId, $personId)
    {
        // Insert a new record into the pivot table
        DB::table('city_person')->insert([
            'maincity_id' => $cityId,
            'person_id' => $personId,
        ]);

        return response()->json(['message' => 'Person attached to the city successfully']);
    }
}