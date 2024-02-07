<?php
    $gallery = array(
        1 => 'https://cdn.pixabay.com/photo/2016/09/05/21/37/cat-1647775_640.jpg',
        2 => 'https://cdn.pixabay.com/photo/2019/11/08/11/56/kitten-4611189_640.jpg',
        3 => 'https://cdn.pixabay.com/photo/2013/05/30/18/21/cat-114782_640.jpg',
        4 => 'https://cdn.pixabay.com/photo/2017/11/14/13/06/kitty-2948404_640.jpg',
        5 => 'https://cdn.pixabay.com/photo/2016/09/07/16/19/pile-1651945_640.jpg',
        6 => 'https://cdn.pixabay.com/photo/2018/03/26/20/49/tiger-3264048_640.jpg',
        7 => 'https://cdn.pixabay.com/photo/2017/01/14/12/59/iceland-1979445_640.jpg',
        8 => 'https://cdn.pixabay.com/photo/2018/08/12/16/59/parrot-3601194_640.jpg',
        9 => 'https://cdn.pixabay.com/photo/2017/05/31/18/38/sea-2361247_640.jpg',
        10 => 'https://cdn.pixabay.com/photo/2012/06/19/10/32/owl-50267_640.jpg',
        11 => 'https://cdn.pixabay.com/photo/2016/11/14/04/45/elephant-1822636_640.jpg',
        12 => 'https://cdn.pixabay.com/photo/2015/04/10/01/41/fox-715588_640.jpg',
        13 => 'https://cdn.pixabay.com/photo/2014/12/17/00/28/red-squirrel-570936_640.jpg',
        14 => 'https://cdn.pixabay.com/photo/2022/01/11/12/07/animal-6930449_640.jpg',
        15 => 'https://cdn.pixabay.com/photo/2016/12/05/11/39/fox-1883658_640.jpg',
        16 => 'https://cdn.pixabay.com/photo/2016/09/28/22/41/butterfly-1701685_640.jpg',
        17 => 'https://cdn.pixabay.com/photo/2022/09/13/13/47/animal-7451968_640.jpg',
        18 => 'https://cdn.pixabay.com/photo/2022/12/26/11/44/squirrel-7678830_640.jpg',
        19 => 'https://cdn.pixabay.com/photo/2017/12/17/15/58/mouflon-3024471_640.jpg',
        20 => 'https://cdn.pixabay.com/photo/2023/04/18/03/47/sheep-7934078_640.jpg',
    )
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="h-full flex flex-col items-center bg-gray-400 gap-3">
    <h1 class="mt-[30px] text-3xl font-bold">Animals Gallery</h1>
    <div class="grid grid-cols-4 w-4/5 h-full object-cover gap-4 p-4 group">
        <!-- group-hover:scale-[1.05] -->
            <?php 
            foreach($gallery as $key => $value) {
                $row_span = rand(1, 2);
                echo '<img class="hover:scale-[1.34] cursor-zoom-in hover:rounded-none rounded-xl transition-all  object-cover h-full row-span-' . $row_span . '" src="' . $value . '" />';
            }
            ?>
    </div>
    
</body>
</html>