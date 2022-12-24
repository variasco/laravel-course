<?php

namespace App\Services;

use App\Models\Category;
use App\Models\News;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Illuminate\Support\Str;

class XmlParserService
{
    public function saveNews($source)
    {
        $xml = XmlParser::load($source);
        $parsedNews = $xml->parse([
            "title" => ["uses" => "channel.title"],
            "link" => ["uses" => "channel.link"],
            "descripton" => ["uses" => "channel.descripton"],
            "image" => ["uses" => "channel.image.url"],
            "news" => ["uses" => "channel.item[title,link,guid,description,pubDate,enclosure::url,category]"],
        ]);

        foreach ($parsedNews["news"] as $key => $item) {
            if ($key >= 30) break;

            if (!$item["category"]) {
                $categoryName = $item["title"];
            } else {
                $categoryName = $item["category"];
            }

            $category = Category::firstOrCreate([
                "name" => $categoryName
            ], [
                "slug" => Str::slug($categoryName)
            ]);

            $news = new News();
            $news->fill([
                "title" => $item["title"] ?? "",
                "short" => $item["description"] ?? "",
                "description" => $item["rbc_news:full-text"] ?? "",
                "picture" => $item["enclosure::url"] ?? "",
                "link" => $item["link"] ?? "",
                "category_id" => $category->id,
            ])->save();
        }
    }
}
