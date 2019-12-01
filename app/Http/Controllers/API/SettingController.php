<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = DB::table('Settings')
            ->select('*')
            ->get();
        return response()->json([
            "Setting" => $setting
        ], 200);
    }

    public function uploadImage($image)
    {
        preg_match("/data:image\/(.*?);/", $image, $image_extension); // extract the image extension
        $image = preg_replace('/data:image\/(.*?);base64,/', '', $image); // remove the type part
        $image = str_replace(' ', '+', $image);
        $imageName = 'image_' . time() . '.' . $image_extension[1]; //generating unique file name;
        Storage::disk('uploads')->put($imageName, base64_decode($image));
        $path = 'public/uploads' . $imageName;
        return $path;
    }

    //route validation
    public function isSettingValidate(Request $request)
    {
        $this->validate($request, [
            'company_name' => ['required'],
            'company_address' => ['required'],
            'company_email' => ['required'],
            'company_phone_number' => ['required'] // why aircraft id string
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->isSettingValidate($request);

        $setting = new Setting(); // where is the Setting class

        $setting->company_name = $request->company_name;
        $setting->company_email = $request->company_email;
        $setting->company_phone_number = $request->company_phone_number;
        $setting->company_address = $request->company_address;
        $setting->company_moto = $request->company_moto;

        if ($request->image) {
            $path = $this->uploadImage($request->image);
        } else {
            $path = "";
        }
        $setting->image = $path;

        if ($setting->save()) {
            return response()->json([
                "resultStatus" => "1"
            ], 200);
        } else {
            return response()->json([
                "resultStatus" => "0"
            ], 200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->isSettingValidate($request);

        $setting = Setting::findOrFail($request->id);

        $setting->company_name = $request->company_name;
        $setting->company_email = $request->company_email;
        $setting->company_phone_number = $request->company_phone_number;
        $setting->company_address = $request->company_address;
        $setting->company_moto = $request->company_moto;
        $setting->image = "";

        if ($setting->save()) {
            return response()->json([
                "resultStatus" => "1"
            ], 200);
        } else {
            return response()->json([
                "resultStatus" => "0"
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::findOrFail($id);
        if ($setting->delete()) {
            return response()->json([
                "resultStatus" => "1"
            ], 200);
        } else {
            return response()->json([
                "resultStatus" => "0"
            ], 200);
        }
    }
}
