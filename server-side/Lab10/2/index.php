<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php
        include "./database.php";
        $count = isset($_POST['count']) ? $_POST['count'] : 1;
        $newscore = isset($_POST['score']) ? $_POST['score'] : 0;
        $sql ="SELECT * FROM questions;";
        $ret = $db->query($sql); 
        while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
            if ($row['QID'] == $count) {
                echo '<form action="submit.php" method="post">';
                echo '<div class="container mt-5">';
                echo '<h1>Question about SQL</h1>';
                echo '<h3 class="mb-4">' . $row['QID'] . ". " . $row['Stem'] . '</h3>';
                echo '<input type="hidden" name="question" value="' . $row['QID'] . '" >';
                echo '<input type="hidden" name="newscore" value="' . $newscore . '" >';
                echo '<div class="form-check">';
                echo '<input class="form-check-input" type="radio" required name="q'. $row['QID'] .'" value="A" id="altA">';
                echo '<label class="form-check-label" for="altA">' . $row['Alt_A'] . '</label>';
                echo '</div>';
                echo '<div class="form-check">';
                echo '<input class="form-check-input" type="radio" required name="q'. $row['QID'] .'" value="B" id="altB">';
                echo '<label class="form-check-label" for="altB">' . $row['Alt_B'] . '</label>';
                echo '</div>';
                echo '<div class="form-check">';
                echo '<input class="form-check-input" type="radio" required name="q'. $row['QID'] .'" value="C" id="altC">';
                echo '<label class="form-check-label" for="altC">' . $row['Alt_C'] . '</label>';
                echo '</div>';
                echo '<div class="form-check">';
                echo '<input class="form-check-input" type="radio" required name="q'. $row['QID'] .'" value="D" id="altD">';
                echo '<label class="form-check-label" for="altD">' . $row['Alt_D'] . '</label>';
                echo '</div>';
                echo '<div class="mt-3"><button class="btn btn-primary" type="submit">Submit</button></div>';
                echo '</div></form>';
            }
        }
        if ($count > 10) {
            echo '<div class="container mt-5">';
            echo '<h3>Your score is ' . $_POST['score'] . '/10</h3><br>';
            // echo '<form action="submit.php" method="post"><input type="hidden" name="question" value="0" ><button class="btn btn-warning">Reset</button></form>';
            echo '</div>';
        }
    ?>
    
</body>
</html>