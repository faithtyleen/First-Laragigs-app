<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //Show all listings
    public function index(){
        //dd(request('tag'));
        return view('listings.index', [
       // 'listings' => Listing::latest()->filter->request(['tag'])->get()
        'listings' => Listing::latest()->filter(request(['tag','search']))->simplePaginate(6)

    ]);
    }

    //show single listings

    public function show(Listing $listing){
        return view('listings.show',[
            'listing'=>$listing
        ]);
    }

    //show create form
    public function create() {
        return view('listings.create');
    }
    //store listing data
    public function store(Request $request) {
      //  dd($request->file('logo'));
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required', Rule::unique('listings',
            'company')],
            'location' =>'required',
            'website' =>'required',
            'email' => ['required', 'email'],
            'tags' =>'required',
            'description' =>'required'
        ]);

        if($request->hasFile('logo')){
            $formFields['logo']=$request->file('logo')->store('logos', 'public');
        }
        Listing::create($formFields);
            //dd($request->all());
       return redirect('/')->with('message', 'Listing created successfully!');
 }
 
 //Update Listing Data
 public function update(Request $request, Listing $listing) {
    //  dd($request->file('logo'));
      $formFields = $request->validate([
          'title' => 'required',
          'company' => ['required'],
          'location' =>'required',
          'website' =>'required',
          'email' => ['required', 'email'],
          'tags' =>'required',
          'description' =>'required'
      ]);

      if($request->hasFile('logo')){
          $formFields['logo']=$request->file('logo')->store('logos', 'public');
      }
      $listing->update($formFields);
          //dd($request->all());
     return back()->with('message', 'Listing updated successfully!');
}
//Delete Listing
public function destroy(Listing $listing){
 $listing->delete();
 return redirect('/')->with('message', 'Listing deleted successfully');
}

 //show edit form
  public function edit(Listing $listing){
    return view('listings.edit', ['listing' => $listing]);

  }
  //Manage Listings
  public function manage(){
    return view('listings.manage', ['listings' => auth()->user()->listings()->get()]);
  }


}

