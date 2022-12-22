<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;

class ParserController extends Controller
{
    protected function sources()
    {
        return [
            "https://lenta.ru/rss",
            "https://rssexport.rbc.ru/rbcnews/news/30/full.rss",
        ];
    }

    public function index(Category $category)
    {

        foreach ($this->sources() as $source)
        {
            $xml = XmlParser::load($source);
            $parsedNews = $xml->parse([
                "title" => ["uses" => "channel.title"],
                "link" => ["uses" => "channel.link"],
                "descripton" => ["uses" => "channel.descripton"],
                "image" => ["uses" => "channel.image.url"],
                "news" => ["uses" => "channel.item[title,link,guid,description,pubDate,enclosure::url,category]"],
            ]);

            foreach ($parsedNews["news"] as $key => $item)
            {
                if ($key >= 30) break;

                $categoryId = $category->firstOrCreate([
                    "name" => $item["category"]
                ], [
                    "slug" => Str::slug($item["category"])
                ])->id;

                $news = new News();
                $news->fill([
                    "title" => $item["title"] ?? "",
                    "short" => $item["description"] ?? "",
                    "description" => $item["rbc_news:full-text"] ?? "",
                    "picture" => $item["enclosure::url"] ?? "",
                    "link" => $item["link"] ?? "",
                    "category_id" => $categoryId,
                ])->save();
            }
        }

        return redirect()->route("admin.news.index");
    }
}
