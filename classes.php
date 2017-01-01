<?php

class Video {
  public $image;
  public $link;
  
  public function __construct($image, $link) {
    $this->image = $image;
    $this->link = $link;
  }
}

class CanalYoutube {
  
  private function getIdVideosFromAPI() {
    $url = "https://api.myjson.com/bins/ec9qf";
    $json = file_get_contents($url);
    $data = json_decode($json);
    return array_map(function($item) { return $item->id->videoId; }, $data->items);
  }
  
  
  private function getImageFromAPI($videoId) {
    $url = "https://api.myjson.com/bins/1e4f6v";
    $json = file_get_contents($url);
    $data = json_decode($json);
    return $data->items[0]->snippet->thumbnails->medium->url;
  }
  
  
  public static function getVideos() {
    //return self::getIdVideosFromAPI();
    
    return self::getImageFromAPI("teste");
    // $video1 = new Video("image1", "link1");
    // $video2 = new Video("image2", "link2");
    // $video3 = new Video("image3", "link3");
    
    // return array($video1, $video2, $video3);

  }
}

echo "<pre>";
echo CanalYoutube::getVideos();
echo "</pre>";















?>