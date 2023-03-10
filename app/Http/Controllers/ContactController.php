<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contacts=Contact::all();
        return view('/index',compact("contacts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return back()->with('success','created');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request -> validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required'
            ]
            );

            $contact = new Contact(
                [
                    'first_name' => $request->get('first_name'),
                    'last_name' => $request->get('first_name'),
                    'email' => $request->get('email'),
                    'city' => $request->get('city'),
                    'country' => $request->get('country'),
                    'job_title' => $request->get('job_title')
                ]
                );

                $contact->save();
                return redirect('/create')->with('success','contact save');

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $contact=Contact::find($id);
        return view('/edite',compact("contact"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $request -> validate(
            [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required'
            ]
            );
            $contact=Contact::find($id);
            $contact->first_name = $request->get('first_name');
            $contact->last_name = $request->get('first_name');
            $contact-> email= $request->get('email');
            $contact-> city = $request->get('city');
            $contact->  country = $request->get('country');
            $contact->  job_title = $request->get('job_title');

            $contact->save();
            return redirect('/index')->with('success','contact updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $contact=Contact::find($id);
        $contact->delete();


        return redirect('/index')->with('success','contact deleted');

    }
}
