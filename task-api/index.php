<?php
require 'vendor/autoload.php';

// Utwórz klienta Guzzle

// Wykonaj zapytanie

// Przetwórz dane

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
        <?php // Wyświetl 5 issue { ?>
        <a href="<?php // Link do issue ?>" class="list-group-item"><?php // Tytuł issue ?></a>
        <?php } ?>
      </ul>
    </div>
  </div>
</body>
</html>
