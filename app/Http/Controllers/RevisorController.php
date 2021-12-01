<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class RevisorController extends Controller
{
    public function _construct(){

        $this->middleware('auth.revisor');

    }
    
    public function index(){

        $announcement = Announcement::where('is_accepted', null)
        ->orderBy('created_at', 'desc')
        ->first();
        return view ('revisor.home', compact('announcement'));
    }

    private function setAccepted($announcement_id, $value){
        $announcement = Announcement::find($announcement_id);
        $announcement->is_accepted = $value;
        $announcement->save();
        return redirect(route('revisor.home'));
    }

    public function accept ($announcement_id){
        return $this ->setAccepted($announcement_id, 1);
    }

    public function reject ($announcement_id){
        return $this ->setAccepted($announcement_id, 0);


    }

    public function basket(){

        $announcement = Announcement::where('is_accepted', 0)
        ->orderBy('created_at', 'desc')
        ->first();
        return view ('revisor.basket', compact('announcement'));
    }

    private function setRestore($announcement_id, $value){
        $announcement = Announcement::find($announcement_id);
        $announcement->is_accepted = $value;
        $announcement->save();
        return redirect(route('revisor.historicalRevisor'));
    }

    public function restore ($announcement_id){
        return $this ->setRestore($announcement_id, null);
    }
    public function delete ($announcement_id){
        return $this ->setRestore($announcement_id, 2);
    }

    public function historical(){
        $user = Auth::user()->id;
        $announcements = Announcement::where('user_id', $user )
        ->orderBy('created_at', 'desc')
        ->get();
        return view ('revisor.historical', compact('announcements', 'user'));
    }
    
    public function historicalRevisor(){
        
        $announcements = Announcement::where('is_accepted', 0)
        
        ->orderBy('created_at', 'desc')
        ->get();
        return view ('revisor.historicalRevisor', compact('announcements'));
    }


    public function userRevisor(){

        $users = User::where('is_revisor', 2)
        ->get();
        return view ('revisor.userRevisor', compact('users'));
    }

    private function setRevisor($user_id, $value){
        $user = User::find($user_id);
        $user->is_revisor = $value;
        $user->save();
        return redirect(route('revisor.userRevisor'));
    }

    public function revisor ($user_id){
        return $this ->setRevisor($user_id, 1);
    }

 
}
