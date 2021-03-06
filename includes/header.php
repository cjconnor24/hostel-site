<!DOCTYPE HTML>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Hostel | Homepage</title>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- FAVICONS -->
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>
    <script type="text/javascript">
        /**
         * SHOW AND HIDE THE NAV MENU
         */
        setTimeout(changeHeroImage, 5000);

        /**
         * CRUDE FUNTION TO CHANGE HERO HEADER IMAGE
         */
        function changeHeroImage(){

            try {
                console.log('THIS RAN');
                var heroBox = document.getElementsByClassName('hero')[0];
                var imagePath = "/images/hostel/";
                var heroImages = ["bathroom.jpg",
                    "cafe.jpg",
                    "commonroom.jpg",
                    "cooking.jpg",
                    "dormitory.jpg",
                    "doubleroom1.jpg",
                    "doubleroon2.jpg",
                    "outside.jpg",
                    "singleroom.jpg",
                    "washing.jpg"];
//            heroBox.backgroundImage = imagePath + heroImages[1];
                console.log(imagePath + heroImages[5]);
                heroBox.style.backgroundImage = 'url(' + imagePath + heroImages[5] + ')';
            } catch(err){
                Console.log('REMEBER AND AMEND YOUR JS SLIDER STUFF');
            }
        }

        function toggleNav() {

            var navbar = document.getElementsByTagName("nav")[0];
            if (navbar.className === "") {
                navbar.className += " responsive";
            } else {
                navbar.className = "";
            }

        }



    </script>

</head>

<body>

<div id="page">

    <nav>

        <div class="wrapper">

            <div class="branding">
                <a href="#" class="logo" title="Backpacker Hostel"><span>Backpacker Hostel</span></a>
            </div>

            <div class="menu">

            <?php include('nav.php');?>

            </div>

        </div>

    </nav>