Zadanie ma na celu stworzenie prowizorycznego skryptu logowania. Każdy programista powinien potrafić odpowiednio
korzystać z zasobów internetu - tzn. umieć wyszukać rozwiązanie problemu na stackoverflow bądź w dokumentacji języka.
Ta krótka instrukcja pomoże Ci stworzyć być może Twoją pierwszą aplikację w PHP i pozwoli na szybkie zaznajomienie
z tym językiem. Powodzenia!


1. Przyjrzyj się plikowi ```login.php```. Jeśli korzystasz z bardziej zaawansowanego edytora, na pewno wyświetli Ci mnóstwo
    błędów, ale nie martw się - zaraz uzupełnimy kod i błędy znikną. Na początek warto zainicjować zmienną ```$passwordHashed```.W tym celu skorzystaj z wbudowanej funkcji PHP - ```password_hash```, która zaszyfruje hasło w celu
    poprawy bezpieczeństwa naszej aplikacji. Wyszukaj informacje o niej w sieci i zainicjuj wartość zmiennej. Jako
    parametr ```ALGORITHM``` użyj wartości ```PASSWORD_DEFAULT``` - zapewni to skorzystanie z zawsze optymalnego algorytmu
    oferowanego przez PHP, nawet w przypadku aktualizacji wersji języka.

2. Wyobraź sobie sytuację, gdy użytkownik jest już zalogowany - czy w takim wypadku przyda mu się dostęp do skryptu
    logowania? Raczej niezbyt, dlatego zablokujmy mu go i przekierujmy użytkownika od razu na stronę główną!
    Podpowiedź, jak to zrobić znajdziesz w pliku ```index.php```, w którym jest zaimplementowany podobny mechanizm.
    Ma tam on na celu niedopuszczenie niezalogowanego użytkownika do treści na naszej stronie.

3. W celu poprawy czytelności kodu oraz naszej wygody, aby uzyskać dostęp do loginu i hasła wprowadzonych przez
    użytkownika, warto stworzyć nowe zmienne o bardziej oczywistych nazwach i zapisać w nich te dane. Stwórz nową
    zmienną do przechowywania hasła według wzoru dla loginu. ```$_POST``` to jedna ze specjalnych przestrzeni zmiennych,
    w której znajdują się dane przesłane do naszego skryptu metodą ```POST``` (możesz poczytać o tym w internecie, a także
    o metodzie ```GET```).

4. Dochodzimy już do momentu sprawdzania poprawności wprowadzonych przez użytkownika danych. Zaczniemy od hasła.
    W tym celu stwórzmy sobie zmienną, która będzie przechowywała wartość ```false```, jeśli hasło jest niepoprawne
    i wartość ```true```, jeśli hasło się zgadza. Może się Tobie wydać logiczne, aby skorzystać ponownie z funkcji
    password_hash i porównać zwrócone ciągi znaków, jednak szyfry, nawet poprawnych haseł, nie będą się zgadzać.
    Bierze się to z zastosowania tzw. soli w obecnie używanym przez PHP dla wartości ```PASSWORD_DEFAULT``` algorytmie -```BCRYPT```. O tym również warto w wolnej chwili poczytać. Ale do rzeczy - w celu weryfikacji poprawności hasła
    skorzystaj z funkcji ```password_verify``` - zwróci ona true, jeśli hasła się zgadzają i false, jeśli nie. Pamiętaj także,
    że zaszyfrowane hasło jest przechowywane w stałej, dlatego doczytaj, jak odczytywać wartości stałych w PHP.

5. W tym miejscu sprawa robi się prosta - znasz już podstawowe mechanizmy w PHP i możesz zdecydować, czy zalogować
    użytkownika, czy nie. Korzystając z konstrukcji ```if``` oraz operatora logicznej koniunkcji ```&&``` sprawdź, czy login
    i hasło są poprawne i, jeśli tak, wykonaj następujące instrukcje: stwórz zmienną sesyjną o nazwie ```loggedIn```
    (przypomnij sobie, że korzystamy z niej, gdy chcemy sprawdzić, czy użytkownik jest zalogowany) oraz przekieruj
    użytkownika na stronę główną naszej aplikacji.

6. Należy także wziąć pod uwagę, co zrobić, gdy dane będą niepoprawne. W tym momencie pozwolę sobie rozjaśnić Tobie
    trochę działanie pliku ```login.php```. Zwróć uwagę na właściwość action znacznika form w kodzie HTML tej strony.
    Właściwość ta określa, do jakiej lokalizacji należy przesłać dane wprowadzone do formularza. W naszym wypadku
    nic do niej nie przypisujemy, co oznacza, że formularz prześle wprowadzone dane do tego samego pliku, czyli ```login.php```.
    Strona zostanie jakby odświeżona, ale w przestrzeni ```$_POST``` będą się znajdować pożądane przez nas dane. Dlatego też
    w punkcie 5. zrobiliśmy przekierowanie do ```index.php``` - w innym wypadku użytkownik po zalogowaniu nadal widziałby
    stronę logowania! W przypadku, gdy dane będą niepoprawne, jest to jednak zachowanie, jakiego od naszej aplikacji
    oczekujemy. Ponadto, powinna ona wyświetlić jakiś komunikat o błędzie. I tu zmierzamy do meritum - zauważ, że
    w kodzie HTML naszego pliku ```login.php``` została wtrącona drobna instrukcja PHP, która wyświetla zawartość zmiennej```$error```. Korzystając z konstrukcji if ... else dodaj linijkę kodu zapisującą w zmiennej ```$error``` komunikat o błędzie.

7. Jeśli wszystko poszło dobrze, możesz spróbować się zalogować. W tym celu otwórz terminal i przejdź do lokalizacji
    twojej aplikacji. Wpisz następujące polecenie: ```php -S localhost:8000```. Odpal przeglądarkę i w pasku adresu wpisz ```localhost:8000```. Powinna ukazać się nasza stronka logowania. Wpisz login (test) i hasło (test) i sprawdź, czy
    działa. Jeśli się udało, to super, ale to nie koniec naszej pracy :) Jeśli nie - spróbuj znaleźć błędy albo
    skontaktuj się z członkiem koła - na pewno ktoś Ci pomoże :)

8. Jeśli jednak wszystko się udało i widzisz stronę ```index.php``` możesz sprawdzić, czy działa nasze przekierowanie
    z pliku ```login.php``` w przypadku, gdy użytkownik jest zalogowany. Wypróbuj też przycisk Wyloguj - nie działa?
    Czy coś zrobiliśmy źle? Najzwyczajniej w świecie skrypt wylogowywania nie został przez nas jeszcze
    zaimplementowany. Dlatego stwórzmy plik o nazwie logout.php, aby pasowała ona do łącza zawartego w przycisku
    Wyloguj. Nie bój się - nie będzie to kolejne 5 punktów, bo wystarczą nam cztery instrukcje (a nawet trzy!).
    Na początek należy użyć ```session_start()```, aby móc korzystać ze zmiennych sesyjnych tylko po to, aby następnie
    je usunąć. Do tego celu wpisz w Google "php close session" i skorzystaj z odpowiedniej znalezionej przez siebie
    instrukcji. Następnie przekieruj użytkownika na stronę logowania.

Dziękuję za uwagę, mam nadzieję, że wszystko jest wytłumaczone zrozumiale i trochę rozjaśniło Tobie tajniki języka.
Zapraszam serdecznie do dalszej współpracy w obrębie naszego koła :)
