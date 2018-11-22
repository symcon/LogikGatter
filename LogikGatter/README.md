# LogikGatter

Dieses Modul ermöglicht die Bestimmungen logischer Verknüpfung zwischen mehreren Variablen. Hierbei wird die boolsche Interpretation der Eingangsvariablen verwendet. 

### Inhaltverzeichnis

1. [Funktionsumfang](#1-funktionsumfang)
2. [Voraussetzungen](#2-voraussetzungen)
3. [Software-Installation](#3-software-installation)
4. [Einrichten der Instanzen in IP-Symcon](#4-einrichten-der-instanzen-in-ip-symcon)
5. [Statusvariablen und Profile](#5-statusvariablen-und-profile)
6. [WebFront](#6-webfront)
7. [PHP-Befehlsreferenz](#7-php-befehlsreferenz)

### 1. Funktionsumfang

* Bestimmung der logischen Verknüpfung von Variablenwerten
* Unterstützte Operationen:
  * OR
  * AND
  * NOR
  * NAND
* Ausgang wird aktuell gehalten und aktualisiert sich sobald eine der Eingangsvariablen sich ändert

### 2. Voraussetzungen

- IP-Symcon ab Version 5.x

### 3. Software-Installation

- Über das Modul-Control folgende URL hinzufügen: `https://github.com/DrNiels/LogikGatter.git`

### 4. Einrichten der Instanzen in IP-Symcon

- Unter "Instanz hinzufügen" ist das 'LogikGatter'-Modul unter dem Hersteller '(Sonstige)' aufgeführt
- Bei 'Berechnung' die gewünschte Operation auswählen
- In der Liste 'Eingabe' die gewünschten Eingabevariablen auswählen
  - 'Invertieren' kann aktiviert werden um den Eingabewert dieser Variable zu negieren
  - Wird eine nicht-Boolean Variable ausgewählt, so wird diese als boolscher Wert interpretiert, z.B. 0 als false

### 5. Statusvariablen und Profile

Die Statusvariable "Ausgabe" beinhaltet das aktuelle Ergebnis der logischen Operation

### 6. WebFront

Die aktuelle Ausgabe wird angezeigt.

### 7. PHP-Befehlsreferenz

Das Modul stellt keine PHP-Befehle zur Verfügung.