<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeadOfSubordinate;
use App\Models\User;
use Illuminate\Http\Request;

class SubordinateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $employee = User::where('status', '=', 'employee')->get();
        return view('admin.subordinate', [
            'data' => $employee
        ]);
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
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->json()){
            $data = $request->validate([
                'head' => 'required',
                'subordinate' => 'required'
            ]);

//            $subordinate = HeadOfSubordinate::where('subordinate', '=', $data['subordinate'])->first();
//            $head = HeadOfSubordinate::where('subordinate', '=', $data['head'])->first();
            //&& $subordinate == null && $head == null
            if($data ){
                HeadOfSubordinate::create([
                    'head' => $data['head'],
                    'subordinate' => $data['subordinate']
                ]);

                return response()->json([
                    'status' => true,
                    'message' => 'Berhasil menambahkan bawahan'
                ]);

            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Karyawan ini tidak bisa dijadikan bawahan karena memiliki atasan lain atau sedang menjadi atasan'
                ]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return false|\Illuminate\Http\Response|string
     */
    public function show()
    {

    }

    public function headData()
    {
        $head = HeadOfSubordinate::with('head', 'subordinate')->get();
//        return json_encode([
//            'data' => $head
//        ]);
        return response()->json([
            'data' => $head
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subordinateData = HeadOfSubordinate::where('subordinate', '=', $id)->first();
        return response()->json($subordinateData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subordinateData = HeadOfSubordinate::where('subordinate', '=', $id)->first();
        if($request->json()){
            $data = $request->validate([
               'head' => 'required',
//               'subordinate' => 'required'
            ]);


//            $subordinate = HeadOfSubordinate::where('head', '=', $data['subordinate'])->first();
//            $head = HeadOfSubordinate::where('subordinate', '=', $data['head'])->first();

            if($data){
                $subordinateData->update([
                   'head' => $data['head'],
//                   'subordinate' => $data['subordinate']
                ]);

                return response()->json([
                   'status' => true,
                   'message' => 'Data atasan karyawan ini berhasil diganti'
                ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Karyawan ini tidak bisa dijadikan atasan karena memiliki atasan'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subordinate = HeadOfSubordinate::where('subordinate', '=', $id)->first();
        $subordinate->delete();

        return response()->json([
           'status' => true,
           'message' => 'Bawahan berhasil dipisahkan dari atasan'
        ]);
    }
}
