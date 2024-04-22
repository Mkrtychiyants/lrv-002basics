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
 
        // foreach ($users as $user) {
        //     echo $user->name;
        // }  
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
        echo "Record inserted successfully.<br/>";  
        $groupName = $request->input('title');
        $groupStartDate = $request->input('group_start');
        $groupStatus = $request->input('is_active');
        $groupCreateDate = $request->input('group_create');
        $groupUpdateDate = $request->input('group_update');
        DB::insert('insert into groups (title, start_from, is_active, created_at, updated_at) values(?,?,?,?,?)', [$groupName, $groupStartDate, $groupStatus, $groupCreateDate, $groupUpdateDate]);

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
    // public function showStudent(Student $student)
    // {
    //     return view('showStudent', ['group' =>  $student]);
    // }
    // public function createStudent(Request $request)
    // {
    //     $studentGroup = $request->input('group');
    //     $studentSurname = $request->input('surname');
    //     $studentName = $request->input('name');
    //     $studentCreateDate = $request->input('group_create');
    //     $studentUpdateDate = $request->input('group_update');
    //     DB::insert('insert into students (group_id, surname, name, created_at, updated_at) values( ?,?,?,?,?)', [$studentGroup, $studentSurname, $studentName, $studentCreateDate, $studentUpdateDate]);

    //     return redirect('/groups/');
    //     // return redirect()->route('groups.index');
    // }

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
