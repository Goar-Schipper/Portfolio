<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use http\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        //alle contact ophalen uit de database
        return view('admin.contact.index', [
            'contacts' => Contact::orderBy('created_at', 'ASC')->get()
        ]);
    }

    public function destroy($id)
    {
        Contact::findOrFail($id)->delete();

        return redirect()->route('dashboard.contact.index');
    }
}
