<?php

namespace App\Http\Controllers\Api;

use App\Models\Social;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UploadImageService;
use App\Http\Controllers\Api\SocialController;

class SocialController extends Controller
{
    public function index()
    {
        $socials = SocialMedia::orderBy('order_no')->paginate(20);
        return response()->json($socials);
    }

    public function edit($id)
    {
        $social = SocialMedia::where('id',$id)->first();
        return response()->json($social);
    }


    public function store(Request $request)
    {
        return $this->saveTag($request);
    }

    public function update(Request $request, $id)
    {
        return $this->saveTag($request, $id);
    }


    public function order(Request $request)
    {

        foreach ($request->order as $key => $id) {
            SocialMedia::where('id',$id)->update(['order_no'=> $key]);
        }

        return response()->json(['message' => 'Sosyal Medya Sırası Güncellendi!','data'=> SocialMedia::orderBy('order_no')->get()], 200);
    }

    private function saveTag(Request $request, $id=null)
    {
        $validatedData = $request->validate([
            'title' => 'required|string',
        ],
        [
            'title.required'=>'Başlık Boş Geçilemez',
        ]);


        $socialData = [
            'title' => $validatedData['title'],
            'link'=>$request->link,
            'icon'=>$request->icon,
            'status' => $request->status ?? 1
        ];

        $social = !empty($id) ? SocialMedia::find($id) : SocialMedia::create($socialData);

        if(empty($social)) {
            return response()->json(['message' => 'Sosyal Medya Bulunamadı!'], 404);
        }

        $social->update($socialData);

        return response()->json(['message' => !empty($id) ? 'Başarıyla Sosyal Medya Güncellendi.' : 'Başarıyla Sosyal Medya Oluşturuldu.', 'data'=> $social], 200);
    }

}
