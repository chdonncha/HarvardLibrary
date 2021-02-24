<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\BookModel;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BookController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public static function getHarvardBooks()
    {
        $client = new Client();
        $request = $client->get('http://api.lib.harvard.edu/v2/collections');
        $response = $request->getBody()->getContents();

        BookModel::addBooks($response);
    }

    public function getBooks(Request $request, Response $response)
    {
        //Implement Orderby systemId
        $Books = BookModel::all();

        return response()->json($Books);
    }

    public function getBook(Request $request, Response $response)
    {
        dd("got book");
//        $Books = BookModel::where('systemId', '=' $param);
    }
}