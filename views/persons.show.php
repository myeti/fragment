<header>
    <?= $person->firstnames ?> <?= $person->lastname ?>
    <a href="#" class="close"><i class="fa fa-times"></i></a>
</header>

<main>

    <div class="head">

        <img src="http://placehold.it/160x160" alt=""/>

        <div class="names">
            <input type="text" name="firstnames" placeholder="Prénom(s)" value="<?= $person->firstnames ?>"/>
            <input type="text" name="lastname" placeholder="Nom de famille" value="<?= $person->lastname ?>"/>
        </div>

    </div>

    <div class="event">
        <input type="text" name="event[0][name]" placeholder="Evénement" class="event-name"/>
        le
        <input type="text" name="event[0][date]" placeholder="Date" class="event-date"/>
        à
        <input type="text" name="event[0][name]" placeholder="Lieu" class="event-place"/>
    </div>

    <div class="event">
        <input type="text" name="event[0][name]" placeholder="Evénement" class="event-name"/>
        le
        <input type="text" name="event[0][date]" placeholder="Date" class="event-date"/>
        à
        <input type="text" name="event[0][name]" placeholder="Lieu" class="event-place"/>
    </div>

    <div class="note">
        <textarea name="notes" placeholder="Notes diverses"></textarea>
    </div>

</main>

<footer>
    <a class="btn btn-primary" href="#">Sauvegarder</a>
</footer>