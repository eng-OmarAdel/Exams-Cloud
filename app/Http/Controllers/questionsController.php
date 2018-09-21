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
            'body' => 'required'
        ]);

        $question = new question;
        $question->title = $request->input('title');
        $question->body = $request->input('body');
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
