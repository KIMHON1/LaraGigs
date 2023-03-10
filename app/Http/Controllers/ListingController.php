<?php

namespace App\Http\Controllers;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Http\RedirectResponse;


class ListingController extends Controller
{
    public function index(){
        // dd(request('tag'));
        return view('listings.index',[
            'heading'=>'Latest Listings',
            'listings'=> Listing::latest()->filter(request(['tag','search']))->get()
             
        ]);
    }

    public function show(Listing $listing){
        // dd(request('tag'));
        return view('listings.show', ['listing'=>$listing]);
   
    }


    public function create(){
        return view('listings.create');
    }

    public function store(Request $request){
        // dd($request->all());

        $formFields = $request->validate([
            'title'=>'required',
            'company'=>['required', Rule::unique('listings','company')],
            'location'=>'required',
            'website' => 'required',
            'email' =>['required', 'email'],
            'tags'=>'required',
            'description'=>'required'

        ]);

        Listing::create($formFields);
        return redirect('/')->whith('message', 'Listing Created succesfully!'); 
    }
}
