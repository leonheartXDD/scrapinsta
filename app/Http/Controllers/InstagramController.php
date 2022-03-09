<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use InstagramScraper\Instagram;
use Phpfastcache\Helper\Psr16Adapter;

class InstagramController extends Controller
{
    public function profile(string $profileName, int $number){
        $log = Instagram::withCredentials(new \GuzzleHttp\Client(), 'helloleonx@gmail.com', 'californication', new Psr16Adapter('Files'));
        $log->login();
        $log->saveSession();
        
        $posts = $log->getMedias($profileName, $number);

        foreach ($posts as $post){
            $photos[] = $post->getImageHighResolutionUrl()."\n";
        }

        return view('photo', [
            'photos' => $photos,
            'number' => $number
        ]);
    }
}
