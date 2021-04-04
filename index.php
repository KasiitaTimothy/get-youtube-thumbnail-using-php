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
    <h1>ENTER A VALID YOUTUBE URL</h1>
    <p>Example of url: <b>https://www.youtube.com/watch?v=CqUJ7nLSLzs</b> </p>
     <form  method="post">
     <input type="url" name="youtube_url" autocomplete="off">
      <input type="submit" name="submit" value="Get Thumbnail">
     </form>

    <?php
    
    if(isset($_POST['submit'])){

      $video_url = $_POST['youtube_url'];

      if(!empty($video_url)){

        $params = parse_url($video_url);

        if($params['host'] !== "www.youtube.com" && $params['host'] !== "youtube.com" ){
          echo "<p class='error'>Please enter a youtube link</p>";
          exit();
        }

        if($params['path'] !== "/watch" ){
          echo "<p class='error'>Invalid Video Path.</p>";
          exit();
        }

        if(!isset($params['query'])){
          echo "<p class='error'>The query part for the url is not set. Get a correct URL.</p>";
          exit();
        }

        parse_str($params['query'],$query);
        if(isset($query['v'])){
          $video_id = $query['v'];
    ?>

<div class="urls">
      <h1>Image URLS</h1>
     <p>https://img.youtube.com/vi/<?php echo $video_id; ?>/maxresdefault.jpg</p>
     <p>https://img.youtube.com/vi/<?php echo $video_id; ?>/hqdefault.jpg</p>
</div>

 <div id="results">
      <div class="grid">
      <h1>Maximum Resolution Version</h1>
      <img src="https://img.youtube.com/vi/<?php echo $video_id; ?>/maxresdefault.jpg">
      </div>

      <div class="grid">
      <h1>High Quality Version</h1>
      <img src="https://img.youtube.com/vi/<?php echo $video_id; ?>/hqdefault.jpg">
      </div>
  </div>
  
    <?php
      }else{
        echo "<p class='error'>Invalid Video Id Query.</p>";
        exit();
      }

      }else{
        echo "<p class='error'>Please enter a url.</p>";
        exit();
      }
    

    }
    
    ?>

  </div>



</body>
</html>
