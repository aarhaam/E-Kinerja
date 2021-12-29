<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeadOfSubordinate;
use App\Models\IndicatorWork;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function response;
use function view;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $employee = User::where('status', '=', 'employee')->get();
        return view('admin.employee-admin', [
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
               'employee_id' => 'required|unique:users',
               'name' => 'required',
               'email' => 'required',
               'password' => 'required',
               'occupation' => 'required'
            ]);

            if($data){
                User::create([
                   'employee_id' => $data['employee_id'],
                   'name' => $data['name'],
                   'email' => $data['email'],
                   'password' => Hash::make($data['password']),
                   'occupation' => $data['occupation'],
                   'status' => 'employee'
                ]);
            }

            return response()->json([
               'status' => true,
               'message' => 'Data karyawan berhasil diinput'
            ]);
        }
    }

    public function storeSubordinate(Request $request, $employee_id)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return false|\Illuminate\Http\Response|string
     */
    public function show()
    {
        $employee = DB::table('users')->where('status', '=', 'employee')->get();

        return json_encode([
           'data' => $employee
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
        $employee = DB::table('users')->where('employee_id', '=', $id)->first();
        return response()->json($employee);
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
        $employee = DB::table('users')->where('employee_id', '=', $id);

        if($request->json()){
            $data = $request->validate([
               'employee_id' => 'required',
               'name' => 'required',
               'email' => 'required',
               'occupation' => 'required'
            ]);

            if($data){
                $employee->update([
                   'employee_id' => $data['employee_id'],
                   'name' => $data['name'],
                   'email' => $data['email'],
                   'occupation' => $data['occupation']
                ]);

                return response()->json([
                   'status' => true,
                   'message' => 'Data berhasil diubah'
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
        $indicator = IndicatorWork::where('employee_id', '=', $id)->first();

        if($indicator){
            return response()->json([
               'status' => false,
               'message' => 'Data tidak bisa dihapus karena masih memiliki hubungan dengan data lain'
            ]);
        } else {
            $employee = User::where('employee_id', '=', $id)->first();
            $employee->delete();
            return response()->json([
                'status' => true,
                'message' => 'Data Karyawan berhasil dihapus'
            ]);
        }
    }
}
