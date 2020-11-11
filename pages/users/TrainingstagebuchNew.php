<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Trainingstagebuch</title>
    <link rel="stylesheet" href="../public/css/style.css">
</head>
<body>
<details open>
    <summary>Trainingstagebuch</summary>
    <details class="subdetail">
        <summary class="subsummary">Neuen Eintrag erstellen</summary>
        <form>
            <?php
            $db = new mysqli('localhost', 'root','','sportapplication');

            $userID=1;
            $sports="(";
            $request = "SELECT DISTINCT sportID, sportName, sportUnit1, sportUnit2 
						From users 
							Join trainings on trainingUserID = userID 
							Join training2sport on T2STrainingsID=trainingID 
							Join sports on T2SsportID=sportID
							Where userID=".$userID;
            $result = $db-> query($request) or die($db->error);
            echo "<table>";
            if ($result -> num_rows){
                $datensatz = $result->fetch_all();
                $count = $result->num_rows;
                for ($i=0; $i<$count; $i++){
                    echo "<tr>";
                    echo "<td><label>".$datensatz[$i][1]."</label></td>";
                    echo "<td><input type=text>".$datensatz[$i][2]."</td>";
                    echo "<td><input type=text>".$datensatz[$i][3]."</td>";
                    $sports=$sports.$datensatz[$i][0];
                    if($i!=$count-1){
                        $sports=$sports.",";
                    }
                    echo "</tr>";
                }
            }
            //Einfügen einer neuen Sportart
            $request = "SELECT sportID, sportName, sportUnit1, sportUnit2
												From sports
												Where sportID NOT IN ".$sports.")";

            $result = $db -> query($request) or die($db->error);


            if($result -> num_rows){
                echo "<tr>";
                echo "<td>";
                $count= $result -> num_rows;
                $datensatz = $result -> fetch_all();
                echo "<select>";
                echo "<option>---</option>";
                for($i=0; $i<$count; $i++){
                    echo "<option>".$datensatz[$i][1]."</option>";
                }

                echo "</select>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>

            <a>+ fehlende Sportarten hinzufügen</a>
            <br>
            <label>Gewicht</label>
            <input type=text>
            <label>Getrunken</label>
            <input type=text>
            <label>Kommentare</label>
            <textarea></textarea>
            <br>
            <button>Eintrag erstellen</button>
        </form>
    </details>
    <div>
        <?php
        $userID=1; //ToDo: userID aus url holen

        //Daten für Trainingstagebuch über userID holen
        //ToDo: Datum filtern, order by date descending
        $db = new mysqli('localhost', 'root','','sportapplication');
        $trainingsrequest="Select trainingID,trainingWeight, trainingDrink, trainingDate, trainingComment 
									From trainings
									Where trainingUserId=".$userID;
        $erg = $db -> query($trainingsrequest) or die($db->error);
        if(!$erg-> num_rows){
            echo "Es sind keine Einträge vorhanden.";
            return;
        }

        $rows = $erg-> num_rows;
        $datensatz = $erg->fetch_all(); //Macht Daten zu Array ==> aber keine Bennenung mehr vorhanden, daher abfrage über Index

        //Tabelle für jeden Tag des Trainingsplans erstellen
        echo "<table>";
        for($i=0; $i< $rows; $i++){
            $currentrow = $datensatz[$i];

            echo "<thead>";
            echo "<th colspan=4>".$currentrow[3]."</th>";
            echo "</thead>";

            echo "<tbody>";

            echo "<tr>";
            echo "<td colspan=3 class=\"description\">Sport</td>";
            echo "<td class=\"description\">Kommentare</td>";
            echo "</tr>";

            //Daten zu den Sportart passend zum aktuellen Eintrag über die trainingsID holen
            $sportsrequest = "Select sportName, sportUnit1, sportUnit2, T2SValue1, T2SValue2
												From training2sport
													join sports on T2SsportID=sportID
												Where T2StrainingsID=".$currentrow[0];
            $result = $db -> query($sportsrequest) or die($db->error);

            //Daten zu den Essen passend zum aktuellen Eintrag über die trainingsID holen
            $mealrequest = "Select mealName
												From training2meal
													join meals on T2MmealID=mealID
												Where T2MtrainingID=".$currentrow[0];
            $mealResult = $db -> query($mealrequest) or die($db->error);

            //Zeilen mit Eintrag für jede gemachte Sportart erstellen
            //ToDo: Zeile für Kommentart ohne Sport erstellen
            $sportCount = $result -> num_rows;
            $mealCount = $mealResult -> num_rows;
            if($sportCount>0){
                $sports= $result -> fetch_all();

                for($j=0; $j<$sportCount; $j++){
                    $currentsport = $sports[$j];

                    echo "<tr>";
                    echo "<td>".$currentsport[0]."</td>";
                    echo "<td>".$currentsport[3]." ".$currentsport[1]."</td>";
                    echo "<td>".$currentsport[4]." ".$currentsport[2]."</td>";
                    if($j==0){
                        $count=$sportCount+3+$mealCount;
                        echo "<td rowspan=".$count.">".$currentrow[4]."</td>";
                    }
                    echo "</tr>";
                }
            }

            echo "<tr>";
            echo "<td colspan=3 class=\"description\">Gesundheit &amp; Ernährung </td>";
            if($sportCount==0){
                $count=3+$mealCount;
                echo "<td rowspan=".$count.">".$currentrow[4]."</td>";
            }
            echo "</tr>";

            echo "<tr>";
            echo "<td>Gewicht</td>";
            echo "<td colspan=2>".$currentrow[1]." kg</td>";
            echo "</tr>";

            echo "<tr>";
            echo "<td>Getrunken</td>";
            echo "<td colspan=2>".$currentrow[2]." Liter</td>";
            echo "</tr>";

            //Zeilem mit eintrag für jede Mahlzeit erstellen
            if($mealCount>0){
                $meals = $mealResult->fetch_all();

                for($j=0; $j<$mealCount;$j++){
                    $currentMeal = $meals[$j];
                    echo "<tr>";
                    if($j==0){
                        echo "<td rowspan=".$mealCount.">Essen</td>";
                    }
                    echo "<td>".$currentMeal[0]."</td>";
                    echo "</tr>";
                }
            }

            echo "</tbody>";

        }
        echo "</table>";
        ?>
    </div>
</details>
<details open>
    <summary>Meine Ziele</summary>
    <details class="subdetail">
        <summary class="subsummary">Ziele bearbeiten</summary>
        <form>
            <?php
            $db = new mysqli('localhost', 'root','','sportapplication');

            $userID=1;
            $sports="(";
            $request = "SELECT DISTINCT sportID, sportName, sportUnit1, sportUnit2 
						From users 
							Join trainings on trainingUserID = userID 
							Join training2sport on T2STrainingsID=trainingID 
							Join sports on T2SsportID=sportID
							Where userID=".$userID;
            $result = $db-> query($request) or die($db->error);
            echo "<table>";
            if ($result -> num_rows){
                $datensatz = $result->fetch_all();
                $count = $result->num_rows;
                for ($i=0; $i<$count; $i++){
                    echo "<tr>";
                    echo "<td><label>".$datensatz[$i][1]."</label></td>";
                    echo "<td><input type=text>".$datensatz[$i][2]."</td>";
                    echo "<td><input type=text>".$datensatz[$i][3]."</td>";
                    $sports=$sports.$datensatz[$i][0];
                    if($i!=$count-1){
                        $sports=$sports.",";
                    }
                    echo "</tr>";
                }
            }
            //Einfügen einer neuen Sportart
            $request = "SELECT sportID, sportName, sportUnit1, sportUnit2
												From sports
												Where sportID NOT IN ".$sports.")";

            $result = $db -> query($request) or die($db->error);


            if($result -> num_rows){
                echo "<tr>";
                echo "<td>";
                $count= $result -> num_rows;
                $datensatz = $result -> fetch_all();
                echo "<select>";
                echo "<option>---</option>";
                for($i=0; $i<$count; $i++){
                    echo "<option>".$datensatz[$i][1]."</option>";
                }

                echo "</select>";
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
            ?>

            <a>+ fehlende Sportarten hinzufügen</a>
            <br>
            <label>Gewicht</label>
            <input type=text>
            <label>Getrunken</label>
            <input type=text>
        </form>
    </details>
    <div>

        <?php

        $userID=1;

        $db = new mysqli('localhost', 'root','','sportapplication');
        $goalrequest="Select sportName, goalValue1, sportUnit1, goalValue2, sportUnit2
								From goals 
									Join sports on goalSportID=sportID
								Where goalUserID=".$userID;
        $goalresult = $db -> query($goalrequest) or die($db->error);
        $goalCount = $goalresult -> num_rows;

        if($goalCount==0){
            echo "Es wurden keine Ziele aus dem Bereich Sport gefunden.";
        }

        else{
            $goaldata = $goalresult->fetch_all();

            echo "<table>";
            echo "<thead>";
            echo "<th colspan=3>Sport</th>";
            echo "</thead>";

            for ($i=0; $i<$goalCount; $i++){
                $currentRow = $goaldata[$i];
                echo "<tr>";
                echo "<td>".$currentRow[0]."</td>";
                echo "<td>".$currentRow[1]." ".$currentRow[2]."</td>";
                echo "<td>".$currentRow[3]." ".$currentRow[4]."</td>";
                echo"</tr>";
            }

            echo "</table>";
        }

        $goalrequest="Select healthWeight,healthDrinking From healthgoals where healthID=".$userID;
        $goalresult= $db -> query($goalrequest) or die($db -> error);
        $goalCount= $goalresult -> num_rows;
        if($goalCount==0){
            echo "Keine Einträge im Bereich Gesundheit und Ernährung.";
        }
        if ($goalCount>1){
            echo "Die Einträge im Gesundheitsbereich sind nicht eindeutg.";
        }
        if($goalCount==1){
            $goaldata=$goalresult->fetch_all();

            echo "<table>";
            echo "<thead>";
            echo "<th colspan=2>Gesundheit &amp; Ernährung</th>";
            echo "</thead>";
            echo "<tbody>";
            echo "<tr>";
            echo "<td>Gewicht</td>";
            echo "<td>".$goaldata[0][0]." kg</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>Getrunken</td>";
            echo "<td>".$goaldata[0][1]." Liter</td>";
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
        }
        ?>
    </div>
</details>
<details open>
    <summary>Grafiken</summary>
    <canvas id="myCanvas" width="200" height="100" style="border:1px solid #000000;background-color:white">
    </canvas>
</details>
</body>
</html>
