
<?php include('includes/header.php');?>

<!--    <section class="hero view">-->
<!--        <div class="background">-->
<!--        <h1>WELCOME to the Backpacker Hostel</h1>-->
<!--        <p>This is a sub-heading for more hero information</p>-->
<!--        <p><a href="#" class="btn">Find out more</a></p>-->
<!--        </div>-->
<!--    </section>-->
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
                var element;
                var data = {"survey": <?php echo $results;?> };

                var total = 0;
                var count = data.survey;

                // CALCULATE THE TOTAL ENTRIES
                for(i=0;i<count.length;i++){
                    total += parseInt(count[i].total);
                }

                console.log(total);

                for (element in data.survey) {
                    var names = data.survey[element].mode;
                    var values = data.survey[element].total;

//                    ROW
                    var node = document.createElement("tr");

//                    CELL
                    var subnode1 = document.createElement("td");
//                    var textnode1 = document.createTextNode('fa-'+names.toLowerCase());
                    var textnode1 = document.createElement("span");
                    textnode1.setAttribute('class','fa fa-'+names.toLowerCase());


//                    CELL
                    var subnode3 = document.createElement("td");
                    var subsubnode = document.createElement("canvas");

                    subnode1.appendChild(textnode1);
                    subnode3.appendChild(subsubnode);

                    var att = subsubnode.setAttribute("id", names);


                    node.appendChild(subnode1);
                    node.appendChild(subnode3);
                    document.getElementById("chart").appendChild(node);

                    var c = document.getElementById(names);
                    var bar = c.getContext("2d");
                    var length = values;
                    if (values > 0) {
                        if (length > 100)
                            length = 100;
                        bar.fillStyle = "#323232"; //"blue";
                    }
                    bar.rect(0, 0, length*100, 100);
                    bar.fill();

                    bar.fillStyle = "#FFFFFF";
                    bar.font = "30px Arial";
                    bar.fillText(values,10,50);


                }
            </script>

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

                </div>
            </div>

        </div>

            </div>

    </section>

<?php include('includes/footer.php');?>

