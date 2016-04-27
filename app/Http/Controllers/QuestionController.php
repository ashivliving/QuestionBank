<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   /*  public function __construct()
    {
      $this->middleware('auth',['except'=>['index','show']]);
    }
*/
    public function index()
    {
        $quest = Question::all();
        $que = $quest->unique('class');
        return view('question.index',compact('quest','que'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quest = Question::all();
        $quest = $quest->unique('class');
        return view('question.create',['quest' => $quest]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,Question::$create_validation_rules);
        $data = $request->only('class','subject','question','answer');
        $question = Question::create($data);
        if($question)
        {
            $quest = Question::all();
            return redirect()->route('question.index',['quest' => $quest]);
        }
        else{
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(isset($_REQUEST['del']))
            {
                  Question::destroy($id);
                  return redirect()->route('question.index');
            }
         else{
        $question = Question::find($id);
        return view('question.show',['question'=>$question]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
      return view('question.edit',compact('question'));
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
        $this->validate($request,Question::$update_validation_rules);
        $data = $request->only('question','answer');
        $question = Question::find($id);
        if($question)
        {
          $question->update($data);
          return redirect()->route('question.show',$question->id);
        }

        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
