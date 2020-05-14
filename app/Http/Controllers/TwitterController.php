<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Abraham\TwitterOAuth\TwitterOAuth;

class TwitterController extends Controller
{
    public function index(Request $request)
    {
        //ツイートを5件取得
        $result = \Twitter::get('statuses/home_timeline', array("count" => 5));

        //ViewのTwitter.blade.phpに渡す
        return view('twitter', [
            "result" => $result
        ]);
    }

    public function search(Request $request)
    {
        // 検索文字列
        $keyword = $request['keyword'];

        // APIに送る検索文字列
        $query = $keyword;

        // ツイートを5件取得
        $result = \Twitter::get('search/tweets', array('q' => $query, 'count' => 5))->statuses;

        // ViewのTwitter.blade.phpに渡す
        return view('twitter', [
            "result" => $result
        ]);
    }
}
