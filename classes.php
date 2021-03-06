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
  
  const API_VIDEOS = 'https://www.googleapis.com/youtube/v3/search?key=AIzaSyClCOU5qwH_nxQfZZr4IhtPtMqWwUiI_pA&part=id&channelId=UCTJ1mLre8sT-d4KuvmQsSQA&publishedAfter=2016-11-21T00:00:00Z&maxResults=50';
  const API_VIDEO_IMAGE = "https://www.googleapis.com/youtube/v3/videos?key=AIzaSyClCOU5qwH_nxQfZZr4IhtPtMqWwUiI_pA&part=snippet";
  
  private function getIdVideosFromAPI() {
    $url = self::API_VIDEOS;
    $json = file_get_contents($url);
    $data = json_decode($json);
    return array_map(function($item) { return $item->id->videoId; }, $data->items);
  }
  
  
  private function getImageFromAPI($videoId) {
    $url = self::API_VIDEO_IMAGE . "&id=$videoId";
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













?>