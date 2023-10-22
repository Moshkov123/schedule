<?php

namespace App\Http\Controllers;
use App\Models\items;
use App\Models\group;

use App\Models\Contact;
use Illuminate\Http\Request;

class MainController extends Controller
{
  public function home()
  {
      $index = new items();
      return view('index', ['index' => $index->all()]);
  }

    public function about()
    {
        return view('hello');
    }

    public function review()
{
  $contacts = Contact::with('group', 'item')->get();

  return view('review', compact('contacts'));
}

public function review_check(Request $request)
{
    $subjectValidation = $request->validate([
        'subject' => 'required|min:2|max:120',
    ]);

    $groupValidation = $request->validate([
        'group' => 'required|min:2|max:120',
    ]);

    $item = new items();
    $item->subject = $request->input('subject');
    $item->save();

    $group = new group();
    $group->group = $request->input('group');
    $group->save();

    $contact = new Contact();
    $contact->item_id = $item->id;
    $contact->group_id = $group->id;
    $contact->save();

    

    return redirect()->route('review');
}

}
