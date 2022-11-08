<?php

namespace App\Http\Controllers\Api\Phone;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Phones;
use App\Http\Resources\PhoneResource;
use App\Http\Requests\PhoneRequest;
use Illuminate\Support\Facades\File;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phoneResource = Phones::all();
        return $this->sentResponse(PhoneResource::collection($phoneResource));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $phone)
    {
        $nameimg = $phone->img_tamp->hashName();
        $phone->img_tamp->move('img', $nameimg);
        $nameimgs = $this->getjsonImgs($phone->imgs_tamp);

        $phone['img'] = $nameimg;
        $phone['imgs'] = $nameimgs;
        $phoneResource = Phones::create($phone->all());
        return $this->sentResponse(new PhoneResource($phoneResource));
    }
    private function getjsonImgs(array $imgs)
    {
        $array = array();
        foreach ($imgs as $key => $value) {
            $name = $value->hashName();
            $value->move('imgs', $name);
            array_push($array, $name);
        }
        return json_encode($array);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Phones $phones)
    {
        return $this->sentResponse(new PhoneResource($phones));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneRequest $PhoneRequest, Phones $phone)
    {
        if ($PhoneRequest->hasFile('img_tamp')) {
            if(File::exists(public_path('img/'.$phone->img))){
                File::delete(public_path('img/'.$phone->img));
            }
            $nameimg = $PhoneRequest->img_tamp->hashName();
            $PhoneRequest->img_tamp->move('img', $nameimg);
            $PhoneRequest['img'] = $nameimg;
        }
        if ($PhoneRequest->hasFile('imgs_tamp')) {
            $this->deleteImgs($phone->imgs);
            $nameImgs = $this->getjsonImgs($PhoneRequest->imgs_tamp);
            $PhoneRequest['imgs'] = $nameImgs;
        }
        $phone->update($PhoneRequest->all());
        return $this->sentResponse(new PhoneResource($phone));
    }
    private function deleteImgs(string $imgs) : void
    {
        $oldImg = json_decode($imgs, true);
        foreach ($oldImg as  $value) {
            if (File::exists(public_path('imgs/' . $value))) {
                File::delete(public_path('imgs/' . $value));
            }
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phones $phone)
    {
        try {
         $phone->delete();
         if(File::exists(public_path('img/'.$phone->img))){
            File::delete(public_path('img/'.$phone->img));
        }
        $this->deleteImgs($phone->imgs);
        } catch (\Throwable $th) {
           return response()->json([
            'message'=>'please check data again'
           ],400);
        }
        return response()->json([
            'massage'=>'successful delete',
            'phoneDeleted'=>$phone
        ],200);
    }
}
