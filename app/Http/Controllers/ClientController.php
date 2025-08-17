<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


    //     $clients = Client::all();
    //    dd($clients);

        if ($request->ajax()) {

         //  $data = Client::get();
         $data = Client::select('id','name','email','phone','address','title','author')->get();

            return \Yajra\DataTables\DataTables::of($data)->addIndexColumn()
                    ->addColumn('action', function($row){

                           $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editBook">Edit</a>';

                           $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteBook">Delete</a>';

                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('client');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Client::updateOrCreate(['id' => $request->client_id],
                ['name'=>$request->name,'email'=>$request->email,'phone'=>$request->phone,'address'=>$request->address,'title' => $request->title, 'author' => $request->author]);

        return response()->json(['success'=>'Client saved successfully.']);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
       // dd($id);
        $id = $request->id;
        $client = Client::find($id);
        dd($client);
        return response()->json($client);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::find($id)->delete();

        return response()->json(['success'=>'Client deleted successfully.']);
    }
}
