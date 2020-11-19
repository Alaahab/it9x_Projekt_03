<?php

$app = App::getInstance();
$userName = $app->getTable('User')->userName($_SESSION['auth']);
$categorys = App::getInstance()->getTable('Category')->extract('id', 'title');
error_reporting(0);
foreach ($userName as $personelData):
?>
<p><h2 class="trainingstagbuchNewH2">Willkommen <em><?= $personelData->vorname; ?> <?= $personelData->nachname; ?> </em></h2> </p>

<?php
endforeach;
$newcategory = App::getInstance()->getTable('category');

$dailydataTable = App::getInstance()->getTable('dailydata');
$zahl = 0;
if (!empty($_POST["entfernung"])) {
    $zahl = count($_POST["entfernung"]);
}

if ($zahl > 0 ) {
    for($i=0; $i<$zahl; $i++)
    {
        if(isset( $_POST['intragErstellen'] ))
        {
            $result = $dailydataTable->create([
                'category_id' => $_POST['category_id'][$i],
                'new_category_id' => $_POST['new_category_id'][$i],
                'entfernung' => $_POST['entfernung'][$i],
                'zeit' => $_POST['zeit'][$i],
                'gewicht' => $_POST['gewicht'],
                'user_id' => $_SESSION['auth'],
                'date' => $_POST['date'],
                'getrunken' => $_POST['getrunken'],
                'kommentare' => $_POST['kommentare']
            ]);

            if (!empty($_POST['new_category_id'][$i])) {
                $query = $newcategory->create([
                    'title' => $_POST['new_category_id'][$i],
                ]);
            }

        }
    }

    if ($result) {
        header('Location: index.php?p=training');
    }
}

?>
<head>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
<details open>
    <summary>Trainingstagebuch</summary>
    <details class="subdetail">
        <summary class="subsummary">Neuen Eintrag erstellen</summary>
        <form method="post">
            <table class="input_fields_wrap">
                <tr>
                    <input name="date" type="date" />
                </tr>
                <tr class="append">
                    <td>wählen Sie ihr Aktivität <select name="category_id[]" ><option></option><?php foreach ($categorys as $sportart): echo "<option>" . $sportart . "</option>" ; endforeach; ?></select></td>
                    <td>neu Aktivität hinzufügen <input name="new_category_id[]" type=text></td>
                    <td><input name="entfernung[]"  type=text> km</td>
                    <td><input name="zeit[]" type=text> min</td>
                </tr>
            </table>
            <button id="add_field_button" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-plus"></span> Plus
            </button>
            </br>
            </br>
            <label>Gewicht</label>
            <input name="gewicht" type=text />
            <label>Getrunken</label>
            <input name="getrunken" type=text />
            <label>Kommentare</label>
            <textarea name="kommentare" ></textarea>
            <br>
            <br>
            <button name="intragErstellen">Eintrag erstellen</button>
        </form>
    </details>
    <div>
        <?php for ($i = 0; $i < 7; $i++) {
            $date = date('Y-m-d', strtotime('- '.$i.' days'));
            ?>
            <table>
                <thead>
            <th colspan=4><?= $date; ?></th>
                </thead>
                <tbody>
                <tr>
                    <td  class=""><strong>Sport</strong></td>
                    <td class=""><strong>Entfernung</strong></td>
                    <td class=""><strong>Zeit</strong></td>
                </tr>
                <?php
    foreach (\App::getInstance()->getTable('dailydata')->findUserData($_SESSION['auth'], $date) as $userdata):
        ?>
        <tr>
            <td><?php if ($userdata->category_id != '')  { echo $userdata->category_id; } else { echo $userdata->new_category_id; } ?></td>
            <td><?= $userdata->entfernung; ?> Km</td>
            <td> <?= $userdata->zeit; ?> min</td>
        </tr>

    <?php endforeach; ?>
                <tr>
                    <td colspan=3 class="description">Gesundheit &amp; Ernährung </td>
                </tr>
                <tr>
                    <td>Gewicht</td>
                    <td colspan=2><?= $userdata->gewicht; ?></td>
                </tr>
                <tr>
                    <td>Getrunken</td>
                    <td colspan=2><?= $userdata->getrunken; ?></td>
                </tr>
                <tr>
                    <td rowspan=5>Kommentare</td>
                </tr>
                <tr>
                    <td rowspan=5><?=$userdata->kommentare;?></td>
                </tr>
                </tbody>
            </table>

        <?php
            $userdata = [];
}

?>
<?php

        $zieldataTable = App::getInstance()->getTable('zieldata');
        $zahl = 0;
        if (!empty($_POST["time"])) {
        $zahl = count($_POST["time"]);
        }

        if ($zahl > 0 ) {
        for($i=0; $i<$zahl; $i++)
        {
        if(isset( $_POST['bestaetigen'] ))
        {
        $rsl = $zieldataTable->create([
        'zielcategory_id' => $_POST['zielcategory_id'][$i],
        'new_ziel' => $_POST['new_ziel'][$i],
        'distance' => $_POST['distance'][$i],
        'time' => $_POST['time'][$i],
        'weight' => $_POST['weight'],
        'user_id' => $_SESSION['auth']

        ]);

        }
        }

        if ($rsl) {
        header('Location: index.php?p=training');
        }
        }
?>
    </div>
</details>
<details open>
    <summary>Meine Ziele</summary>
    <details class="subdetail">
        <summary class="subsummary">Ziele bearbeiten</summary>
        <form method="post">
            <table class="input_fields_wrap_bis">
                <tr class="append">
                    <td>wählen Sie ihr Ziel <select name="zielcategory_id[]" ><option></option><?php foreach ($categorys as $sportart): echo "<option>" . $sportart . "</option>" ; endforeach; ?></select></td>
                    <td>oder ihr Ziel hinzufügen <input name="new_ziel[]" type=text></td>
                    <td><input name="distance[]"  type=text> km</td>
                    <td><input name="time[]" type=text> min</td>
                </tr>
            </table>
            <button id="add_field_button_bis" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-plus"></span> Plus
            </button>
            </br>
            </br>
            <label>Gewicht</label>
            <input name="weight" type=text />
            <br>
            <br>
            <button name="bestaetigen">bestätigen</button>
        </form>
    </details>
    <div>

        <table>
            <thead>
            <tr>
                <td  class=""><strong>Sport</strong></td>
                <td class=""><strong>Entfernung</strong></td>
                <td class=""><strong>Zeit</strong></td>
            </tr>
            </thead>

            <?php
            foreach (\App::getInstance()->getTable('zieldata')->zielUserData($_SESSION['auth']) as $zieluserdata):
                ?>
                <tr>
                    <td><?php if ($zieluserdata->zielcategory_id != '')  { echo $zieluserdata->zielcategory_id; } else { echo $zieluserdata->new_ziel; } ?></td>
                    <td><?= $zieluserdata->distance; ?> Km</td>
                    <td> <?= $zieluserdata->time; ?> min</td>
                </tr>

            <?php endforeach; ?>

        </table>
        <table>
            <thead>
            <th colspan=2>Gesundheit &amp; Ernährung</th>
            </thead>
            <tbody>
            <tr>
                <td>Gewicht</td>
                <td> <?= $zieluserdata->weight; ?> kg</td>
            </tr>
            </tbody>
        </table>
    </div>
</details>
<details open>
    <summary>Grafiken</summary>
    <?php

    for ($i = 6; $i > -1; $i--) {
        $date = date('Y-m-d', strtotime('- ' . $i . ' days'));
        foreach (\App::getInstance()->getTable('dailydata')->distanceSum($_SESSION['auth'], $date) as $distance) {

            $dataPoints[] =
                array("y" => $distance->distance, "label" => $date);
        }

        foreach (\App::getInstance()->getTable('dailydata')->timeSum($_SESSION['auth'], $date) as $time) {
            $dataPoints2[] =
                array("y" => $time->time, "label" => $date);
        }


    }

?>
        <script>
            window.onload = function () {

                var chart = new CanvasJS.Chart("chartContainer", {
                    title: {
                        text: "your last 7 days statistic"
                    },
                    axisY: {
                        title: "Distance of Km"
                    },
                    axisY2: {
                        title: "Time of minute"
                    },
                    data: [{
                        type: "line",
                        dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                    },
                        {
                            type: "line",
                            axisYType: "secondary",
                            dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
                        }]
                });
                chart.render();

            }
        </script>
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
    </canvas>
</details>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>

    $('.starter-template').css({
        'padding-top' : '20px'
    });
    $(document).ready(function() {
        var max_fields      = 3; //maximum input boxes allowed
        var wrapper   		= $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $("#add_field_button"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<tr class="append">\n' +
                    '        <td>wählen Sie ihr Aktivität <select name="category_id[]" ><option></option><?php foreach ($categorys as $sportart): echo "<option>" . $sportart . "</option>" ; endforeach; ?></select></td>\n' +
                    '        <td>neu Aktivität hinzufügen <input name="new_category_id[]" type=text></td>\n' +
                    '        <td><input name="entfernung[]"  type=text> km</td>\n' +
                    '        <td><input name ="zeit[]"  type=text> min</td>\n' +
                    '    </tr>');
            }
        });
    });

    $(document).ready(function() {
        var max_fields      = 3; //maximum input boxes allowed
        var wrapper   		= $(".input_fields_wrap_bis"); //Fields wrapper
        var add_button      = $("#add_field_button_bis"); //Add button ID

        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<tr class="append">\n' +
                    '        <td>wählen Sie ihr Aktivität <select name="zielcategory_id[]" ><option></option><?php foreach ($categorys as $sportart): echo "<option>" . $sportart . "</option>" ; endforeach; ?></select></td>\n' +
                    '        <td>neu Aktivität hinzufügen <input name="new_ziel[]" type=text></td>\n' +
                    '        <td><input name="distance[]"  type=text> km</td>\n' +
                    '        <td><input name ="time[]"  type=text> min</td>\n' +
                    '    </tr>');
            }
        });
    });
</script>
</body>
