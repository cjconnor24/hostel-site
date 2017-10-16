<?php
$currentpage = str_replace(".php","",$_SERVER['REQUEST_URI']);
?>
<ul>
    <li class="home"><a href="./" class="<?php echo ($currentpage=="/index" || $currentpage=="/" ? "active" : "");?>">Home Page</a></li>
    <li><a href="#" >Facilities</a> </li>
    <li><a href="prices.php" class="<?php echo ($currentpage=="/prices" ? "active" : "");?>">Prices</a></li>
    <li><a href="#">Cafe</a></li>
    <li><a href="getting-here.php" class="<?php echo ($currentpage=="/getting-here" ? "active" : "");?>">Getting Here</a></li>
    <li><a href="contact.php" class="contact <?php echo ($currentpage=="/contact" ? "active" : "");?>">Contact Us</a></li>
    <li class="menu-icon"><a href="javascript:void(0);" class="icon" onclick="toggleNav()">&#9776;</a></li>
    <li class="telephone-icon"><a href="tel:+4412361234567"><i class="fa fa-phone"></i></a></li>
</ul>