<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\items;
use App\Models\Group_Items;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    
    public function index()
    {
        $group = new Group();
        return view('groups/indexGroups',['group' => $group->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $group = new Group();
        return view('groups/indexGroupsСreate',['group' => $group->all()]);
    }
    public function Сreate_check(Request $request)
    {
        $groupValidation = $request->validate([
            'groups' => 'required|min:2|max:120',
        ]);
       
        $group = Group::where('group', $request->input('groups'))->first();

    if (!$group) {
        $newGroup = new Group();
        $newGroup->group = $request->input('groups');
        $newGroup->save();
    } 

        return redirect()->route('create');
    }


    // просмотреть группу
    
    public function show(string $group)
    {
        $index = items::all();
        $group = Group::find($group);
        $groupItem = DB::table('item_group')->get();
        // $groupItem = new Group_Items(); 
        return view('groups.view', compact('index','group'),['groupItem' => $groupItem ->all()]);
    }
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($group)
    {
    $group = Group::find($group);
    return view('groups.edit', compact('group'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $group)
    {
    $group = Group::find($group);
    $group->group = $request->input('groups');
    $group->save();
    return redirect()->route('index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $group = Group::find($id);
        $groupId = $group->id;
       
       $itemGroup = DB::table('item_group')->where('group_id', $groupId)->first();

       if ($itemGroup) {
           DB::table('item_group')->where('group_id', $groupId)->delete();
       }
       if($group){
        
        $group->delete();
        
       }
        return redirect()->route('create');
    }
}
