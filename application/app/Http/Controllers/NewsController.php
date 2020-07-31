<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $title = $request->input('title');

        $result = News::where('title',  'LIKE', '%'.$title.'%')->paginate(5);

        return response()->json($result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {      
        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'status' => $request->input('status'),
        ]; 

        $result = News::create($data);
        if(!$result){
            return response()->json([
                'success' => false,  
                'message' => 'ไม่สามารถเพิ่มข้อมูลได้' 
            ], 500);
        }

        return response()->json([
                'success' => true,  
                'data' =>  $data
        ]);
        
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
        // dd($request->input(), $id);
        $query = News::find($id);
        if(!$query){
            return response()->json([
                'success' => false,  
                'message' => 'ไม่ข้อมูล' 
            ], 400);
        }

        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'status' => $request->input('status'),
        ]; 

        $result = $query->update($data);
        if(!$result){
            return response()->json([
                'success' => false,  
                'message' => 'อัพเดทไม่สำเร็จ' 
            ], 500);
        }


        return response()->json([
                'success' => true,  
                'message' => 'แก้ไขข้อมูลสำเร็จ' 
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $query = News::find($id);
        if(!$query){
            return response()->json([
                'success' => false,  
                'message' => 'ไม่ข้อมูล' 
            ], 400);
        }

         $result = $query->delete();
        if(!$result){
            return response()->json([
                'success' => false,  
                'message' => 'ลบข้อมูลไม่สำเร็จ' 
            ], 500);
        }


        return response()->json([
                'success' => true,  
                'message' => 'ลบข้อมูลสำเร็จ' 
            ], 200);
    }
}
