<?php

namespace App\Http\Controllers;

use App\Models\Secret;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class SecretController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('secret.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $secret = Secret::create([
            'text' => $request->text,
        ]);
    
        $signedUrl = URL::temporarySignedRoute(
            'secrets.show', now()->addMinutes(60), ['secret' => $secret->id]
        );
        
        return back()->with(['success' => 'Your data is successfully encrypted. Share the link with people.', 'signedUrl' => $signedUrl]);
    }

    /**
     * Display the specified resource.
     *
     * @param  Secret $secret
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Secret $secret)
    {
        if (! $request->hasValidSignature()) {
            abort(401);
        }

        return view('secret.show', ['secret' => $secret]);
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
    }
}
