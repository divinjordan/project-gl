<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\QuestionResponse;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $questions = Question::where('user_id',auth()->user()->id)->get();
       
        return view('teachers.questions.questions',['questions' => $questions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $courses = auth()->user()->courses->all();
        return view('teachers.questions.create',['courses' => $courses, 'first_course' => $courses[0]]);
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
        $question = Question::create([
            'course_id' => $request->course,
            'user_id' => auth()->user()->id,
            'question_label' => $request->label
        ]);

        foreach($request->responses as $item){
            QuestionResponse::create([
                'question_id' => $question->id,
                'response_value' => $item['value'],
                'response_correct' => $item['correct']
            ]);
        }

        return response()->json(['success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
        $question->responses;
        $question->course;

        return $question;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
        $
        return view('teachers.questions.edit',['question' => $question, 'courses' => auth()->user()->courses]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
        $question->update([
            'course_id' => $request->course,
            'question_label' => $request->label
        ]);

        return response()->json(['success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
        $question->delete();
        return redirect('/questions');
    }
}
