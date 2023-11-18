<?php

namespace App\Http\Controllers;
use App\Models\items;
use App\Models\group;
use App\Models\Group_Items;


use App\Models\User;
use Illuminate\Support\Facades\DB;
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
    $items = new items();
    $groups = new Group();

  return view('review', ['items' =>  $items->all()],['groups' =>  $groups->all()]);
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

        $groupId = DB::table('groups')->where('group', $request->input('group'))->value('id');
        $itemId = DB::table('items')->where('subject', $request->input('subject'))->value('id');

        $existingRelationship = DB::table('item_group')->where('group_id', $groupId)->where('item_id', $itemId)->exists();

        if (!$existingRelationship){
            DB::table('item_group')->insert([
            
                'group_id' => $groupId,
                'item_id' => $itemId,
            ]);
        }

        return redirect()->route('review');
    }

}
