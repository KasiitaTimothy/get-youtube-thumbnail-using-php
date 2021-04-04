<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Get Youtube Thumbnail</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <div class="container">
     <form  method="post">
     <input type="url" name="youtube_url" autocomplete="off">
      <input type="submit" name="submit" value="Get Thumbnail">
     </form>

   
 
    <?php
    
    if(isset($_POST['submit'])){


      $video_url = $_POST['youtube_url'];

      if(!empty($video_url)){

        $params = parse_url($video_url);
        parse_str($params['query'],$query);
        $video_id = $query['v'];
    ?>

<div class="urls">
      <h1>URLS</h1>
     <p>https://img.youtube.com/vi/<?php echo $video_id; ?>/sddefault.jpg"</p>
     <p>https://img.youtube.com/vi/<?php echo $video_id; ?>/hqdefault.jpg"</p>
</div>

 <div id="results">
      <div class="grid">
      <h1>Standard Definition Version</h1>
      <img src="https://img.youtube.com/vi/<?php echo $video_id; ?>/sddefault.jpg">
      </div>

      <div class="grid">
      <h1>High Quality Version</h1>
      <img src="https://img.youtube.com/vi/<?php echo $video_id; ?>/hqdefault.jpg">
      </div>
  </div>
  
    <?php

      }else{
        echo "Please enter a url";
        exit();
      }
    

    }
    
    ?>

  </div>

  <!-- https://i3.ytimg.com/vi/image_id/maxresdefault.jpg
  https://i3.ytimg.com/vi/image_id/hqdefault.jpg -->

</body>
</html>