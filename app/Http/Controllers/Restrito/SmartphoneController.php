<?php

namespace App\Http\Controllers\Restrito;
use App\Http\Requests\SmartphoneRequest;
use App\DataTables\SmartphoneDataTable;
use App\Http\Controllers\Controller;
use App\Model\Smartphone;
use App\Services\SmartphoneService;
use Illuminate\Http\Request;

class SmartphoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SmartphoneDataTable $smartphoneDataTable)
    {
        return $smartphoneDataTable ->render('restrito.smartphones.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restrito.smartphones.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Smartphone::create($request->all());

        return redirect('/smartphones');
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
    public function edit(Smartphone $smartphone)
    {
        return view('restrito.smartphones.form',compact('smartphone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Smartphone $smartphone)
    {
        $smartphone->update($request->all());
        return redirect('/smartphones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Smartphone $smartphone)
    {
        $smartphone->delete();
        return redirect('/smartphones');
    }
}
