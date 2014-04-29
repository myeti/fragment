<header>
    <?= $person->firstnames ?> <?= $person->lastname ?>
    <a href="#" class="close"><i class="fa fa-times"></i></a>
</header>

<div class="line head">

    <img src="http://placehold.it/200x200" alt=""/>

    <label for="firstnames">Prénom(s)</label>
    <input type="text" id="firstnames" name="firstnames" value="<?= $person->firstnames ?>"/>

    <label for="lastname">Nom</label>
    <input type="text" id="lastname" name="lastname" value="<?= $person->lastname ?>"/>

    <div class="gender">
        <label for="m">
            <i class="fa fa-male"></i>
        </label> <input type="radio" name="gender" id="m"/>
        <label for="f">
            <i class="fa fa-female"></i>
        </label> <input type="radio" name="gender" id="f"/>
    </div>

    <div class="clear"></div>

</div>

<div class="line event">

    <div class="block">
        <label for="event[0][name]">Evénement</label>
        <input type="text" name="event[0][name]" id="event[0][name]" value="Naissance"/>
    </div>

    le

    <div class="block">
        <label for="event[0][date]">Date</label>
        <input type="text" name="event[0][date]" id="event[0][date]" value="5 février 1989"/>
    </div>

    à

    <div class="block">
        <label for="event[0][place]">Lieu</label>
        <input type="text" name="event[0][place]" id="event[0][place]" value="Evian"/>
    </div>

    <!-- new line -->

    <div class="block">
        <label for="event[1][name]">Evénement</label>
        <input type="text" name="event[1][name]" id="event[1][name]"/>
    </div>

    le

    <div class="block">
        <label for="event[1][date]">Date</label>
        <input type="text" name="event[1][date]" id="event[1][date]"/>
    </div>

    ?

    <div class="block">
        <label for="event[1][place]">Lieu</label>
        <input type="text" name="event[1][place]" id="event[1][place]"/>
    </div>

    <div class="common">Naissance, bapê?me, diplôme, décès</div>

</div>

<div class="line">

    <label for="notes">Notes</label>
    <textarea name="notes" id="notes"></textarea>

</div>

<div class="line action">
    <a class="btn btn-primary" href="#">Sauvegarder</a>
</div>