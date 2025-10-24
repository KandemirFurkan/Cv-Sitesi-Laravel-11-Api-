<?php

namespace App\Http\Controllers\Api;

use App\Models\Reference;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\UploadImageService;

class ReferenceController extends Controller
{
    public function index()
    {
        $references = Reference::orderBy('id','desc')->paginate(20);
        return response()->json($references);
    }

    public function edit($id)
    {
        $reference = Reference::where('id',$id)->first();
        return response()->json($reference);
    }


    public function store(Request $request)
    {
        return $this->saveReference($request);
    }

    public function update(Request $request, $id)
    {
        return $this->saveReference($request, $id);
    }


    private function saveReference(Request $request, $id=null)
    {
        $validatedData = $request->validate([
            'name' => 'required|string',
        ],
        [
            'name.required'=>'Referans Boş Geçilemez',
        ]);


        $referenceData = [
            'name' => $validatedData['name'],
            'link'=>$request->link ?? '#',
            'status' => $request->status ?? 1
        ];

        $reference = !empty($id) ? Reference::find($id) : Reference::create($referenceData);

        if(empty($reference)) {
            return response()->json(['message' => 'Referans Bulunamadı!'], 404);
        }

        if($request->hasFile('file')) {
            $uploadedImages =  $this->saveImageUpload($request, $reference);
            $reference->image = $uploadedImages[0]['path'];
        }
        $reference->update($referenceData);

        return response()->json(['message' => !empty($id) ? 'Başarıyla Referans Güncellendi.' : 'Başarıyla Referans Oluşturuldu.', 'data'=> $reference], 200);
    }

    private function saveImageUpload($request, $data) {

            $images = $request->file('file');

            $uploadImageService = new UploadImageService();

            $uploadImageService->createFolder('uploads/reference');
            $uploadImageService->deleteFile($data->image);

            $uploadedImages = $uploadImageService->uploadMultipleImages($images,'reference');

            return $uploadedImages;

    }
}
