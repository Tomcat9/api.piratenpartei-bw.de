<?php //CPYRGHT
/**
 * api.piratenpartei-bw.de
 * 
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @author  Thomas Heidrich
 * @copyright Copyright (c) 2012 Thomas Heidrich and other authors
 */
?><p>Diese Funktion stellt Stammtischinformationen auf verschiedene Arten dar.</p>
<h2>Kalender</h2>
<p>Diese Funktion stellt alle zur Zeit verfügbaren Stammtischtermine in einem Kalender dar. Beim Klick auf einen Termin, öffnet sich die jeweilige Stammtischwikiseite.</p>
<h3>Parameter</h3>
<p>Die folgenden Parameter können gesetzt werden.</p>
<dl>
    <dt>defaultview</dt>
    <dd>Definiert, welche Ansicht voreingestellt ist. Erlaubt sind die Werte month, week und day.</dd>
    <dt>plz</dt>
    <dd>Definiert, welche Postleitzahlenbereiche im Ergebnis vorkommen sollen. Bis zu 21 mit Komma getrennte Postleitzahlen(bereiche) können dabei angegeben werden.</dd>
</dl>
<h4>Beispieleinbindung</h4>
<ul>
    <li><a href="<?php echo $baseurl; ?>stammtisch/kalender">/stammtisch/kalender</a></li>
</ul>
<iframe class="karte" src="<?php echo $baseurl; ?>stammtisch/kalender"></iframe>
<h4>Beispieleinbindung mit Werten für die PLZ-Bereiche 78, 70 und 6 in der Wochenansicht</h4>
<ul>
    <li><a href="<?php echo $baseurl; ?>stammtisch/kalender/plz:78,70,6/defaultview:week">/stammtisch/kalender/plz:78,70,6/defaultview:week</a></li>
</ul>
<iframe class="karte" src="<?php echo $baseurl; ?>stammtisch/kalender/plz:78,70,6/defaultview:week"></iframe>


<h2>Webcal</h2>
<p>Diese Funktion erstellt eine maschinenauslesbare Zusammenfassung aller zur Zeit verfügbaren Stammtischtermine.</p>
<h3>Parameter</h3>
<p>Die folgenden Parameter können gesetzt werden.</p>
<dl>
    <dt>plz</dt>
    <dd>Definiert, welche Postleitzahlenbereiche im Ergebnis vorkommen sollen. Bis zu 21 mit Komma getrennte Postleitzahlen(bereiche) können dabei angegeben werden.</dd>
</dl>
<h4>Beispieleinbindung mit Werten für den KV Konstanz</h4>
<img src="<?php echo $baseurl; ?>img/stammtisch/webcal-evolution.jpg"/>
<ul>
    <li><a href="webcal://<?php echo env('SERVER_NAME').$baseurl; ?>stammtisch/webcal/plz:784,782,783">webcal://<?php echo env('SERVER_NAME').$baseurl; ?>stammtisch/webcal/plz:784,782,783</a></li>
</ul>


<h2>Karte</h2>
<p>Diese Funktion stellt alle zur Zeit Stammtischtermine in einer OpenStreetMap-Karte dar. Beim Klick auf einen Stammtischpin werden Detailinformationen dargestellt.</p>
<h3>Parameter</h3>
<p>Die folgenden Parameter können gesetzt werden.</p>
<dl>
    <dt>minzoom</dt>
    <dd>Definiert, wie weit herausgezoomt werden kann. Erlaubt sind positive Ganzzahlen.</dd>
    <dt>maxzoom</dt>
    <dd>Definiert, wie weit hineingezoomt werden kann. Erlaubt sind positive Ganzzahlen.</dd>
    <dt>defaultzoom</dt>
    <dd>Definiert, aus welchem Wert der Zoom beim Aufruf stehen soll.  Erlaubt sind positive Ganzzahlen.</dd>
    <dt>scrollzoom</dt>
    <dd>Definiert, ob das Zoom mithilfe des Mausrads aktiviert werden soll. Erlaubt sind 0 oder 1.</dd>
    <dt>dragging</dt>
    <dd>Definiert, ob das Verschieben der Karte aktiviert werden soll. Erlaubt sind 0 oder 1.</dd>
    <dt>lat</dt>
    <dd>Definiert, welcher Breitengrad in der Karte zentriert werden soll. Erlaubt sind sinnvolle Dezimalzahlen mit einem Punkt als Dezimaltrennzeichen.</dd>
    <dt>lon</dt>
    <dd>Definiert, welcher Längengrad in der Karte zentriert werden soll. Erlaubt sind sinnvolle Dezimalzahlen mit einem Punkt als Dezimaltrennzeichen.</dd>
</dl>
<h4>Beispieleinbindung mit Standardwerten</h4>
<ul>
    <li><a href="<?php echo $baseurl; ?>stammtisch/karte">/stammtisch/karte</a></li>
</ul>
<iframe class="karte" src="<?php echo $baseurl; ?>stammtisch/karte"></iframe>
<h4>Beispieleinbindung mit angepassten Werten für den KV Konstanz</h4>
<ul>
    <li><a href="<?php echo $baseurl; ?>stammtisch/karte/lat:47.745/lon:9.012/scrollzoom:0/defaultzoom:11">/stammtisch/karte/lat:47.745/lon:9.012/scrollzoom:0/defaultzoom:11</a></li>
</ul>
<iframe class="karte" src="<?php echo $baseurl; ?>stammtisch/karte/lat:47.745/lon:9.012/scrollzoom:0/defaultzoom:11"></iframe>
