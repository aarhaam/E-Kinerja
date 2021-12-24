<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\IndicatorWork;
use App\Models\ProgressWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressWorkController extends Controller
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
        $indicator = IndicatorWork::where('employee_id', '=', Auth::user()->employee_id)->get();
        return view('employee.progress-work', [
            'data' => $indicator
        ]);
    }

    public function indicatorData()
    {
        $indicator = IndicatorWork::where('employee_id', '=', Auth::user()->employee_id)->get();
        return json_encode([
            'data' => $indicator
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
               'indicator_id' => 'required',
               'description' => 'required',
               'date' => 'required'
            ]);

            if($data){
                ProgressWork::create([
                   'employee_id' => Auth::user()->employee_id,
                   'indicator_id' => $data['indicator_id'],
                   'description' => $data['description'],
                   'date' => $data['date']
                ]);

                return response()->json([
                   'status' => true,
                   'message' => 'Data aktivitas harian berhasil diinput'
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
        $progressWork = ProgressWork::where('employee_id', '=', Auth::user()->employee_id)->with('indicatorWork')->get();
        return json_encode([
            'data' => $progressWork
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
        $activity = ProgressWork::findOrFail($id);
        return response()->json($activity);
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
        $activity = ProgressWork::findOrFail($id);

        if($request->json()){
            $data = $request->validate([
               'indicator_id' => 'required',
               'description' => 'required',
               'date' => 'required'
            ]);

            if($data){
                $activity->update([
                   'indicator_id' => $data['indicator_id'],
                   'description' => $data['description'],
                   'date' => $data['date']
                ]);


                return response()->json([
                   'status' => true,
                   'message' => 'Data aktivitas berhasil diubah'
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
    public function destroy($employee_id)
    {
        $activity = ProgressWork::findOrFail($employee_id);
        $activity->delete();

        return response()->json([
           'status' => true,
           'message' => 'Data aktivitas berhasil dihapus'
        ]);
    }
}