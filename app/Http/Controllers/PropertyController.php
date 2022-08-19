<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPropertyRequest;
use App\Models\Address;
use App\Models\Property;
use App\Models\User;
use App\Models\Zipcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function getAllProperties(Request $request)
    {
        return view('pages.all_properties', ['properties' => Property::paginate()]);
    }

    public function getUserProperties()
    {
        return view('pages.my_properties', ['properties' => auth()->user()->properties]);
    }

    public function addProperty(AddPropertyRequest $request)
    {
        $zipcode = $this->checkZipCode($request->zipcode);

        $address = Address::create([
            'zipcode_id' => $zipcode->id,
            'country' => $request->country,
            'city' => $request->city,
            'street' => $request->street,
            'number' => $request->number,
            'apartment' => $request->apartment
        ]);

        $property = Property::create([
            'user_id' => auth()->user()->id,
            'address_id' => $address->id,
            'bathrooms_count' => $request->bathrooms,
            'bedrooms_count' => $request->bedrooms,
            'square_ft' => $request->sqft,
            'house_type_id' => $request->house_type,
            'rental_rate' => ($request->has('auto_calculate') && $request->auto_calculate == true) ?
                $this->calculatePrice($zipcode, $request->sqft) : $request->price
        ]);

        if ($request->exists('file')) {
            $uploadedFile = $request->file('file');
            $filename = time().$uploadedFile->getClientOriginalName();

            Storage::disk('local')->putFileAs(
                'properties/'.$property->id,
                $uploadedFile,
                $filename
            );

            $property->propertiesMedia()->create([
                'property_id' => $property->id,
                'path' => $uploadedFile
            ]);
        }

        return $property;
    }

    private function checkZipCode(string $zipcode)
    {
        if (empty($zipcodeRecord = Zipcode::where('zipcode', '=', $zipcode)->first())) {
            $zipcodeRecord = Zipcode::create([
                'zipcode' => $zipcode,
                'rate_multiplier' => 0.086,
                'min_rate' => 80,
                'max_rate' => 500
                ]);
        }

        return $zipcodeRecord;
    }

    private function calculatePrice(Zipcode $zipcode, $sqft)
    {
        $price = $sqft * $zipcode->rate_multiplier;

        if ($price > $zipcode->max_rate) {
            $price = $zipcode->max_rate;
        } else if ($price < $zipcode->min_rate) {
            $price = $zipcode->min_rate;
        }

        return $price;
    }
}