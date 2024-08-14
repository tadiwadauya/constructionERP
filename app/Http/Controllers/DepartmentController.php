<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;

class DepartmentController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:department-list|department-create|department-edit|department-delete', ['only' => ['index','show']]);
         $this->middleware('permission:department-create', ['only' => ['create','store']]);
         $this->middleware('permission:department-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:department-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $departments = Department::latest()->paginate(5);
        $users = User::all()->keyBy('paynumber'); // Get users and key by paynumber
    
        return view('departments.index', compact('departments', 'users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function create()
    {
        $users = User::all();

        $data = [
            'users' => $users,
        ];
        return view('departments.create')->with($data);
        
    }

    public function store(Request $request)
    {
        request()->validate([
            'department' => 'required|max:255|unique:departments',
            'manager' => 'nullable', 'string', 'max:255',
            'asst_manager' => 'nullable', 'string', 'max:255',

        ]);
    
        Department::create($request->all());
    
        return redirect()->route('departments.index')
                        ->with('success','Department created successfully.');
    }
    

    public function show(Department $department)
    {
        $users = User::all()->keyBy('paynumber');
        return view('departments.show',compact('department','users'));
    }
    

    public function edit(Department $department)
    {
        $users = User::all()->keyBy('paynumber');
        return view('departments.edit',compact('department','users'));
    }
    

    public function update(Request $request, Department $department)
    {
         request()->validate([
            'department' => 'required',
            'manager' => 'required',
            'asst_manager' => 'required',
        ]);
    
        $department->update($request->all());
    
        return redirect()->route('departments.index')
                        ->with('success','Department updated successfully');
    }
    

    public function destroy(Department $department)
    {
        $department->delete();
    
        return redirect()->route('departments.index')
                        ->with('success','Department deleted successfully');
    }
}
