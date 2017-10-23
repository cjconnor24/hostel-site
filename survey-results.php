
<?php include('includes/header.php');?>

<!--    <section class="hero view">-->
<!--        <div class="background">-->
<!--        <h1>WELCOME to the Backpacker Hostel</h1>-->
<!--        <p>This is a sub-heading for more hero information</p>-->
<!--        <p><a href="#" class="btn">Find out more</a></p>-->
<!--        </div>-->
<!--    </section>-->
<section id="location-map"></section>

<script>
    function myMap() {

        var locheil = {lat: 56.8493272, lng: -5.2062179};

        var mapProp= {
            center:locheil,
            zoom:9,
            disableDefaultUI: true
        };

        var styles = {
            default: null,
            silver: [
                {
                    elementType: 'geometry',
                    stylers: [{color: '#f5f5f5'}]
                },
                {
                    elementType: 'labels.icon',
                    stylers: [{visibility: 'off'}]
                },
                {
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#616161'}]
                },
                {
                    elementType: 'labels.text.stroke',
                    stylers: [{color: '#f5f5f5'}]
                },
                {
                    featureType: 'administrative.land_parcel',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#bdbdbd'}]
                },
                {
                    featureType: 'poi',
                    elementType: 'geometry',
                    stylers: [{color: '#eeeeee'}]
                },
                {
                    featureType: 'poi',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#757575'}]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'geometry',
                    stylers: [{color: '#e5e5e5'}]
                },
                {
                    featureType: 'poi.park',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9e9e9e'}]
                },
                {
                    featureType: 'road',
                    elementType: 'geometry',
                    stylers: [{color: '#ffffff'}]
                },
                {
                    featureType: 'road.arterial',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#757575'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'geometry',
                    stylers: [{color: '#dadada'}]
                },
                {
                    featureType: 'road.highway',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#616161'}]
                },
                {
                    featureType: 'road.local',
                    elementType: 'labels.text.fill',
                    stylers: [{color: '#9e9e9e'}]
                },
                {
                    featureType: 'transit.line',
                    elementType: 'geometry',
                    stylers: [{color: '#e5e5e5'}]
                },
                {
                    featureType: 'transit.station',
                    elementType: 'geometry',
                    stylers: [{color: '#eeeeee'}]
                },
                {
                    featureType: 'water',
                    elementType: 'geometry',
                    stylers: [{color: '#c9c9c9'}]
                },
//                {
//                    featureType: 'water',
//                    elementType: 'labels.text.fill',
//                    stylers: [{color: '#9e9e9e'}]
//                }
            ]};





        var map=new google.maps.Map(document.getElementById("location-map"),mapProp);
        map.setOptions({styles: styles['silver']});

        var marker = new google.maps.Marker({
            position:locheil,
            map:map,
            icon:'http://www.hostel.dev/images/map-marker.png'
        })


    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAbs8Wb7fnp6cMbiuuWfJbX-3X3ItHC2Rw&callback=myMap"></script>

    <section id="content">

        <div class="wrapper">

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


        </div>

    </section>

<?php include('includes/footer.php');?>

