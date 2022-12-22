<?php

namespace App\Http\Controllers\Admin;
// use App\Models\room;
use App\Http\Controllers\Controller;
use App\Models\room;
// use session;
use Alert;
use Illuminate\Http\Request;

class roomcontroller extends Controller
{

     //Admin Add room function
    function addroom_create(Request $req)
    {
   
            if($req->hasfile('file'))
            {
            foreach($req->file('file') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $data[] = $name;  
            }
            }

            $datalist = request()->all();
            $datalist['file'] = json_encode($data);
            $room = room::create($datalist );

            if($room)
                {
                    return redirect('admin/room')->with('success', 'Room Added Successfully');
                }
    }


    function editroom($id)
    {
        // print_r($req->all());
        $view = room::all()
        ->where('id','=',$id);
 
        return view("admin.layouts.editroom")->with("view1",$view);
    }

//edit room function
  function editroom_create(Request $req)
    {
        // dd($req);
            
        if($req->hasfile('file'))
        {
        foreach($req->file('file') as $image)
        {
            $name=$image->getClientOriginalName();
            $image->move(public_path().'/images/', $name);  
            $data[] = $name;  
        }
        }

        $datalist = request()->except(['_token']);
        $datalist['file'] = json_encode($data);
        // dd($datalist);
        $room = room::where('id',$req->id)
        ->limit(1)->update($datalist) ;
        ;

        if($room)
            {
                toast('Details updated Successfully!','success');
            
                return redirect('admin/room');
            
            }
            }
        
    //delete room data function
    function room_delete(Request $req)
    {
    //  dd($req);
    
             $delete = room::destroy($req->id);

            if($delete)
            { 
                // Alert::success('success', 'Details Deleted Successfully');
                toast('Details Deleted Successfully!','success');
                return redirect('admin/room')->with('jsAlert', 'Updated!');
            }    
    }



}