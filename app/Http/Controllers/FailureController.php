<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Failure;

class FailureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $failures = Failure::all();

        return response()->json($failures);
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
        $failure = new Failure([
          'agent_id' => $request->get('agent_id'),
          'comment' => $request->get('comment'),
          'registered_at' => $request->get('registered_at')
        ]);
        $failure->save();

        return response()->json('Successfully added');
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
        $failure = Failure::find($id);
        return response()->json($failure);
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
        $failure = Failure::find($id);
        $failure->agent_id = $request->get('agent_id');
        $failure->comment = $request->get('comment');
        $failure->registered_at = $request->get('registered_at');
        $failure->save();

        return response()->json('Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $failure = Failure::find($id);
        $failure->delete();

      return response()->json('Successfully Deleted');
    }
}
