# task-api

Tworząc aplikacje internetowe często musimy skorzystać z danych, których nie jesteśmy w stanie sami wygenerować. W takich sytuacjach przychodzą nam z pomocą serwisy udostępniające API, za pomocą których możemy uzyskać dostęp do interesujących nas informacji.

## Task

Naszym zadaniem jest wykorzystać API udostępnione przez serwis GitHub do pobrania i wyświetlenia 5 ```issue``` z repozytorium ```akai-org/trios``` w przygotowanej tabeli. Aby ułatwić rozwiązanie zadanie, stworzyliśmy instrukcje instalacji (```INSTALL.md```) środowiska PHP wraz z biblioteką ```Guzzle```, która ułatwi nam wysyłanie zapytań.

Za pomocą komendy ``` php -S localhost:4000``` wykonanej w folderze z zadaniem możemy uruchomić lokalny serwer, aby móc sprawdzić poprawność rozwiązania pod adresem http://localhost:4000.

Rozwiązanie zamieść w przygotowanym pliku ```index.php```

W razie problemów zachęcamy do skorzystania z ```TUTORIAL.md```

### Przydatne linki

* [Dokumentacja biblioteki ```Guzzle```](http://docs.guzzlephp.org/en/stable/)

* [Dokumentacja GitHub API](https://developer.github.com/v3/issues/#list-issues-for-a-repository)

* [Przydatna funkcja json_decode](http://php.net/manual/pl/function.json-decode.php)
