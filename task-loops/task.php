<html>
    <head>   
	    <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <?php
        // @author: Marcin Lawniczak <marcin@Lawniczak.me>
        // @date: 24.10.2017
        // This is a simple task
        // Write out numbers from 100 to 0, each in a separate line
        // If the number is a multiple of 4, write Boom instead of the number
        // If the number is a multiple of 7, write Fire instead of the number
        // If the number is a multiple of 10, make it red

        for ($i=100; $i>=0; $i--) {

            if ($i%4 == 0 && $i%7 == 0)
                $content = "BoomFire";
            else if ($i%4 == 0)
                $content = "Boom";
            else if ($i%7 == 0)
                $content = "Fire";
            else
                $content = $i;
            
            $highlight = $i%10 == 0?" class=\"highlight\"":"";
            echo "<p$highlight>$content</p>";
        }

        ?>
    </body>
</html>