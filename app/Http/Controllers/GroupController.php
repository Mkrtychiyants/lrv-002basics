<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Student;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Http\Controllers\RedirectResponse;


class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = DB::select('select * from groups');

        return view('groups',['group'=>  $results]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('createGroup');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    
        $group = new Group();
        $group->fill([
            'title' =>$request->input('title'),
            'start_from' => $request->input('group_start'),
            'is_active' => $request->input('is_active'),
            'created_at' => $request->input('group_create'),
            'updated_at' => $request->input('group_update'),
        ]);
        $group->save();

        return redirect()->route('groups.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group)
    {   
        $students = DB::table('students')
        ->where('group_id', '=', $group->id)
        ->get();
        return view('showGroup', ['group' => $group, 'students' => $students]);
    }
  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Group $group)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Group $group)
    {
        //
    }
}
