<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>YouTube Video Search</title>
    <style>
      .container {
        display: flex;
        flex-direction: column;
        height: 100vh;
        width: 100%;
        flex-wrap: wrap;
        align-items: center;
      }
      .video {
        margin-bottom: 20px;
      }
      .video img {
        width: 320px;
        height: 180px;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <h1>YouTube Video Search</h1>
      <form id="search-form" method="post">
        <input type="text" name="search-input" placeholder="Enter search term" />
        <button type="submit" id="search-button">Search</button>
      </form>
      <div id="video-container">
        <?php
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $query = urlencode($_POST['search-input']);
            $apiKey = "AIzaSyDI7igg3jfKJyXD4Tsu8Xe9yt0lVcOVFvU";
            $url = "https://www.googleapis.com/youtube/v3/search?part=snippet&q=$query&key=$apiKey";

            $response = file_get_contents($url);
            if ($response) {
              $data = json_decode($response, true);
              $videos = $data['items'];

              foreach ($videos as $video) {
                echo "<div class='video'>";
                echo "<img src='" . $video['snippet']['thumbnails']['medium']['url'] . "' alt='" . htmlspecialchars($video['snippet']['title']) . "'>";
                echo "<h3>" . htmlspecialchars($video['snippet']['title']) . "</h3>";
                echo "<p>" . htmlspecialchars($video['snippet']['description']) . "</p>";
                echo "</div>";
              }
            } else {
              echo "<p>Error fetching videos</p>";
            }
          }
        ?>
      </div>
    </div>
  </body>
</html>
