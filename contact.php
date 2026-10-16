<?php
$name = is_string($_POST["name"] ?? null) ? trim($_POST["name"]) : "";
$email = is_string($_POST["email"] ?? null) ? trim($_POST["email"]) : "";
$question = is_string($_POST["question"] ?? null) ? trim($_POST["question"]) : "";
$isSubmitted = ($_SERVER["REQUEST_METHOD"] ?? "GET") === "POST";
$isValid = $isSubmitted
    && $name !== ""
    && filter_var($email, FILTER_VALIDATE_EMAIL)
    && $question !== "";

require_once "header.php";
?>

<main class="contactpagina">
    <section class="contact-intro">
        <h1>Contact</h1>
        <p>Heb je vragen? Neem gerust contact met ons op.</p>
    </section>

    <div class="contact-inhoud">
        <div class="contact-aanmelding">
            <?php if ($isValid): ?>
                <section class="aanmelding-bevestiging" role="status">
                    <h2>Bedankt voor je bericht, <?= htmlspecialchars($name, ENT_QUOTES, "UTF-8") ?>!</h2>
                    <p>We hebben je bericht ontvangen en nemen zo snel mogelijk contact met je op.</p>
                </section>
            <?php else: ?>
                <?php if ($isSubmitted): ?>
                    <p class="aanmelding-fouten" role="alert">
                        Controleer je gegevens en vul je naam, een geldig e-mailadres en een bericht in.
                    </p>
                <?php endif; ?>

                <form class="contactformulier" action="contact.php" method="post">
                    <div class="contact-veld">
                        <label for="name">Naam</label>
                        <input type="text" id="name" name="name" autocomplete="name" value="<?= htmlspecialchars($name, ENT_QUOTES, "UTF-8") ?>" required>
                    </div>
                    <div class="contact-veld">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" autocomplete="email" value="<?= htmlspecialchars($email, ENT_QUOTES, "UTF-8") ?>" required>
                    </div>
                    <div class="contact-veld">
                        <label for="question">Bericht</label>
                        <textarea name="question" id="question" rows="4" required><?= htmlspecialchars($question, ENT_QUOTES, "UTF-8") ?></textarea>
                    </div>
                    <button type="submit">Versturen</button>
                </form>
            <?php endif; ?>
        </div>

        <aside class="contactgegevens">
            <h2>Contactgegevens</h2>
            <p><strong>E-mail:</strong> <a href="mailto:Info@DeBlauweKamadoinBreda.nl">Info@DeBlauweKamadoinBreda.nl</a></p>
            <p><strong>Telefoonnummer:</strong> <a href="tel:076526236">076-526236</a></p>
            <p><strong>Adres:</strong> Terheijdenseweg 350, 1799DK Breda</p>
        </aside>
    </div>
</main>

<?php
require_once "footer.php";
?>