<?php

namespace App\Http\Controllers;

use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all(); // da convalidare
        // dd($data);

        $newLead = Lead::create($data);

        Mail::to('geenetta@boolpress127.com')->send(new NewContact($newLead));

        return redirect()->route('leads.create');
    }
}
