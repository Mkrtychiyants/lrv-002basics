<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Group $group)
    {
         return view('createStudent', ['group' => $group]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $student = new Student();
        $student->fill([
            'group_id' =>$request->input('group'),
            'surname' => $request->input('surname'),
            'name' => $request->input('name'),
            'created_at' => $request->input('group_create'),
            'updated_at' => $request->input('group_update'),
        ]);
        $student->save();

        return redirect()->action([GroupController::class, 'show'], ['group' =>  $request->input('group')]);;
    }

    /**
     * Display the specified resource.
     */
    public function show(Group $group, Student $student)
    {
        return view('showStudent', ['student' => $student]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
