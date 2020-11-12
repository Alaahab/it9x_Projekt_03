<?php

use Core\HTML\BootstrapForm;

$form = new BootstrapForm($_POST);


?>
<head>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
<details open>
    <summary>Trainingstagebuch</summary>
    <details class="subdetail">
        <summary class="subsummary">Neuen Eintrag erstellen</summary>
        <form>
            <table><tr><td><label>Laufen</label></td><td><input type=text>km</td><td><input type=text>min</td></tr><tr><td><label>Schwimmen</label></td><td><input type=text>km</td><td><input type=text>min</td></tr><tr><td><select><option>---</option><option>Radfahren</option></select></td></tr></table>
            <a>+ fehlende Sportarten hinzufügen</a>
            <br>
            <label>Gewicht</label>
            <input name="" type=text>
            <label>Getrunken</label>
            <input type=text>
            <label>Kommentare</label>
            <textarea></textarea>
            <br>
            <button>Eintrag erstellen</button>
        </form>
    </details>
    <div>
        <table><thead><th colspan=4>2020-11-02</th></thead><tbody><tr><td colspan=3 class="description">Sport</td><td class="description">Kommentare</td></tr><tr><td>Laufen</td><td>5.00 km</td><td>40.00 min</td><td rowspan=5>Ich bin ein Testeintrag</td></tr><tr><td>Schwimmen</td><td>2.50 km</td><td>60.00 min</td></tr><tr><td colspan=3 class="description">Gesundheit &amp; Ernährung </td></tr><tr><td>Gewicht</td><td colspan=2>50 kg</td></tr><tr><td>Getrunken</td><td colspan=2>2 Liter</td></tr></tbody></table>    </div>
</details>
<details open>
    <summary>Meine Ziele</summary>
    <details class="subdetail">
        <summary class="subsummary">Ziele bearbeiten</summary>
        <form>
            <table><tr><td><label>Laufen</label></td><td><input type=text>km</td><td><input type=text>min</td></tr><tr><td><label>Schwimmen</label></td><td><input type=text>km</td><td><input type=text>min</td></tr><tr><td><select><option>---</option><option>Radfahren</option></select></td></tr></table>
            <a>+ fehlende Sportarten hinzufügen</a>
            <br>
            <label>Gewicht</label>
            <input type=text>
            <label>Getrunken</label>
            <input type=text>
        </form>
    </details>
    <div>

        <table><thead><th colspan=3>Sport</th></thead><tr><td>Laufen</td><td>5.00 km</td><td>30.00 min</td></tr></table><table><thead><th colspan=2>Gesundheit &amp; Ernährung</th></thead><tbody><tr><td>Gewicht</td><td>55 kg</td></tr><tr><td>Getrunken</td><td>3 Liter</td></tr></tbody></table>    </div>
</details>
<details open>
    <summary>Grafiken</summary>
    <canvas id="myCanvas" width="200" height="100" style="border:1px solid #000000;background-color:white">
    </canvas>
</details>
</body>
