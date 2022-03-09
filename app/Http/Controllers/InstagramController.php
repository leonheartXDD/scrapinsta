<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use InstagramScraper\Instagram;
use Phpfastcache\Helper\Psr16Adapter;
use App\Exceptions\InvalidOrderException;
use Fabpot\Goutte;
use Exception;

/**
 * Undocumented class
 * 
 * @category Description
 * @package  Category
 * @author   Name <email@email.com>
 * @license  MIT
 * @link     http://url.com
 */
class InstagramController extends Controller
{
    
    /**
     * Connect and Scrap photo to Instagram
     *  Send to photo html page
     * using Instagram package
     * 
     * @param string $profileName = name of instagram profile,
     * @param int    $number      = number of photo scraped, 9 Max
     * 
     * @return view
     */
    public function profile(string $profileName, int $number)
    {
        $log = Instagram::withCredentials(new \GuzzleHttp\Client(), "helloleonx@gmail.com", "californication", new Psr16Adapter('Files'));
        $log->login();
        
        try {
            $posts = $log->getMedias($profileName, $number);
        } catch (\Throwable $th) {
           report($th);
            throw new Exception("Error Processing Request", 1);
            
        }
        
        

        foreach ($posts as $post) {
            $photos[] = $post->getImageHighResolutionUrl()."\n";
        }

        return view(
            'photo', [
            'photos' => $photos,
            'number' => $number,
            'profile' => $profileName
            ]
        );
    }

    /**
     * Undocumented function
     *
     * @param  string  $profileName,
     * @param  integer $number
     * @return view
     */
    public function withoutPackage(string $profileName, int $number)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get(
            'www.instagram.com/kevin'
        );
        $body = $response->getBody();
        $item = new \DOMDocument();
        dd($item);
        $item->loadHTML($body);
        dd($item);

        foreach ($items as $items) {

        }

        return view('photo', [
            'photos' => $photos,
            'number' => $number,
            'profile' => $profileName
        ]);
    }

     /**
     * Undocumented function
     *
     * @param  string  $profileName,
     * @param  integer $number
     * @return view
     */
    public function withGoutte(string $profileName, int $number)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get(
            'www.instagram.com/kevin'
        );
        $body = $response->getBody();
        $item = new \DOMDocument();
        dd($item);
        $item->loadHTML($body);
        dd($item);

        foreach ($items as $items) {

        }

        return view('photo', [
            'photos' => $photos,
            'number' => $number,
            'profile' => $profileName
        ]);
    }
}
