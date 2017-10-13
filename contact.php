<?php
include('includes/header.php');
?>

<section id="content">

    <div class="wrapper">

        <div class="row">

            <div class="col-6">
                <h1>Contact Us</h1>

                <p>To get in contact with us, simply fill in the form below</p>

                <div class="contact-form">

                    <?php
                    if(isset($_POST['submit'])){

                        $fname = $_POST['first_name'];
                        $lname = $_POST['last_name'];
                        $email = $_POST['email'];
                        $message = $_POST['message'];

                        include('includes/dbConnect.php');
                        $query = $conn->prepare("INSERT INTO contacts (first,last,email,message) values(?,?,?,?)");

                        $query->bindParam(1,$fname);
                        $query->bindParam(2,$lname);
                        $query->bindParam(3,$email);
                        $query->bindParam(4,$message);

                        $query->execute();
                        $conn = null;


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
                            <label for="message">Message</label>
                            <textarea name="message" id="message" cols="30" rows="10" required></textarea>
                        </div>

                        <div class="field">
                            <button type="submit" name="submit"><i class="fa fa-envelope"></i> Send Message</button>
                            <button type="reset">Clear Form</button>
                        </div>

                    </form>

                </div>

            </div>

            <div class="col-6">
                <h1>Find Us</h1>
                <p>Another column - can put a google map or something like that here.</p>

                <h2>Temp Message Outputs</h2>

                <?php

                include('includes/dbConnect.php');
                $query=$conn->prepare("SELECT * FROM contacts;");
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_ASSOC);

                ?>
                <table class="contact-table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                    </tr>
                    </thead>
                    <tbody>

                <?php

                foreach($results as $row){
                    echo "<tr>";

                    echo "<td>".$row['first']." ".$row['last']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>".$row['message']."</td>";

                    echo "</tr>";
                }

                ?>
                    </tbody>
                </table>

            </div>

        </div>

    </div>

</section>

<?php
include('includes/footer.php');
?>
