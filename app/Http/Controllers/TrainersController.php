<?php

namespace App\Http\Controllers;

use App\Trainer;
use Validator;

class TrainersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainers=Trainer::all();
        //print_r($trainers);
        //dd($trainers);
        return view('trainers.index',compact('trainers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trainers.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $data=request()->except('_method','_token');
        //dd($data);
        
        $validator = Validator::make(
            $data,[
                'name'=> 'required|unique:trainers|max:50',
                'email'=> 'required|unique:trainers|max:50'
            ]);
        if ($validator->fails())
        {
            return redirect()->route('trainers.create')->withErrors($validator)->withInput($data);
        }

        $trainers=Trainer::create($data);
        if($trainers){
            return redirect()->route('trainers.index');
        }

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
        $data=Trainer::find($id);
        //dd($data);
        return view('trainers.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $data=request()->except('_method','_token');
        //dd($data);
        $validator=Validator::make($data,[
                    'name'=> 'required|max:50|unique:trainers,id,'.$id,
                    'email'=> 'required|max:50|unique:trainers,id,'.$id
                ]
            );
        if($validator->fails()){
            return redirect()->route('trainers.edit',$id)->withErrors($validator)->withInput($data);
        }
        $trainers=Trainer::where('id',$id)->update($data);
        if($trainers){
            return redirect()->route('trainers.index');
        }


       //    $validator=Validator::make($data,[
       //      'name'=> 'required|max:50|unique:products,id,'.$id
       //  ]);
       // if($validator->fails()){
       //      return redirect()
       //          ->route('products.edit',$id)
       //          ->withErrors($validator)
       //          ->withInput($data);
       // }
       //  $products=Product::where('id',$id)->update($data);
       // if($products){
       //      return redirect()->route('products.index');
       // }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=Trainer::find($id);
        //dd($data);
        $data->delete();
        return redirect()->route('trainers.index');
    }
}
