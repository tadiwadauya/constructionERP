<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\JobTitle;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JobTitleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     function __construct()
     {
          $this->middleware('permission:jobtitle-list|jobtitle-create|jobtitle-edit|jobtitle-delete', ['only' => ['index','show']]);
          $this->middleware('permission:jobtitle-create', ['only' => ['create','store']]);
          $this->middleware('permission:jobtitle-edit', ['only' => ['edit','update']]);
          $this->middleware('permission:jobtitle-delete', ['only' => ['destroy']]);
     }

     
    public function index() {
        $jobtitles = JobTitle::latest()->paginate(5);
        $users = User::all()->keyBy('paynumber'); // Get users and key by paynumber
    
        return view('jobtitles.index', compact('jobtitles', 'users'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
  }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $departments = Department::all();

        $data = [
            'departments' => $departments,
        ];

        return view('jobtitles.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $validator = Validator::make($request->all(),
            [
                'jobtitle'             => 'required|max:255',
                'department'           => 'required|max:255',
            ],
            [
                'jobtitle.required'         => 'We need a Job Title.',
                'department.required'       => 'We obviously need a name for a department.',

            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $jobtitle = JobTitle::create([
            'jobtitle'             => $request->input('jobtitle'),
            'department'             => $request->input('department'),
        ]);

        $jobtitle->save();

        return redirect('jobtitles')->with('success', 'Successfully added Job Title.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobtitle = JobTitle::findorFail($id);

        return view('jobtitles.show',compact('jobtitle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $jobtitle = JobTitle::findOrFail($id);
        $department = Department::all();

        $data = [
            'jobtitle'        => $jobtitle,
            'department'        => $department,
        ];

        return view('jobtitles.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $jobtitle = JobTitle::findorFail($id);

        $validator = Validator::make($request->all(),
            [
                'jobtitle'             => 'required|max:255',
                'department'           => 'required|max:255',
            ],
            [
                'jobtitle.required'         => 'We need a Job Title.',
                'department.required'       => 'We obviously need a name for a department.',

            ]
        );

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $jobtitle->jobtitle = $request->input('jobtitle');
        $jobtitle->department = $request->input('department');

        $jobtitle->save();

        return  redirect('jobtitles')->with('success', 'Successfully updated job title.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobTitle $jobtitle)
    {
        $jobtitle->delete();
    
        return redirect()->route('jobtitles.index')
                        ->with('success','jobtitle deleted successfully');
    }
}
