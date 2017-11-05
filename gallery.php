<div class="gallery">

    <?php

    $galleryimgs = array("/images/food/bakedpotato.jpg",
        "/images/food/cake1.jpg",
        "/images/food/hotchocolate.jpg",
        "/images/food/lasagna.jpg",
        "/images/food/tea.jpg",
        "/images/food/breakfast.jpg",
        "/images/food/cake2.jpg",
        "/images/food/icecream.jpg",
        "/images/hostel/bathroom.jpg",
        "/images/hostel/cafe.jpg",
        "/images/hostel/commonroom.jpg",
        "/images/hostel/cooking.jpg",
        "/images/hostel/dormitory.jpg",
        "/images/hostel/doubleroom1.jpg",
        "/images/hostel/doubleroon2.jpg",
        "/images/hostel/outside.jpg",
        "/images/hostel/singleroom.jpg",
        "/images/hostel/washing.jpg");

    foreach($galleryimgs as $img){
        echo "<div><a href='#'><img src=\"$img\" alt=\"Baked Potato\" /></a></div>";
    }

    ?>




</div>