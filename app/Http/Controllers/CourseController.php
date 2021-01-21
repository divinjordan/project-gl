<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('teachers.courses.courses',['page' => 'courses']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('teachers.courses.create', ['page' => 'courses']);
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
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
      
        $course = Course::create(
            [
                'course_title' => $request->title,
                'course_description' => $request->description,
                'user_id' => auth()->user()->id
            ]   
        );

        return redirect('/courses');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
        return view('teachers.courses.edit',['course' => $course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $course->update([
                'course_title' => $request->title,
                'course_description' => $request->description,
        ]);

        return redirect('/courses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
        $course->delete();
        return redirect('/courses');
    }

    public function userCourses(){
        $courses = Course::where('user_id', auth()->user()->id)->get();
        return $courses;
    }
}
