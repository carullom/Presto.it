<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(){
        
        $announcements=Announcement::where('is_accepted', 1)
        ->orderBy('created_at','desc')
        ->take(6)
        ->get();
       
         return view('welcome', compact('announcements'));
    }

    public function announcementsByCategory($name,$category_id){
        $category=Category::find($category_id);
        $announcements=$category->announcements()
        ->where('is_accepted', 1)
        ->orderby('created_at','desc')
        ->paginate(6);
         return view('announcements', compact('category','announcements'));
         
    }
//dettaglio card prodotto inserito da team
    public function announcementDetail($id){
        $announcement=Announcement::find($id);
        //dd($announcement);
        return view ('announcementDetail', compact('announcement'));
    }


    public function search(Request $request){
        $search=$request->input('search');
        $announcements=Announcement::search($search)->where('is_accepted',1)->orderby('created_at','desc')->get();
        
         return view('search_results', compact('announcements','search'));
    }


    public function locale($locale){
        session()->put('locale', $locale);
        return redirect()->back();
    }
   
}
