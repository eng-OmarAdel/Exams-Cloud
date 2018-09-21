<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\question;

class questionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $qsts = question::all();
       $qsts =   question::orderBy('created_at' , 'desc')->paginate(25);
        return view('questions.index')->with('questions', $qsts);
    }

  
    public function create()
    {
        return view('questions.createquestion');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'answer' => 'required'
        ]);

        $question = new question;
        $question->kind = "simple";
        $question->title = $request->input('title');
        $question->answer = $request->input('answer');
        $question->save();

        return redirect('/questions' )->with('success', 'Your Question Added' );
    }

    public function storetf(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'answer' => 'required'
        ]);

        $question = new question;
        $question->kind = "tf";
        $question->title = $request->input('title');
        $question->answer = $request->input('answer');
        $question->save();

        return redirect('/questions' )->with('success', 'Your Question Added' );
    }

    public function storemcq(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'answer1' => 'required',
            'answer2' => 'required',
            'answer3' => 'required',
            'answer4' => 'required'
        ]);

        $question = new question;
        $question->kind = "MCQ";
        $question->title = $request->input('title');
        $question->answer1 = $request->input('answer1');
        $question->answer2 = $request->input('answer2');
        $question->answer3 = $request->input('answer3');
        $question->answer4 = $request->input('answer4');
        $question->save();

        return redirect('/questions' )->with('success', 'Your Question Added' );
    }


    public function show($id)
    {
        $qst = question::find($id);  
        return view('questions.show')->with('question', $qst);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $qst = question::find($id); 
        return view('questions.edit')->with('question', $qst);
    }   


    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'body' => 'required'
        ]);

        $question =  question::find($id);
        $question->title = $request->input('title');
        $question->body = $request->input('body');
        $question->save();

        return redirect('/questions' )->with('success', 'Your Question updated' );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $qst = question::find($id);
        $qst->delete();
        return redirect('/questions' )->with('success', 'Question removed' );
    }
}
