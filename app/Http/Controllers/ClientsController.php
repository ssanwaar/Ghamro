<?php

namespace App\Http\Controllers;

use DB;
use App\Clients;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clients = Clients::all();
        return view('admin.clients.index',compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.clients.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'manager' => 'required'
        ]);
        $item = new Clients();
        $item->name = $request->name;
        $item->email = $request->email;
        $item->phone = $request->phone;
        $item->manager = $request->manager;
        $item->save();

        $notification = array(
            'message' => 'Clients Details Saved Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.clients.create')->with($notification);

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
        $client = Clients::where('id',$id)->first();
        return view('admin/clients/edit',compact('client'));
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
        $data = $request->all();
        $client = Clients::where('id',$id)->first();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->phone = $request->phone;
        $client->manager = $request->manager;
        $client->save();

        $notification = array(
            'message' => 'Clients Details Updated Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.clients.index')->with($notification);
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
        $client = Clients::find($id);
        $client->delete();

        $notification = array(
            'message' => 'Client Deleted Successfully!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
        
    }
}
