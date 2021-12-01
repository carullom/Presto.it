<?php

namespace App\Jobs;

use App\AnnouncementImage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;
use Google\Cloud\Vision\V1\Feature\Type;
use Google\Cloud\Vision\V1\Likelihood;

class GoogleVisionSafeSearchImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $announcement_img_id;
 
    public function __construct($announcement_img_id)
    {
        $this->announcement_img_id = $announcement_img_id;

    }

 
    public function handle()
    {
        $i= AnnouncementImage::find($this->announcement_img_id);
        if (!$i){return;}
        $image = file_get_contents(storage_path("/app/" . $i->file));

        //Imposta la variabile di ambiente Google application credential al path del credential file
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->safeSearchDetection($image);
        $imageAnnotator->close();   //errore -----------------------------------------------------------------------------------------------------

        $safe = $response->getSafeSearchAnnotation(); 

        $adult = $safe->getAdult();
        $medical = $safe->getMedical();
        $spoof = $safe->getSpoof();
        $violence = $safe->getViolence();
        $racy = $safe->getRacy();

        $likelihooName = [
            'UNKNOWN', 'VERY_LIKELY','LIKELY' , 'POSSIBLE', 'UNLIKELY', 'VERY_UNLIKELY'
        ];

        $i->adult = $likelihooName[$adult];
        $i->medical = $likelihooName[$medical];
        $i->spoof = $likelihooName[$spoof];
        $i->violence = $likelihooName[$violence];
        $i->racy = $likelihooName[$racy];

        $i->save();

     
 
    }
}
