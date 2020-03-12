# GRUPP 1E Millhouse

## Installering

Installera alla dev dependencies med node package manager (npm) genom att skriva: `npm install` i terminalen.
<br>
Använd databas_millhouse.sql - scriptet för att importera databasen.<br>
SQLscriptet innehåller två användare från början. "Admin" och "User".
Inloggningsuppgifter till Millhouse:<br>
Användarnamn: Admin, Lösen: Password<br>
Användarnamn User, Lösen: Password<br>
<br>
Admin har alla rättigheter. User agerar "vanlig" användare med enbart rättigheter som att läsa och kommentera inlägg etc.<br>

I database_connection.php skriver du in dina serverinställningar.<br>



## KODSTANDARD/Naming conventions

POST/GET/SESSION: Här använder vi snakecase.<br>
HTML-classes: Här använder vi oss av BEM naming scheme.<br>

## Dev dependencies
Vi använder oss av gulp taskrunner med en sass compiler<br>
`npm install` för att installera.<br>

### GULP
I terminalen:<br>
För att compila sass skriv in: gulp styles<br>
För att hålla kolla och uppdatera vid ändring i sassfiler: gulp watch<br>

## Mappstruktur
Images: Bilder skall vara i en rimlig storlek.<br>
Tumregel: max 1mb, men helst <500kb.<br>
<br>
Views: Alla synliga sidor förutom index.php läggs här.<br>
Handlers: Här lägger vi alla phpfiler som enbart fyller funktion, inget som ska synas för användare.<br>
Includes-partials: Här lägger vi phpfiler som include:as.<br>
Classes: Här lägger vi alla classes i seperata phpfiler.<br>
Uploads: Här hamnar alla filer som laddas upp<br>

## GIT

Vi gör en ny branch för varje ny funktion/trellokort.<br>
Branchen döps till ett namn som hänvisar till ett trellokort, eller vad branchen har för huvudsyfte.<br>
I commits skall vi beskriva kort , men utförligt vad vi gjort.<br>
Sedan mergar vi nya branchen med master när vi är färdiga.<br>

### Om det inte funkar att ladda upp fil!
Ändra read/write-rättigheter på din mac/pc på ../images/uploads så kommer det funka superduper!
