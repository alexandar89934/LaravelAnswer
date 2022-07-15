<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Answer;
use App\Models\Question;
use Auth;

class AnswersController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');


    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|min:15',
            'question_id' => 'required|integer'
        ]);

        $answer = new Answer();
        $answer->content = $request->content;
        $answer->user()->associate(Auth::id());

        $question = Question::findOrFail($request->question_id);
        $question -> answers()->save($answer);

        return redirect()->route('questions.show', $question->id);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $answer = Answer::findOrFail($id);
        if ($answer->user->id != Auth::id()) {
         return abort(403);
        }
        return view('answers.edit')->with('answer', $answer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $answer = Answer::findOrFail($id);
        // Getting values from the blade template form
        $this->validate($request, [
            'content' => 'required|max:255'
        ]);


        $answer->content =  $request->get('content');
       
       
        $answer->save();
 
        return redirect()->route('questions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $answer = Answer::find($id);
        $answer->delete(); 
 
        return redirect()->route('questions.index');
    }
}
