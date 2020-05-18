<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public static $quotes = array("The Black Knight Always Triumphs! - Monty Python", 
        "Anyone who has never made a mistake has never tried anything new - Albert Einstein",
        "Never Stop Exploring - The North Face",
        "Be yourself; everyone else is already taken - Oscar Wilde",
        "So many books, so little time - Frank Zappa",
        "Be the change that you wish to see in the world - Mahatma Gandhi",
    );

    public function index()
    {
        $totalQuotes = (count(Controller::$quotes));
        $randomNumber = (rand(0,($totalQuotes-1)));
        $randomQuote = Controller::$quotes[$randomNumber];
        return response()->json(['quote' => $randomQuote, 'server_ip' => gethostbyname(gethostname())]);
    }

    public function random_images() {
        // por algún motivo no me permite poner estas dos variables public static
        $totalImages = 15;
        $imageFormat = 'https://agustin-basurero.s3.amazonaws.com/images/%d.jpg';

        $randomNumber = rand(1, $totalImages);
        $randomImage = sprintf($imageFormat, $randomNumber);

        $data = [
            'image' => $randomImage,
            'server_ip' => gethostbyname(gethostname()),
        ];

        return view('random_image')->with('data', $data);
    }
}
