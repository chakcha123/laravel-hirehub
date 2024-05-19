<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Job;
use Illuminate\Http\Request;
// UPDATE  users SET role = 'admin' WHERE id = 1;

class AdminController extends Controller
{
    public function index()
    {
        $jobs = Job::paginate(5);
        return view('dashboard', compact('jobs'));
    }



    public function contact()
    {
        $contacts = Contact::paginate(5);
        return view('contactview', compact('contacts'));
    }
// create contact for contact us page

    public function create (Request $request){
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'number' => 'string',
            'message' => 'required|string',
        ]);

        Contact::create($validatedData);
        return redirect()->route('home');

    }


    public function destroy ($id){

        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contact.ad.view');

    }


}
