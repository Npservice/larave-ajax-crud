<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data = User::All();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<center><a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-primary btn-sm edit-data">Edit</a>';
                    $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm delete-data">Delete</a></center>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('welcome');
    }
    public function store(Request $request)
    {
        User::create([
            'name' => $request->nama,
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        return response()->json($request);
    }
    public function show($id)
    {
        return response()->json(User::find($id));
    }
    public function update(Request $request, $id)
    {
        if ($request->edit_password) {
            User::where('id', $id)->update([
                'name' => $request->edit_name,
                'username' => $request->edit_username,
                'password' => $request->edit_password
            ]);
        } else {
            User::where('id', $id)->update([
                'name' => $request->edit_name,
                'username' => $request->edit_username,
            ]);
        }

        return response()->json();
    }
    public function destroy($id)
    {
        return response()->json(User::find($id)->delete());
    }
}
