<?php
$momenten = [
    "di10" => "Dinsdag 10:00",
    "di15" => "Dinsdag 15:00",
    "do10" => "Donderdag 10:00",
    "do15" => "Donderdag 15:00",
];
$name = is_string($_POST["name"] ?? null) ? trim($_POST["name"]) : "";
$email = is_string($_POST["email"] ?? null) ? trim($_POST["email"]) : "";
$date = is_string($_POST["date"] ?? null) ? $_POST["date"] : "";
$isSubmitted = ($_SERVER["REQUEST_METHOD"] ?? "GET") === "POST";
$isValid = $isSubmitted
    && $name !== ""
    && filter_var($email, FILTER_VALIDATE_EMAIL)
    && isset($momenten[$date]);

require_once "header.php";
?>

<main class="masterclasses-pagina">
    <section class="masterclasses-intro">
        <h1>Onze masterclasses</h1>
        <p>Kwaliteit, vakmanschap en passie voor BBQ</p>
    </section>

    <div class="masterclasses-inhoud">
        <section class="masterclasses-locatie" aria-label="Locatie en lestijden">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2625.2339398474164!2d4.777502598613233!3d51.606891071800256!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c69f990d127d8b%3A0x1e825fb420ca913c!2sCurio%2C%20Terheijdenseweg%20350!5e0!3m2!1snl!2snl!4v1789550001607!5m2!1snl!2snl"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen
                loading="lazy">
            </iframe>
            <div class="masterclasses-details">
                <h2>Data, duur en locatie</h2>
                <p>Je kunt kiezen uit de volgende momenten:</p>
                <ul>
                    <li>Dinsdag om 10:00</li>
                    <li>Dinsdag om 15:00</li>
                    <li>Donderdag om 10:00</li>
                    <li>Donderdag om 15:00</li>
                </ul>
                <p>Duur: 1 uur</p>
                <p>Locatie: Curio, Terheijdenseweg 350</p>
            </div>
        </section>

        <div class="masterclasses-aanmelding">
            <?php if ($isValid): ?>
                <section class="aanmelding-bevestiging" role="status">
                    <h2>Bedankt voor je inschrijving, <?= htmlspecialchars($name, ENT_QUOTES, "UTF-8") ?>!</h2>
                    <p>Je hebt je aangemeld voor de masterclass op
                        <strong><?= htmlspecialchars($momenten[$date], ENT_QUOTES, "UTF-8") ?></strong>.</p>
                    <p>De inschrijving is gedaan met <?= htmlspecialchars($email, ENT_QUOTES, "UTF-8") ?>.</p>
                </section>
            <?php else: ?>
                <?php if ($isSubmitted): ?>
                    <p class="aanmelding-fouten" role="alert">
                        Controleer je gegevens en kies een geldig e-mailadres en een beschikbaar moment.
                    </p>
                <?php endif; ?>

                <form class="masterclasses-formulier" action="masterclasses.php" method="post">
                    <div class="formulier-veld">
                        <label for="name">Naam</label>
                        <input type="text" id="name" name="name" autocomplete="name" value="<?= htmlspecialchars($name, ENT_QUOTES, "UTF-8") ?>" required>
                    </div>
                    <div class="formulier-veld">
                        <label for="email">E-mail</label>
                        <input type="email" id="email" name="email" autocomplete="email" value="<?= htmlspecialchars($email, ENT_QUOTES, "UTF-8") ?>" required>
                    </div>
                    <div class="formulier-veld">
                        <label for="date">Kies een dag en tijd</label>
                        <select id="date" name="date" required>
                            <option value="">-- Kies een moment --</option>
                            <?php foreach ($momenten as $momentCode => $momentNaam): ?>
                                <option value="<?= htmlspecialchars($momentCode, ENT_QUOTES, "UTF-8") ?>" <?= $date === $momentCode ? "selected" : "" ?>>
                                    <?= htmlspecialchars($momentNaam, ENT_QUOTES, "UTF-8") ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit">Verstuur</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
require_once "footer.php";
?>