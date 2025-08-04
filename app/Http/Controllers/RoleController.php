<?php
namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Role::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function($row) {
                    return '
                        <button class="btn btn-sm btn-info" onclick="editRole(' . $row->id . ')">Edit</button>
                        <button class="btn btn-sm btn-danger" onclick="deleteRole(' . $row->id . ')">Delete</button>
                    ';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('roles.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
        ]);

        Role::updateOrCreate(
            ['id' => $request->role_id],
            ['name' => $request->name, 'description' => $request->description]
        );

        return response()->json(['success' => true]);
    }

    public function edit($id)
    {
        return Role::findOrFail($id);
    }

    public function destroy($id)
    {
        Role::destroy($id);
        return response()->json(['success' => true]);
    }
}
