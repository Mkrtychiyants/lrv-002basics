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
        $studentGroup = $request->input('group');
        $studentSurname = $request->input('surname');
        $studentName = $request->input('name');
        $studentCreateDate = $request->input('group_create');
        $studentUpdateDate = $request->input('group_update');
        DB::insert('insert into students (group_id, surname, name, created_at, updated_at) values( ?,?,?,?,?)', [$studentGroup, $studentSurname, $studentName, $studentCreateDate, $studentUpdateDate]);
        return redirect()->action([GroupController::class, 'show'], ['group' =>  $studentGroup]);;
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $students = DB::table('students')
        ->where('id', '=', $student->id)
        ->get();
        return view('showStudent', ['student' => $students]);
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
