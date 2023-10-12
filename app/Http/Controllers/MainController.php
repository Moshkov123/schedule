<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        $index= new Contact();
        return view('index', ['index'=>$index->all()]);
    }

    public function about(){
        return view('hello');
    }

    public function review(){
      $reviews= new Contact();
        return view('review', ['reviews'=>$reviews->all()]);
    }

    public function review_check(Request $request){
      $valid = $request ->validate([
        'group'=> 'required|min:2|max:120',
        'subject'=> 'required|min:2|max:120',
      
      ]);

      $review = new Contact();
      $review->subject = $request ->input('subject');
      $review->group = $request ->input('group');
     

      $review->save();

      return redirect()->route('review');
    }
}
