# GRUPP 1E Millhouse

## Installering

Installera alla dev dependencies med node package manager (npm) genom att skriva "npm install" i terminalen.
Använd databas_millhouse.sql - scriptet för att importera databasen.
SQLscriptet innehåller två användare från början. "Admin" och "User".
Inloggningsuppgifter till Millhouse:
Användarnamn: Admin, Lösen: Password
Användarnamn User, Lösen: Password

I database_connection.php skriver du in dina serverinställningar.

Admin har alla rättigheter. User agerar "vanlig" användare med enbart rättigheter som att läsa och kommentera inlägg etc.


## KODSTANDARD/Naming conventions

POST/GET/SESSION: Här använder vi snakecase.
HTML-classes: Här använder vi oss av BEM naming scheme.

## Dev dependencies
Vi använder oss av gulp taskrunner med en sass compiler
npm install för att installera.

### GULP
I terminalen:
För att compila sass skriv in: gulp styles
För att hålla kolla och uppdatera vid ändring i sassfiler: gulp watch

## Mappstruktur
Images: Bilder skall vara i en rimlig storlek.
Tumregel: max 1mb, men helst <500kb.

Views: Alla synliga sidor förutom index.php läggs här.
Handlers: Här lägger vi alla phpfiler som enbart fyller funktion, inget som ska synas för användare.
Includes-partials: Här lägger vi phpfiler som include:as.
Classes: Här lägger vi alla classes i seperata phpfiler.
Uploads: Här hamnar alla filer som laddas upp

## GIT

Vi gör en ny branch för varje ny funktion/trellokort.
Branchen döps till ett namn som hänvisar till ett trellokort.
I commits skall vi beskriva kort , men utförligt vad vi gjort.
Sedan mergar vi nya branchen med master när vi är färdiga.


