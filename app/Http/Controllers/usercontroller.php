<?php

namespace App\Http\Controllers;
use App\Models\room;
use App\Models\book;
use DB;
use Auth;
use Session;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    //customer room list function
    function index()
    {
                $view_room=room::all();
                return view("layouts.room_view")->with("view",$view_room);
    }

    //customer individual room details function
    function interior($id)
    {
                 $available_status= DB::table('rooms')
                 ->join("books","rooms.id","=","books.room_id")
                 ->where("rooms.id","=",$id)->get();


                $view_room = DB::table('admins')
                ->join("rooms","rooms.admin_id", "=", "admins.id")
                ->where("rooms.id","=",$id)->get();
         
                // dd($view_room);
            
        return view("layouts.room-interior")->with("image",$view_room)->with("ava_status",$available_status);
    }

    //customer room booking function
    function booking(Request $req)
    {
            
            $datalist = request()->all();
            $booked = book::create($datalist);
            $room_status = room::where('id', '=', $req->room_id)->update(array('status' => 'PENDING'));

            if(isset($booked)&&isset($room_status ))
            {
                
                return redirect("/mybooking")->with('success', 'Room Booked Successfully');
            }
    }

     //customer booking list function
    function mybooking()
    {
        $book_list = book::join("admins", function ($join) {
            $join->on("books.admin_id", "=", "admins.id")
            ->where('books.user_id','=',Auth::user()->id);
            })->orderBy('book_id','DESC')->get();
        return view("layouts.mybooking")->with("book",$book_list);
    }

    //customer profile
     function profile()
        {
            return view("layouts.profile");
        }
     
}