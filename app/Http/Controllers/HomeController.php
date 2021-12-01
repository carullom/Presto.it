<?php

namespace App\Http\Controllers;

use App\Announcement;
use App\Jobs\ResizeImage;
use App\AnnouncementImage;
use App\Mail\revisorRequest;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Jobs\GoogleVisionRemoveFaces;
use Facade\FlareClient\Stacktrace\File;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;
use App\Http\Requests\AnnouncementRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function newAnnouncement(Request $request)
    {
        $uniqueSecret=$request->old(
            'uniqueSecret', base_convert(sha1(uniqid(mt_rand())),16,36)
        );
        return view('announcements.new', compact('uniqueSecret'));
    }

    public function createAnnouncement(AnnouncementRequest $request)
    {

        $user = Auth::user()->id;
        $a = new Announcement();
        $a->title = $request->input('title');
        $a->body = $request->input('body');
        $a->price = $request->input('price');
        $a->category_id = $request->input('category');
        //collegare utente ad annuncio
        $a->user()->associate($user);
        $a->save();

        $uniqueSecret=$request->input('uniqueSecret');

        $images=session()->get("images.{$uniqueSecret}",[]);
        $removedImages=session()->get("removedimages.{$uniqueSecret}",[]);

        $images=array_diff($images, $removedImages);

        foreach ($images as $image) {
           $i=new AnnouncementImage();
           $fileName=basename($image);
           $newfileName="public/announcements/{$a->id}/{$fileName}";
           
           Storage::move($image, $newfileName);
          /*   
           dispatch(new ResizeImage(
               $newfileName,
               300,
               150
           ));
           
          
           dispatch(new ResizeImage(
            $newfileName,
            600,
            400
        )); */

           $i->file=$newfileName;
           $i->announcement_id=$a->id;
           $i->save();

           /* dispatch(new GoogleVisionSafeSearchImage($i->id));
           dispatch(new GoogleVisionLabelImage($i->id)); */

          GoogleVisionSafeSearchImage::withChain
          ([
            new GoogleVisionLabelImage($i->id),
            new GoogleVisionRemoveFaces($i->id),
            new ResizeImage($i->file,300,150),
            new ResizeImage($i->file,440,320),
            new ResizeImage($i->file,600,400),
            ])->dispatch($i->id);
        }
        /* File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}")); */
        //versione aggiornata
        Storage::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

        return redirect('/')->with('announcement.created.success', 'Ok');
    }

    public function revisorRequest()
    {    
        return view('revisorRequest');
    }

    public function submitRevisor(Request $request)
    {
        // dd($request->message);
        $email = $request->email;
        $message = $request->message;
        // $email = $request->input('email');
        // $message = $request->input('message');
        
        $c = compact('email', 'message');
        // dd($c);
        /* $id = Auth::user()->id;
        $user = User::where('id', $id );
        $user->is_revisor = 2;
        $user->save(); */
       
        
        $user_id=Auth::user()->id;
        $user = User::find($user_id);
        $user->is_revisor = 2;
        $user->save();


        Mail::to('amministrazione@presto.it')->send(new revisorRequest($c));
        
        return redirect(route('revisor.thankyou'));
    }

    public function revisorThankyou()
    {
        return view('revisor.thankyou');
    }

    public function uploadImage(Request $request)

    {
        $uniqueSecret = $request->input('uniqueSecret');

        $fileName =$request->file('file')->store("public/temp/{$uniqueSecret}");

        dispatch(new ResizeImage(
            $fileName,
            80,
            80
        ));

            session()->push("images.{$uniqueSecret}", $fileName);

            return response()->json(
                [
                    'id'=>$fileName
                ]);

        
    }

    public function removeImage(Request $request)

    {
        $uniqueSecret = $request->input('uniqueSecret');

        $fileName =$request->input('id');

            session()->push("removedimages.{$uniqueSecret}", $fileName);

            Storage::delete($fileName);

            return response()->json('ok');
               

        
    }

    public function getImages(Request $request)

    {
        $uniqueSecret = $request->input('uniqueSecret');

        $images=session()->get("images.{$uniqueSecret}",[]);
        $removedImages=session()->get("removedimages.{$uniqueSecret}",[]);

        $images=array_diff($images, $removedImages);
        $data=[];

        foreach ($images as $image) {
           $data[]=[
               'id'=>$image,
               'src'=>AnnouncementImage::getUrlByFilePath($image, 80, 80)
           ];
        }

            return response()->json($data);
               

        
    }

    
}
