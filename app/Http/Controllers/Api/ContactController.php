<?php

namespace App\Http\Controllers\Api;

use App\Models\Contact;
use App\Mail\ContactMail;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::paginate(20);
        return response()->json(['message' => 'Gelen Kutusu', 'data'=>$contacts], 200);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'nullable',
            'subject' => 'nullable',
            'body' => 'nullable',
        ]);
        $validatedData['ip']=request()->ip();
        $contact = Contact::create($validatedData);
        return response()->json(['message' => 'Başarıyla Mesaj Gönderildi.','data'=> $contact], 200);
    }



}
