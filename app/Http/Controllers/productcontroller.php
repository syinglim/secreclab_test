<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class productcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        
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
        $arr = [];
        $rdata = json_decode($request->getContent(), true);
        foreach($rdata as $key => $value){
            DB::table('tbl_products')->upsert([
                ['pkey'=>$key,'pname'=>$value, 'created_at'=>Carbon::now(), 'updated_at'=>Carbon::now()]],
                ['pkey'],['pname']
            );
            $id = DB::getPdo()->lastInsertId();
            array_push($arr, [$key=>$value]);
        }
        return ($arr);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = DB::table('tbl_products')->select('pname')->where('pkey','=',$id)->get();
        return $result;
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

    public function get_all_record(){
        $result = DB::table('tbl_products')->orderBy('id')->get();
        return (json_encode($result));
    }
    
}
