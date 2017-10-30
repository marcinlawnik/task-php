<html>
<head>

</head>
<body>
    <?php
        // @author: Marcin Lawniczak <marcin@Lawniczak.me>
        // @date: 24.10.2017
        // Use the PDO wrapper to connect to the quotes.sqlite database
        // Create a table containing quotes and names of famous people
        // Seed it with data from the quotes.txt file
        // Display quotes from people whose surnames begin with either a,e or o.

        // I've changed some records in quotes.txt in order to preserve data consistency

    try {
        $file_db = new PDO('sqlite:quotes.sqlite');
        $file_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $file_db->exec("CREATE TABLE IF NOT EXISTS quotes(
            id INTEGER PRIMARY KEY,
            quote TEXT,
            name TEXT)");

        $insert = "INSERT INTO quotes (quote, name) VALUES (:quote, :name)";
        $statement = $file_db->prepare($insert);
        $statement->bindParam(':quote', $quote);
        $statement->bindParam(':name', $name);

        $file = file_get_contents('./quotes.txt');
        $data = preg_split("/\s\.\s/", $file);
        foreach($data as $d) {
            if (preg_match('/(\s--\s)/', $d)) {
                $record = preg_split('/(\s--\s)/', $d);

                $strconcat = "";
                for ($i=0; $i<count($record)-1; $i++) {
                    $strconcat = $strconcat.$record[$i];
                    if ($i < count($record)-2)
                        $strconcat = $strconcat.' -- ';
                }

                $noquotes = preg_split('/^(\s)?[\"\']/',$strconcat);
                $noquotes = preg_split('/[\"\'](\s)?$/',$noquotes[1]);

                $quote = $noquotes[0];
                $name = $record[count($record)-1];
                $statement->execute();
            }
            else {
                if (preg_match('/^(\s)?[\"\']/', $d)) {
                    $noquotes = preg_split('/^(\s)?[\"\']/',$d);
                    $noquotes = preg_split('/[\"\'](\s)*$/',$noquotes[1]);
                    $quote = $noquotes[0];
                }
                else {
                    $quote = $d;
                }

                $name = "Unknown";
                $statement->execute();
            }
        }

        // I had some issue with REGEXP in SQL querry, so I used fancy workaround, but still have some problems 
        // with matching proper regex

        $results = $file_db->query("SELECT * FROM quotes WHERE name LIKE '% a%' OR '% e%' OR '% o%';");
    
        foreach($results as $result) {
            if (preg_match('/[A-Za-z]+\s[AEO]{1}[\'A-Za-z]+[^\\s]+[A-Za-z ]\s$/', $result['name']))
                echo '<p>'.$result['quote'].'</p>';
        }

        $file_db->exec("DROP TABLE quotes");
        $file_db = null;
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }

?>
</body>
</html>