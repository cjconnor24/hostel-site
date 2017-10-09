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
                        <label for="name">Your Name</label>
                        <input type="text" name="full_name" value="" placeholder="Your Name" required>
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
            </div>

        </div>

    </div>

</section>

<?php
include('includes/footer.php');
?>
