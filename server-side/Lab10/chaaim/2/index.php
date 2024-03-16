<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .question {
            margin-bottom: 20px;
        }
        .options {
            margin-bottom: 20px;
        }
        .btn-submit {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Quiz</h1>
        <form method="post">
            <?php
            // Connect to SQLite database
            $db = new SQLite3('questions.db');

            // Get a random question from the database
            $result = $db->query('SELECT * FROM questions');
            while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
                echo '<div class="question">' . $row['Stem'] . '</div>';
                echo '<div class="options">';
                echo '<input type="radio" name="answer" value="A"> ' . $row['Alt_A'] . '<br>';
                echo '<input type="radio" name="answer" value="B"> ' . $row['Alt_B'] . '<br>';
                echo '<input type="radio" name="answer" value="C"> ' . $row['Alt_C'] . '<br>';
                echo '<input type="radio" name="answer" value="D"> ' . $row['Alt_D'] . '<br>';
                echo '</div>';
                echo '<button type="submit" class="btn btn-primary btn-submit">Submit</button>';
            }
            ?>
        </form>
    </div>
</body>
</html>
