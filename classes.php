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
    $idVideosAPI = self::getIdVideosFromAPI();
    $videosDesafio = 100;
    $videosQueFaltam = $videosDesafio - count($idVideosAPI);
    
    $videos = array();
    
    for ($i = 1; $i <= $videosQueFaltam; $i++) {
      $semVideo = new Video("https://placeholdit.imgix.net/~text?txtsize=33&txt=&w=320&h=180", "#");
      array_push($videos, $semVideo);   
    }
    
    foreach ($idVideosAPI as $umVideoId) {
      $image = self::getImageFromAPI($umVideoId); 
      $link = "https://www.youtube.com/watch?v=" . $umVideoId;
        
      $video = new Video($image, $link);
      
      array_push($videos, $video);
    }
    
    return $videos;
  }
}

echo "<pre>";
var_dump(CanalYoutube::getVideos());
echo "</pre>";















?>