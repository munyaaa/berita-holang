<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Goutte\Client;
use App\Model\News;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function view()
    {
        $n = DB::table('news')->distinct()->paginate(10);
        return view('index', ['news' => $n]);
    }
    
    public function getCurl()
    {
        $fileHandle = fopen("news.csv", "r");
        $newsData = array();
        while (($file = fgetcsv($fileHandle, 0, ",")) !== FALSE) {
            $newsData[] = $file;
        }

        dump($newsData);

        foreach($newsData as $value) {
            $link = $value[0];
            $headline = $value[1];
            $newsMapper = [
                'title' => $value[2],
                'content' => $value[3],
                'image' => $value[4],
                'writer' => $value[5],
                'date' => $value[6]
            ];

            $client = new Client;
            $content = $client->request('GET', $link);

            $content->filter($headline)->each(function ($node) use ($newsMapper) {
                $link = $node->link()->getUri();
                dump($link);
                $client = new Client();
                $crawler = $client->request('GET', $link);

                $news = new News;
                foreach ($newsMapper as $key => $value) {
                    $data = $crawler->filter($value);
                    if ($data->count() > 0) {
                        if($key == 'image') {
                            $news[$key] = $data->attr('src');
                        }
                        else $news[$key] = $data->text('');
                    } else {
                        $news[$key] = null;
                    }
                }

                if ($news->isValid()) {
                    dump($news);
                    $news->save();
                }
            });
        }
    }
    
}
