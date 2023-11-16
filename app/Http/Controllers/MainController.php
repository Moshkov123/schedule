<?php

namespace App\Http\Controllers;
use App\Models\items;
use App\Models\group;
use App\Models\Group_Items;


use App\Models\User;
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
    $groupItem= new Group_Items();

  return view('review', ['item' =>  $groupItem->all()]);
}

public function review_check(Request $request)
{
    $subjectValidation = $request->validate([
        'subject' => 'required|min:2|max:120',
    ]);

    $groupValidation = $request->validate([
        'group' => 'required|min:2|max:120',
    ]);
     $group = Group::where('group', $request->input('group'))->first();
     $item= items::where('subject', $request->input('subject'))->first();

    if (!$group) {
        $group = new Group();
        $group->group = $request->input('group');
        $group->save();
    }
    if (!$item) {
        $item = new items();
        $item->subject = $request->input('subject');
        $item->save();
    }
        $groupItem= new Group_Items();
        $groupItem->group_id = $group->id;
        $groupItem->item_id= $item->id;
        $groupItem->save();

    return redirect()->route('review');
}

}
