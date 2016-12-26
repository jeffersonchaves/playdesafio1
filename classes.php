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
  public static function getVideos() {
    $video1 = new Video("image1", "link1");
    $video2 = new Video("image2", "link2");
    $video3 = new Video("image3", "link3");
    
    return array($video1, $video2, $video3);

  }
}

echo "<pre>";
print_r(CanalYoutube::getVideos());
echo "</pre>";















?>