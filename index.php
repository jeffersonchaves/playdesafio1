<?php
  require('classes.php');
  $videos = CanalYoutube::getVideos();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Desafio 1</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
    
  <div class="cabecalho">
    <h1>#desafio100videos</h1>
    <h1>Faltam 13 vídeos</h1>
  </div>

  <?php foreach($videos as $video): ?> 
    <a target="_blank" href="<?php echo $video->link ?>">
      <img src="<?php echo $video->image ?>">
    </a>
  <?php endforeach; ?>
  
</body>
</html>