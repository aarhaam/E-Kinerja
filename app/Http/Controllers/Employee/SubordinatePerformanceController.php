<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\HeadOfSubordinate;
use App\Models\ProgressWork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubordinatePerformanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $head = HeadOfSubordinate::where('head', '=', Auth::user()->employee_id)->first();
        return view('employee.subordinate-performance', [
            'head' => $head
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
     * @return false|\Illuminate\Http\Response|string
     */
    public function show()
    {
        $subordinate = HeadOfSubordinate::where('head', '=', Auth::user()->employee_id)->with('subordinate')->get();
        return json_encode([
            'data' => $subordinate
        ]);
    }

    public function performance($id)
    {
        $progressWork = ProgressWork::where('employee_id', '=', $id)->with('indicatorWork')->get();
        return json_encode([
           'data' => $progressWork
        ]);
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
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->json()){
            $data = $request->validate([
               'employee_id' => 'required',
               'date' => 'required',
               'grade' => 'required'
            ]);

            if($data){
                $progressWorks = ProgressWork::where('employee_id', '=', $data['employee_id'])->where('date', '=', $data['date'])->get();
            for ($iteration = 0; $iteration < count($progressWorks); $iteration++){
                    $progressWorks[$iteration]->update([
                       'grade' => $data['grade']
                    ]);
                }

                return response()->json([
                   'status' => true,
                   'message' => 'Data penilaian berhasil diberikan'
                ]);
            }
        }
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
}
