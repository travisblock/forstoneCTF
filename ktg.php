

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, minimum-scale=1, initial-scale=1">
        <title>Autocomplete Input Dengan PHP MySQLi</title>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
                <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="assets/jquery-ui.js"></script>
        <link rel="stylesheet" type="text/css" href="assets/jquery-ui.css">
    </head>
    <body>

        <h3>Autocomplete Input Dengan PHP MySQLi</h3>

        <div class="ui-widget">
            <form action="" method="post">
                <input type="text" id="kategori" name="kategori" placeholder="Kategori">
            </form>
        </div>

        <script type="text/javascript">
                $( "#kategori" ).autocomplete({
                    source: "source.php",
                    minLength :1
                });
        </script>
    </body>
</html>

