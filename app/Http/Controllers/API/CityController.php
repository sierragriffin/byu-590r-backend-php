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

// use App\Http\Controllers\API\BaseController as BaseController;


class CityController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Log::info('This is my log');
        // $cities = City::orderBy('name', 'asc')->get();
        // $cities = City::orderBy('name', 'asc')->with(['capital', 'attractions'])->get();
        $cities = City::with(['capital', 'attractions', 'people'])
                        ->orderBy('cities.name', 'asc')
                        ->get();
        // $cities = City::orderBy('name', 'asc')->with(['capital'])->get();

        // $cities = City::join('attractions', 'city_id', 'id')->get();

        // images/niigata.png -> https://aws.console.fas.njfwbgg/images/
        foreach($cities as $city) {
            $city->file = $this->getS3Url($city->file);
        }

        return $this->sendResponse($cities, 'Cities');
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     //
    // }

    public function create()
    {
        $capitals = Capital::all();
        return view('Cities.vue', ['capitals' => $capitals]);
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'description' => 'required',
    //         'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
    //     ]);
        

    //     if($validator->fails()){
    //         return $this->sendError('Validation Error.', $validator->errors());
    //     }

    //     $city = new City;

    //     if ($request->hasFile('file')) {

    //         $extension = request()->file('file')->getClientOriginalExtension();
    //         $image_name = time() .'city_map.' . $extension;
    //         $path = $request->file('file')->storeAs(
    //             'images',
    //             $image_name,
    //             's3'
    //         );
    //         Storage::disk('s3')->setVisibility($path, "public");
    //         if(!$path) {
    //             return $this->sendError($path, 'City image failed to upload!');
    //         }

    //         $city->file = $path;
    //     }

    //     $city->name = $request['name'];
    //     $city->description = $request['description'];

    //     $city->save();

    //     if(isset($city->file)){
    //         $city->file = $this->getS3Url($city->file);
    
    //     }
    //     $success['city'] = $city;
    //     return $this->sendResponse($success, 'City successfully created!');
    // }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'capital_id' => 'required|exists:capitals,id',

            'attraction_ids' => 'sometimes|array',
            'attraction_ids.*' => 'exists:attractions,id'
        ]);
        

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $city = new City;
        $city->name = $request->name;
        $city->description = $request->description;
        $city->capital_id = $request->capital_id;

        if ($request->hasFile('file')) {

            $extension = request()->file('file')->getClientOriginalExtension();
            $image_name = time() .'city_map.' . $extension;
            $path = $request->file('file')->storeAs(
                'images',
                $image_name,
                's3'
            );
            Storage::disk('s3')->setVisibility($path, "public");
            if(!$path) {
                return $this->sendError($path, 'City image failed to upload!');
            }

            $city->file = $path;
        }

        $city->name = $request['name'];
        $city->description = $request['description'];

        $city->save();

        if ($request->has('attraction_ids')) {
            foreach ($request->attraction_ids as $attractionId) {
                $attraction = Attraction::find($attractionId);
                if ($attraction) {
                    $attraction->city_id = $city->id;
                    $attraction->save();
                }
            }
        }

        $city->load('attractions');
        $city->load('capital');

        if(isset($city->file)){
            $city->file = $this->getS3Url($city->file);
    
        }
        $success['city'] = $city;
        return $this->sendResponse($success, 'City successfully created!');
    }

    public function updateCityPicture(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $city = City::findOrFail($id);

        if($request->hasFile('file')) {

            $extension = request()->file('file')->getClientOriginalExtension();
            $image_name = time() .'city_map.' . $extension;
            $path = $request->file('file')->storeAs(
                'images',
                $image_name,
                's3'
            );
            Storage::disk('s3')->setVisibility($path, "public");
            if(!$path) {
                return $this->sendError($path, 'City image failed to upload!');
            }

            $city->file = $path;
        }
        $city->save();

        if(isset($city->file)){
            $city->file = $this->getS3Url($city->file);
        }
        $success['city'] = $city;
        return $this->sendResponse($success, 'City image successfully updated!');
    }       
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        // $city = City::where('id', $id)->first();
        $city = City::with('people')->findOrFail($id);
        dd($city->toArray());

        // images/niigata.png -> https://aws.console.fas.njfwbgg/images/
        
        $city->file = $this->getS3Url($city->file);
        

        return $this->sendResponse($city, 'City');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, string $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'name' => 'required',
    //         'description' => 'required',
    //     ]);

    //     if($validator->fails()){
    //         return $this->sendError('Validation Error.', $validator->errors());
    //     }

    //     $city = City::findOrFail($id);
    //     $city->name = $request['name'];
    //     $city->description = $request['description'];
    //     $city->save();

    //     if(isset($city->file)){
    //         $city->file = $this->getS3Url($city->file);
    //     }
    //     $success['city'] = $city;
    //     return $this->sendResponse($success, 'City successfully updated!');
    // }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'capital_id' => 'required|exists:capitals,id',
            'attraction_ids' => 'sometimes|array',
            'attraction_ids.*' => 'exists:attractions,id'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $city = City::findOrFail($id);
        $city->name = $request->name;
        $city->description = $request->description;
        $city->capital_id = $request->capital_id;
        $city->save();

        if ($request->has('attraction_ids')) {
            foreach ($request->attraction_ids as $attractionId) {
                $attraction = Attraction::find($attractionId);
                if ($attraction) {
                    $attraction->city_id = $city->id;
                    $attraction->save();
                }
            }
        }
    
        // Optionally refresh the city instance to reflect related model changes
        $city = $city->load(['capital', 'attractions']);
        $city->load('attractions');
        $city->load('capital');

        if(isset($city->file)){
            $city->file = $this->getS3Url($city->file);
        }
        $success['city'] = $city;
        return $this->sendResponse($success, 'City successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = City::findOrFail($id);
        Storage::disk('s3')->delete($city->file);
        $city->delete();

        $success['city']['id'] = $id;
        return $this->sendResponse($success, 'City Deleted');
    }

    public function getCapitalCities() {
        $capitals = Capital::all();  // Assuming CapitalCity is your model name
        return response()->json($capitals);
    }

    public function attachPeopleToCity($cityId, $personIds)
    {
        $city = City::findOrFail($cityId);
        $city->people()->attach($personIds);

        return response()->json(['message' => 'People attached to the city successfully']);
    }
}
