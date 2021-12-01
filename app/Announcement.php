<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;
use CreateCategoriesTable;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;

class Announcement extends Model
{

    use Searchable;

    public function toSearchableArray()
    {
       
        $array = [
            'id'=>$this->id,
            'title'=>$this->title,
            'body'=>$this->body,
            'category'=>$this->category->name,
            'altro'=>'annuncio annunci',
        ];

        return $array;
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    static public function ToBeRevisionedCount(){
        return Announcement::where ('is_accepted', null)->count();
    }

    static public function ToBeRejectedCount(){
        return Announcement::where ('is_accepted', false)->count();
    }

    public function images(){
        return $this->hasMany(AnnouncementImage::class);
    }


    static public function AnnouncementsCounter(){
        return Announcement::where('is_accepted', true)->count();
    }

     
        
    
     static public function AnnouncementsForUser(){
        $user = Auth::user()->id;
        return $announcements = Announcement::where('user_id', $user )->count();
        
        
        
     }

   
    

   /*  static public function AnnouncementsForUserVerification(){
        $user = Auth::user()->id;
        return $announcements = Announcement::where ('is_accepted', null)->count();
         
    } */
}
