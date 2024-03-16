<?php
    include './database.php';
    // echo $_POST['question'];
    // $score = 0;
    // if($_POST['question'] == 0) {
    //     $score = 0;
    //     echo '<form method="post" action="./index.php">
    //                 <input type="hidden" name="score" value="'. ($score) .'" />
    //               </form>';
    //     echo '<script>document.forms[0].submit();</script>';
    // }
    for ($i = 1; $i <= 10; $i++) {
        if ($_POST['question'] ==  $i) {
            $sql ="SELECT Correct FROM questions WHERE QID = {$i};";
            $ret = $db->query($sql);
            $row = $ret->fetchArray(SQLITE3_ASSOC);
            // echo $row['Correct'];
            if($row['Correct'] == $_POST['q' . $i]) {
                $score = intval($_POST['newscore']) + 1;
            } else {
                $score = intval($_POST['newscore']);
            }
            echo '<form method="post" action="./index.php">
                    <input type="hidden" name="count" value="'. ($i+1) .'" />
                    <input type="hidden" name="score" value="'. ($score) .'" />
                  </form>';
            echo '<script>document.forms[0].submit();</script>';
        }
    }
?>
    