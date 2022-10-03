<select name="category" id="category">
    <?php
    DB::$user = 'root';
    DB::$password = '';
    DB::$dbName = 'museo_it';
    $tables = DB::query("SELECT *
        FROM information_schema.tables
        WHERE table_type='BASE TABLE'
        AND table_schema='museo_it'");
    $i = 0;
    foreach ($tables as $table) {
      echo '<option value=' . $table["TABLE_NAME"] . '>' . $table["TABLE_NAME"] . '</option>';
      $i++;
      var_dump($tables);
    }
    ?>
  </select>
  <input type="text" id="live_search" autocomplete="off" placeholder="Ricerca istantanea per nome">
  <div id="searchresult">

  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

            $("select").change(function() {
                $('#live_search').val('');
            });

            $("#live_search").keyup(function() {
                var input = $(this).val();
                var selected_input = $('select option:selected').val();
                $.ajax({
                    url: "../back-end/livesearch.php",
                    method: "POST",
                    data: {
                        input: input,
                        selected_input: selected_input
                    },

                    success: function(data) {
                        $("#searchresult").html(data);
                    }
                });
                if (input = "") {
                    $("#searchresult").css("display", "none");
                }

            });
        });
    </script>