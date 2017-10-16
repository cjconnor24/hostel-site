
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

            <div class="row">

                <div class="col-6">
                    <h1>Travel Survey</h1>

                    <p>To get in contact with us, simply fill in the form below</p>


                    <div class="contact-form">

                        <?php
                        if(isset($_POST['submit'])){
                            
                            ?>
                            <div class="display success">

                                <h2>Thank You</h2>
                                <p>Thanks for getting in contact with us, someone will be in touch with you shortly.</p>

                                <pre>
TEMP // DEBUG
                                    <?php echo print_r($_POST);?>
</pre>

                            </div>
                        <?php } ?>

                        <form action="" method="post">

                            <div class="field">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" value="" placeholder="First Name" required>
                            </div>

                            <div class="field">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" value="" placeholder="Last Name" required>
                            </div>

                            <div class="field">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" value="" placeholder="Your Email Address" required>
                            </div>

                            <div class="field">
                                <label for="mode">How will you get here?</label>
                                <select name="mode" id="mode">
                                    <option value="" disabled selected>Please choose</option>
                                    <option value="bus">Bus</option>
                                    <option value="car">Car</option>
                                    <option value="train">Train</option>
                                </select>
                            </div>

                            <div class="field">

                                <p>Will you require assistance?</p>
                                <label for="assistance">Yes.</label>

                                <input type="radio" name="assistance" class="radio" value="yes">
                                <label for="assistance">No Thanks.</label>
                                <input type="radio" name="assistance" class="radio" checked value="no">

                            </div>

                            <div class="field">
                                <label for="additional">Additional Information</label>
                                <textarea name="additional" id="additional" cols="30" rows="10" required></textarea>
                            </div>

                            <div class="field">
                                <label for="confirm">By submitting this information, I agree to Backpacker Hostel selling my soul to email spammers.</label>
                                <input type="checkbox" name="confirm">
                            </div>

                            <div class="field">
                                <button type="submit" name="submit">Submit Survey</button>
                                <button type="reset">Clear Form</button>
                            </div>




                        </form>

                    </div>

                </div>

<!--                <div class="col-6">-->
<!--                    <h1>Find Us</h1>-->
<!--                    <p>Another column - can put a google map or something like that here.</p>-->
<!---->
<!--                    <h2>Temp Message Outputs</h2>-->
<!---->
<!--                    --><?php
//
//                    include('includes/dbConnect.php');
//                    $query=$conn->prepare("SELECT * FROM contacts;");
//                    $query->execute();
//                    $results = $query->fetchAll(PDO::FETCH_ASSOC);
//
//                    ?>
<!--                    <table class="contact-table">-->
<!--                        <thead>-->
<!--                        <tr>-->
<!--                            <th>Name</th>-->
<!--                            <th>Email</th>-->
<!--                            <th>Message</th>-->
<!--                        </tr>-->
<!--                        </thead>-->
<!--                        <tbody>-->
<!---->
<!--                        --><?php
//
//                        foreach($results as $row){
//                            echo "<tr>";
//
//                            echo "<td>".$row['first']." ".$row['last']."</td>";
//                            echo "<td>".$row['email']."</td>";
//                            echo "<td>".$row['message']."</td>";
//
//                            echo "</tr>";
//                        }
//
//                        ?>
<!--                        </tbody>-->
<!--                    </table>-->
<!---->
<!--                </div>-->

            </div>


        </div>

    </section>

<?php include('includes/footer.php');?>

