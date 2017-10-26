# Tutorial

1. Zacznijmy od zapoznania się z [API githuba](https://developer.github.com/v3/issues/#list-issues-for-a-repository). Najbardziej interesuje na sekcja ```List issues for a repository```.  Widzimy tam adres pod jaki musimy wysłać żądanie, jego typ, parametry oraz przykładową odpowiedź.

2. Aby wykonać zapytanie musimy najpierw utworzyć klienta biblioteki ```Guzzle```.

3. Następnie za pomocą stworzonego klienta możemy wykonać zapytanie do API githuba. Jak utworzyć klienta i przykładowe zapytanie możesz zobaczyć [tutaj](http://docs.guzzlephp.org/en/stable/).

4. Po wykonaniu zapytania musimy przetworzyć odpowiedź w formacie JSON, na obiekt PHPa.
Zrobić możemy to za pomocą funkcji [json_decode](http://php.net/manual/pl/function.json-decode.php).

5. Aby zaznajomić się z strukturą obiektu możemy go tymaczasowo wyświetlić za pomocą instrukcji ``` echo var_dump($nazwa_zmiennej); ```.
  * Do pól obiektu możemy odnosić się za pomocą strzałki (```$nazwa_zmiennej->nazwa_pola```).
  * Gdy mamy doczynienia z tablicami używamy nawiasów kwadratowych (```$nazwa_zmiennej[0]```).
  * Możemy też łączyć podane operatory (```$nazwa_zmiennej->nazwa_pola[0]```). Za pomocą wyrażeń tego typu możemy odczytać tytuł oraz link do issue. 

6. Pozostaje nam wyświetlić pobrane issue. Instrukcje, które nam się mogą przydać to ``for`` i ``echo``.
