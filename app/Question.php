<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['class','subject','question','answer'];

	  protected $table = 'questions';

	  public static $create_validation_rules = [
	  	'class'=>'required',
	  	'subject'=>'required',
	    'question'=>'required',
	    'answer'=>'required'
	  ];

	  public static $update_validation_rules = [
	    'question'=>'required',
	    'answer'=>'required'
	  ];

}