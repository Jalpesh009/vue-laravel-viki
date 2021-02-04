<?php

namespace App\Http\Controllers;

use App\AwesomeList;
use Illuminate\Http\Request;

class AwesomeListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $awesome_lists = AwesomeList::orderBy('id', 'ASC')->get();
        return $awesome_lists;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $awesome_lists = new AwesomeList([
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);
        $awesome_lists->save();
        // echo '<pre>'; 
        // print_r($awesome_lists );
        // echo '</pre>';
        // die;
        return response()->json(['success'=>'The List successfully added', 'data'=> $awesome_lists]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AwesomeList  $awesomeList
     * @return \Illuminate\Http\Response
     */
    public function show(AwesomeList $awesomeList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AwesomeList  $awesomeList
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $awesome_lists = AwesomeList::find($id);
        return response()->json($awesome_lists);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AwesomeList  $awesomeList
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $awesome_lists = AwesomeList::find($id);
        $awesome_lists->update($request->all());
 
        return response()->json('The List successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AwesomeList  $awesomeList
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $awesome_lists = AwesomeList::find($id);
        $awesome_lists->delete();
 
        return response()->json('The List successfully deleted');
    }
}
