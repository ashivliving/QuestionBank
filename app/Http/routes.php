<?php

use Illuminate\Support\Facades\Input;
use App\Question;
// use Input;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/home', ['uses'=>'PagesController@welcome']);

 Route::get('/',['as'=>'root','uses'=>'QuestionController@index']);

 Route::resource('question', 'QuestionController');

 Route::get('/ajax-subcat',function(){
 	$class_name = Input::get('class_name');
 	$subject = Question::where('class','=',$class_name)->get();
 	$subject = $subject->unique('subject');
 	return Response::json($subject);
 });

  Route::get('/ajax-subcat1',function(){
 	$class_name = Input::get('class_name');
 	$subjectall = Question::where('class','=',$class_name)->get();
 	//$subject = $subject->unique('subject');
 	return Response::json($subjectall);
 });

  Route::get('/ajax-subcat2',function(){
 	$class_name = Input::get('class_name');
 	$subject_name = Input::get('subject_name');
 	$subjectall = Question::where('class','=',$class_name)->where('subject','=',$subject_name)->get();
 	//$subject = $subject->unique('subject');
 	return Response::json($subjectall);
 });
