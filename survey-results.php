
<?php include('includes/header.php');?>

<!--    <section class="hero view">-->
<!--        <div class="background">-->
<!--        <h1>WELCOME to the Backpacker Hostel</h1>-->
<!--        <p>This is a sub-heading for more hero information</p>-->
<!--        <p><a href="#" class="btn">Find out more</a></p>-->
<!--        </div>-->
<!--    </section>-->

<!--LOCATION MAP-->
<section id="location-map"></section>
<script src="/js/google-map.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbs8Wb7fnp6cMbiuuWfJbX-3X3ItHC2Rw&callback=myMap"></script>

    <section id="content">

        <div class="wrapper">

            <div class="row">

                <div class="col-6">

            <h1>Travel Survey Results</h1>

            <p>Below are some stats for the survey</p>



            <?php

                include('includes/dbConnect.php');

                $query = $conn->prepare("SELECT mode, COUNT(*) AS total FROM survey GROUP BY mode ORDER BY COUNT(*) DESC;");
                $query->execute();
                $results = json_encode($query->fetchAll(PDO::FETCH_ASSOC));

            ?>

            <table id="chart" class="survey-results">
            </table>

            <script type="text/javascript">

                var data = {"survey": <?php echo $results;?> };

            </script>
                    <script src="/js/survey-chart.js"></script>

                </div>

                <div class="col-6">

            <h2>Assistance List</h2>
            <p>Below are the list of respondants who require assistance</p>

            <?php
            $query = $conn->prepare("SELECT first, last, email from survey WHERE assistance = 1;");
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
            ?>
            <table class="assistance-table">
                <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                </tr>
                </thead>

            <tbody>
            <?php
            foreach($results as $rows){
                ?>

                <tr>
                    <td><?php echo $rows['first'];?></td>
                    <td><?php echo $rows['last'];?></td>
                    <td><?php echo $rows['email'];?></td>
                </tr>

            <?php
            }
            ?>
            </tbody>
            </table>

            <p><a href="javascript:alert('doesnot do anything');" class="survey-export"><span class="fa fa-download"></span>Export List</a></p>

                </div>
            </div>

        </div>

            </div>

    </section>

<?php include('includes/footer.php');?>

