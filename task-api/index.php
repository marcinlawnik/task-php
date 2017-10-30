<?php
require 'vendor/autoload.php';

// Utwórz klienta Guzzle
use GuzzleHttp\Client;
$client = new Client();

// Wykonaj zapytanie
$req = $client->request('GET','https://api.github.com/repos/akai-org/trios/issues');

// Przetwórz dane
$req_array = (json_decode($req->getBody(), true));

$issues = array();
foreach ($req_array as $r) {
  // filtering issues without pr - to get rid of that "filter", remove next line :)
  if (!isset($r['pull_request']))
    array_push($issues, ['title' => $r['title'], 'url' => $r['html_url']]);
}

?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>task-php</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
  <div class="row">
    <div class="list-group col-md-4 col-md-offset-4">
      <ul>
        <li class="list-group-item active">
          Last issues
        </li>
        <?php
          foreach($issues as $issue) {
            echo '<a href="'.$issue['url'].'" class="list-group-item">'.$issue['title'].'</a>';
          }
        ?>
      </ul>
    </div>
  </div>
</body>
</html>
