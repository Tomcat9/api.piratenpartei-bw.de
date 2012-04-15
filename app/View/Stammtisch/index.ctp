<?php //CPYRGHT
/**
 * api.piratenpartei-bw.de
 * 
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @author  Thomas Heidrich
 * @copyright Copyright (c) 2012 Thomas Heidrich and other authors
 */
?><p>Diese Funktion stellt Stammtischinformationen auf verschiedene Arten dar.</p>
<h2>Karte</h2>
<p>Diese Funktion ist vorzugsweise durch HTML-iframe oder ähnlichen Funktionen einzusetzen, da sie <strong>eine vollständige HTML-Seite</strong> zurückgibt.</p>
<ul>
    <li><a href="stammtisch/karte">/stammtisch/karte</a></li>
</ul>
<h3>Parameter</h3>
<dl>
    <dt>minzoom</dt>
    <dd>Definiert, wie weit herausgezoomt werden kann. Erlaubt sind positive Ganzzahlen.</dd>
    <dt>maxzoom</dt>
    <dd>Definiert, wie weit hineingezoomt werden kann. Erlaubt sind positive Ganzzahlen.</dd>
    <dt>defaultzoom</dt>
    <dd>Definiert, aus welchem Wert der Zoom beim Aufruf stehen soll.  Erlaubt sind positive Ganzzahlen.</dd>
    <dt>scrollzoom</dt>
    <dd>Definiert, ob das Zoom mithilfe des Mausrads aktiviert werden soll. Erlaubt ist 0 oder 1.</dd>
    <dt>lat</dt>
    <dd>Definiert, welcher Breitengrad in der Karte zentriert werden soll. Erlaubt sind sinnvolle Dezimalzahlen mit einem Punkt als Dezimaltrennzeichen.</dd>
    <dt>lon</dt>
    <dd>Definiert, welcher Längengrad in der Karte zentriert werden soll. Erlaubt sind sinnvolle Dezimalzahlen mit einem Punkt als Dezimaltrennzeichen.</dd>
</dl>
<h4>Beispieleinbindung mit Standardwerten</h4>
<iframe class="karte" src="stammtisch/karte"></iframe>
<h4>Beispieleinbindung mit angepassten Werten für den KV Konstanz</h4>
<iframe class="karte" src="stammtisch/karte/lat:47.745/lon:9.012/scrollzoom:0/defaultzoom:11"></iframe>
