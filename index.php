<?php
require_once "header.php";
?>


<section id="intro">
    <img src="https://picsum.photos/200" alt="">
    <div class="intro-content">
        <?php
        echo file_get_contents('data/intro.txt');
        ?>
    </div>
</section>

<section id="shortcuts">
    <div class="shortcut">
        <img class="img1" src="../img/kamado.png" alt="">
        <p>Kamado BBQ’s zijn keramische barbecues die warmte goed vasthouden. Daardoor kun je er mee grillen, roken,
            bakken en langzaam garen.</p>
        <a class="button" href="producten.php">producten</a>
    </div>
    <div class="shortcut">
        <img class="img1" src="../img/masterclass.png" alt="">
        <p>Tijdens onze masterclasses leer je alles over koken op een Kamado. Van de basis tot handige technieken voor
            vlees, vis en andere gerechten. Zo haal je steeds meer uit je barbecue.</p>
        <a class="button" href="masterclasses.php">masterclasses</a>
    </div>
    <div class="shortcut">
        <img class="img1" src="../img/masterclasses.png" alt="">
        <p>Heb je vragen over onze Kamado’s, accessoires of masterclasses? Neem gerust contact met ons op. We helpen je graag verder met advies of meer informatie.</p>
        <a class="button" href="contact.php">contact</a>
    </div>
</section>




<?php
require_once "footer.php";
?>