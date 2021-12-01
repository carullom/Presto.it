<?php

namespace App\Jobs;

use Spatie\Image\Image;
use Spatie\Image\Manipulations;
use App\AnnouncementImage;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Google\Cloud\Vision\V1\ImageAnnotatorClient;

class GoogleVisionRemoveFaces implements ShouldQueue
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
        $srcPath = storage_path('/app/' . $i->file);
        $image = file_get_contents($srcPath);

        //Imposta la variabile di ambiente Google application credential al path del credential file
        putenv('GOOGLE_APPLICATION_CREDENTIALS=' . base_path('google_credential.json'));

        $imageAnnotator = new ImageAnnotatorClient();
        $response = $imageAnnotator->faceDetection($image);
        $faces = $response->getFaceAnnotations();


        
            foreach ($faces as $face) {
                $vertices= $face->getBoundingPoly()->getVertices();

                $bounds = [];
                foreach ($vertices as $vertex) {
                   $bounds[]= [$vertex->getX(), $vertex->getY()];
                }
                $w = $bounds[2][0] - $bounds[0][0];
                $h = $bounds[2][1] - $bounds[0][1];

                $image = Image::load($srcPath);
               

                $image->watermark(\base_path('resources/img/minion.png'))
                    ->watermarkPosition('top-left')
                    ->watermarkPadding($bounds[0][0], $bounds[0][1])
                    ->watermarkWidth($w, Manipulations::UNIT_PIXELS)
                    ->watermarkHeight($h, Manipulations::UNIT_PIXELS)
                    ->watermarkFit(Manipulations::FIT_STRETCH);

                  

                    $image->save($srcPath);
                    
            }

            $image2 = Image::load($srcPath);
            $image2->watermark(\base_path('resources/img/team4045.png'))
            ->watermarkPosition(Manipulations::POSITION_CENTER)
            ->watermarkFit(Manipulations::FIT_STRETCH); 
            $image2->save($srcPath);



            $imageAnnotator->close(); 
           
    }
}