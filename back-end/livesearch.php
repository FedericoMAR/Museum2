<?php
require_once("db.class.php");
if (isset($_POST['input'])) {
    $selected_input = $_POST['selected_input'];
    $input = $_POST['input'];
    $input = $input . "%"; //% is added because for EXample: INPUT = at -> at% will indicate each cell which has a value that starts with at

    //Database setup
    DB::$user = 'root';
    DB::$password = '';
    DB::$dbName = 'museo_it';

    $result = retrieveRowsData($selected_input, $input);
?>
    <table>
        <thead>
            <tr>
                <?php
                $columns = retrieveColumnData($selected_input);
                printColumnData($columns);
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            if (sizeof($result) > 0) {
                if ($_POST["input"] == "") {
                    //it should do nothing
                } else {
                    printRowsData($result, $columns);
                }
            ?>
        </tbody>
<?php
            }
        }
        function retrieveRowsData($selected_input, $input)
        {
            switch ($selected_input) {
                case 'computer':
                    $result = DB::query("SELECT * FROM computer WHERE computer.nome_modello LIKE %s", $input);
                    break;

                case 'software':
                    $result = DB::query("SELECT * FROM software WHERE software.titolo LIKE %s", $input);
                    break;
                case 'libro':
                    $result = DB::query("SELECT * FROM libro WHERE libro.titolo LIKE %s", $input);
                    break;
                case 'periferica':
                    $result = DB::query("SELECT * FROM periferica WHERE periferica.nome_modello LIKE %s", $input);
                    break;
                case 'rivista':
                    $result = DB::query("SELECT * FROM rivista WHERE rivista.titolo LIKE %s", $input);
                    break;
            }
            return $result;
        }
        function retrieveColumnData($selected_input)
        {
            $columns = DB::query("SELECT `COLUMN_NAME` 
            FROM `INFORMATION_SCHEMA`.`COLUMNS` 
            WHERE `TABLE_SCHEMA`='museo_it' 
                AND `TABLE_NAME`=%s;", $selected_input);
            return $columns;
        }
        function printColumnData($columns)
        {
            foreach ($columns as $column) {
                echo "<th>" . $column["COLUMN_NAME"] . "</th>";
            }
            echo "<th>" . "deleteRows" . "</th>";
        }
        function printRowsData($result, $columns)
        {
            $i = 0;
            echo "<form action='./deleteRow.php' method='get'>";
            foreach ($result as $cell) {
                echo "<tr>";
                foreach ($columns as $column) {
                    echo "<td>" . $cell[$column["COLUMN_NAME"]] . "</td>";
                }
                var_dump($result);
                echo "<td><input type='submit' value=". $result[$i]["ID"]." class='private'>Delete row</input></td>";
                $i++;
                echo "</tr>";
            }
            echo "</form>";
        }
?>