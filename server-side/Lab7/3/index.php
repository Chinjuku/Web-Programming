<?php
    error_reporting(E_ERROR | E_PARSE);
    $nameError = "";
    $addressError = "";
    $professionError = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (strlen($_POST['name']) < 5) {
            $nameError = "Please fill in your name with at least 5 characters.";
        }
        if (strlen($_POST['address']) < 5) {
            $addressError = "Please fill in your address with at least 5 characters.";
        }
        if (strlen($_POST['profession']) < 5) {
            $professionError = "Please fill in your profession with at least 5 characters.";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="h-screen w-full flex justify-center items-center">
    <form action="" method="post" class="flex flex-col gap-2 border-2 border-blue-800 bg-blue-100 p-[40px]">
        <h1 class="text-3xl text-center">Submit FORM</h1>
        <div class="flex items-center gap-5 h-[60px]">
            <label for="" class="">Name : </label>
            <input class="p-2 border-black border-b focus:border-blue-600 focus:border-b-2 outline-none" type="text" value="Chinatip Wu" name="name" id="">
        </div>
        <?php if(!empty($nameError)) echo "<p class='text-red-500 text-sm'>$nameError</p>"; ?>
        <div class="flex flex-col">
            <label for="">Address :</label>
            <textarea cols="5" class="p-2 border-black border h-[80px] " name="address" id="">1/1 KMITL Ladgrabang 10150</textarea>
            <?php if(!empty($addressError)) echo "<p class='text-red-500 text-sm'>$addressError</p>"; ?>
        </div>
        <div class="flex items-center gap-5 h-[60px]">
            <label for="">Age :</label>
            <input class="p-2 border-black border-b focus:border-blue-600 focus:border-b-2 outline-none" type="number" value="20" name="age" id="">
        </div>
        <div>
            <label for="">Profession :</label>
            <input class="p-2 border-black border-b focus:border-blue-600 focus:border-b-2 outline-none" type="text" value="Std" name="profession" id="">
            <?php if(!empty($professionError)) echo "<p class='text-red-500 text-sm'>$professionError</p>"; ?>
        </div>
        <div>
            <label for="">Resident :</label>
            <div class="flex gap-4">
                <input type="radio" value="Resident" name="resident" id="" checked>
                <label for="">Resident</label>
                <input type="radio" value="Non-Resident" name="resident" id="">
                <label for="">Non-Resident</label>
            </div>
        </div>
        <div>
            <button type="submit" class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                Submit
            </button>
        </div>
    </form>
    <?php
        error_reporting(E_ERROR | E_PARSE);
        if (empty($nameError) && empty($addressError) && empty($professionError) && $_SERVER["REQUEST_METHOD"] == "POST") {
            echo '<div class="w-1/3 flex flex-col items-center justify-start gap-5 border-2 border-green-800 m-[30px] p-[30px]"><h1 class="text-3xl">Your form data</h1>';
            echo '<div style="color: blue;">';
            foreach ($_POST as $key => $value) {
                echo '<div><p>Your ' . $key . ' is : ' . $value . '</p></div>';
            }
            echo '</div>';
        }
    ?>
</body>
</html>
