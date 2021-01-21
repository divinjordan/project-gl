<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\EvaluationQuestion;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('teachers.evaluations.evaluations');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('teachers.evaluations.create');
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
        $evaluation = Evaluation::create([
            'user_id' => auth()->user()->id,
            'course_id' => $request->course,
            'evaluation_title' => $request->title,
            'evaluation_description' => $request->description,
        ]);

        foreach($request->questions as $item){
            EvaluationQuestion::create([
                'question_id' => $item,
                'evaluation_id' => $evaluation->id
            ]);
        }

        return redirect('/evaluations');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function show(Evaluation $evaluation)
    {
        //
        $evaluation->questions;
        return $evaluation;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(Evaluation $evaluation)
    {
        //
        return view('teachers.evaluations.edit',['evaluation' => $evaluation]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Evaluation $evaluation)
    {
        //
        $evaluation->update([
            'course_id' => $request->course,
            'evaluation_title' => $request->title,
            'evaluation_description' => $request->description,
        ]);

        // delete all questions for this evaluations and recreate them
        DB::delete("delete from evaluation_questions where evaluation_id = ?",[$evaluation->id]);

        foreach($request->questions as $item){
            EvaluationQuestion::create([
                'question_id' => $item,
                'evaluation_id' => $evaluation->id
            ]);
        }

        return response()->json(["SUCCES"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Evaluation  $evaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Evaluation $evaluation)
    {
        //
        $evaluation->delete();
    }
}
