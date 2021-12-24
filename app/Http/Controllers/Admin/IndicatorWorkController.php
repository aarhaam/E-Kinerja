<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndicatorWork;
use App\Models\ProgressWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndicatorWorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employee = DB::table('users')->select('employee_id', 'name')
            ->where('status', '=', 'employee')->
            orderBy('name', 'ASC')->get();

        return view('admin.indicator-admin', [
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if($request->json()){
            $data = $request->validate([
               'employee_id' => 'required',
               'name_indicator' => 'required'
            ]);

            if($data){
                IndicatorWork::create([
                   'employee_id' => $data['employee_id'],
                   'name_indicator' => $data['name_indicator']
                ]);


                return response()->json([
                    'status' => true,
                    'message' => "Data indikator berhasil diinput"
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
        $indicator = DB::table('indicator_works')
            ->join('users', 'users.employee_id', '=', 'indicator_works.employee_id')
            ->orderBy('name', 'ASC')
            ->get();
        return json_encode([
            'data' => $indicator
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $indicator = DB::table('indicator_works')
            ->where('id' ,'=', $id)
            ->join('users', 'users.employee_id', '=', 'indicator_works.employee_id')
            ->select('indicator_works.id', 'indicator_works.name_indicator', 'indicator_works.employee_id', 'users.name')
            ->first();

        return response()->json($indicator);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $indicator = IndicatorWork::where('id', '=', $id)->first();
        if($request->json()){
            $data = $request->validate([
               'employee_id' => 'required',
               'name_indicator' => 'required'
            ]);

            if($data){
                $indicator->update([
                   'employee_id' => $data['employee_id'],
                   'name_indicator' => $data['name_indicator']
                ]);

                return response()->json([
                    'status' => true,
                    'message' => 'Data indikator berhasil diubah'
                ]);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $progressWork = ProgressWork::where('indicator_id', '=', $id)->first();

        if($progressWork){
            return response()->json([
                'status' => false,
                'message' => 'Data tidak bisa dihapus karena masih memiliki hubungan dengan data lain'
            ]);
        } else {
            $indicator = IndicatorWork::findOrFail($id);
            $indicator->delete();
            return response()->json([
                'status' => true,
                'message' => 'Data Karyawan berhasil dihapus'
            ]);
        }
    }
}
