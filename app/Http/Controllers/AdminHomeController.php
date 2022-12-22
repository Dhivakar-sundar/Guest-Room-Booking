<?php

namespace App\Http\Controllers;
use App\Models\room;
use App\Models\book;
use DB;
use Auth;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    //Admin Add room function
    function addroom()
    {
        return view('admin.layouts.addroom');

    }

    function profile()
    {
        return view('admin.layouts.profile');
    }

     //admin booking list function
    function index()
    {
       
        $list = DB::table('books')
        ->join('rooms', "rooms.id","=","books.room_id")
        ->join("users", "users.id","=","books.user_id")
        ->where('books.admin_id','=',Auth::guard('admin')->user()->id)
        ->orderBY("book_id","DESC")
        ->get();
        // dd($list);
        // print($list);
        $pending = DB::table('books')
        ->join('rooms', "books.room_id", "=", "rooms.id")
        ->join("users","books.user_id", "=", "users.id")
        ->where('books.admin_id','=',Auth::guard('admin')->user()->id)
        ->where('books.books_status','=','PENDING')
        ->get();
        // dd($pending);
        $confirm = DB::table('books')
        ->join('rooms', "books.room_id", "=", "rooms.id")
        ->join("users","books.user_id", "=", "users.id")
        ->where('books.admin_id','=',Auth::guard('admin')->user()->id)
        ->where('books.books_status','=','CONFIRM')
        ->get();
        // dd($confirm);
        $customer = DB::table('books')
        ->join("users","books.user_id", "=", "users.id")
        ->where('books.admin_id','=',Auth::guard('admin')->user()->id)
        ->get();
        // dd($customer);

        
        return view('admin.layouts.Adminhome')->with('list',$list)->with('customer',$customer)->with('pending',$pending)->with('confirm',$confirm);
    }


    //room list and availability function
    function room()
    {
        $list= DB::table('admins')
        ->join("rooms","admins.id","=","rooms.admin_id")
        ->where('rooms.admin_id','=',Auth::guard('admin')->user()->id)->get();

            $available = room::join("admins", function ($join) {
            $join->on("rooms.admin_id", "=", "admins.id")
            ->where('rooms.admin_id','=',Auth::guard('admin')->user()->id)
            ->where('rooms.status','=','AVAILABLE');
        })->get();
        $booked = room::join("admins", function ($join) {
            $join->on("rooms.admin_id", "=", "admins.id")
            ->where('rooms.admin_id','=',Auth::guard('admin')->user()->id)
            ->where('rooms.status','=','BOOKED');
        })->get();
        // var_dump($booked);
        return view('admin.layouts.room_list')->with('list',$list)->with('available',$available)->with('booked',$booked);

    }

//individual room view 
function view_room($id)
{   
    $available_status= DB::table('rooms')
    ->join("books","rooms.id","=","books.room_id")
    ->where("rooms.id","=",$id)->get();


   $view_room = DB::table('admins')
   ->join("rooms","rooms.admin_id", "=", "admins.id")
   ->where("rooms.id","=",$id)->get();
            
        return view("admin.layouts.room-interior")->with("image",$view_room)->with("ava_status",$available_status);
    }




     //booking confirm function
    function mybooking_confirm(Request $req)
        {
            
            $confirm = book::where('book_id', '=', $req->book_id)->update(array('books_status' => 'CONFIRM'));
            $Booked = room::where('id', '=', $req->room_id)->update(array('status' => 'BOOKED'));

                if($confirm && $Booked){
                    toast('Status updated Successfully','success');

                    echo"1";
                            }
        }

     //booking pending function
    function mybooking_pending(Request $req)
        {
            $confirm = book::where('book_id', '=', $req->book_id)->update(array('books_status' => 'PENDING'));
            $Booked = room::where('id', '=', $req->room_id)->update(array('status' => 'PENDING'));

                if($confirm && $Booked){
                    toast('Status updated Successfully','success');

                    echo"1";

                            }
        }



      //customer check-out function
      function checkout(Request $req)
      {
        $confirm = book::where('book_id', '=', $req->book_id)->update(array('books_status' => 'CHECK_OUT'));
        $Booked = room::where('id', '=', $req->room_id)->update(array('status' => 'AVAILABLE'));

            if($confirm && $Booked){
                toast('Status updated Successfully','success');

                echo"1";

                        }
      }  

     //customer list function   
    function customer()
        {

                $customer =    $customer = DB::table('books')
                ->join("users","books.user_id", "=", "users.id")
                ->where('books.admin_id','=',Auth::guard('admin')->user()->id)
                ->get();

            return view("admin.layouts.customers")->with('list',$customer);
        }
}