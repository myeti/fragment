<header>
    <?= $person->fullname() ?>
    <a href="#" class="close"><i class="fa fa-times"></i></a>
</header>

<form action="<?= url('/person', $person->id, 'edit') ?>" method="post">

    <main>

        <div class="head">

            <input type="hidden" name="id" value="<?= $person->id ?>"/>

            <div class="pic">
                <img src="<?= self::asset('/public/img/profile.jpg') ?>" alt=""/>
            </div>

            <div class="names">
                <input type="text" name="firstnames" placeholder="Prénom(s)" value="<?= $person->firstnames ?>"/>
                <input type="text" name="lastname" placeholder="Nom de famille" value="<?= $person->lastname ?>"/>
                <div class="gender">

                    <label for="gender-m">
                        <i class="fa fa-male"></i>
                    </label>
                    <input type="radio" name="gender" value="0" id="gender-m" <?= ($person->gender == 0) ? 'checked="checked"': null; ?>/>

                    <label for="gender-f">
                        <i class="fa fa-female"></i>
                    </label>
                    <input type="radio" name="gender" value="1" id="gender-f" <?= ($person->gender == 1) ? 'checked="checked"': null; ?>/>

                </div>
            </div>

        </div>

        <div class="sep"></div>

        <div class="sep title">
            événements personels
            <a class="add-p-event" href="#">
                <i class="fa fa-plus"></i> ajouter
            </a>
        </div>

        <div class="p-events">

            <?php $i = 0; foreach($person->events() as $event): ?>

            <div class="event" data-i="<?= $i ?>">
                <input type="hidden" name="p-event[<?= $i ?>][id]" value="<?= $event->id ?>"/>
                <input type="text" name="p-event[<?= $i ?>][name]" placeholder="Evénement" required value="<?= $event->what ?>"/>
                le
                <input type="text" name="p-event[<?= $i ?>][date]" placeholder="Date" value="<?= $event->when ?>"/>
                à
                <input type="text" name="p-event[<?= $i ?>][place]" placeholder="Lieu" value="<?= $event->where ?>"/>
                <a class="btn remove-event" href="#"><i class="fa fa-minus"></i></a>
            </div>

            <?php $i++; endforeach; ?>

        </div>

        <?php foreach($person->couples() as $couple): ?>

        <div class="sep title">
            événements avec <?= $couple->spouse()->shortname() ?>
            <a class="add-c-event" href="#" data-id="<?= $couple->id ?>">
                <i class="fa fa-plus"></i> ajouter
            </a>
        </div>

        <div class="c-events" data-id="<?= $couple->id ?>">

            <?php $i = 0; foreach($couple->events() as $event): ?>

            <div class="event" data-i="<?= $i ?>">
                <input type="hidden" name="c-event[<?= $couple->id ?>][<?= $i ?>][id]" value="<?= $event->id ?>"/>
                <input type="text" name="c-event[<?= $couple->id ?>][<?= $i ?>][name]" placeholder="Evénement" required value="<?= $event->what ?>"/>
                le
                <input type="text" name="c-event[<?= $couple->id ?>][<?= $i ?>][date]" placeholder="Date" value="<?= $event->when ?>"/>
                à
                <input type="text" name="c-event[<?= $couple->id ?>][<?= $i ?>][place]" placeholder="Lieu" value="<?= $event->where ?>"/>
                <a class="btn remove-event" href="#"><i class="fa fa-minus"></i></a>
            </div>

            <?php $i++; endforeach; ?>

        </div>

        <?php endforeach; ?>

        <div class="sep"></div>

        <div class="note">
            <textarea name="notes" placeholder="Notes diverses"><?= $person->note ?></textarea>
        </div>

    </main>

    <footer>

        <?php if(!$person->isSpouse()): ?>

        <a class="btn add-couple" href="<?= url('/person', $person->id, 'addcouple') ?>" data-modal="#create-couple">
            <i class="fa fa-plus"></i> Couple
        </a>

        <?php if(!$person->id_parent): ?>
        <a class="btn add-parents" href="<?= url('/person', $person->id, 'addparents') ?>" data-modal="#create-parents">
            <i class="fa fa-plus"></i> Parents
        </a>
        <?php endif; ?>

        <?php else: ?>
        <a class="btn add-child" href="<?= url('/person', $person->id, 'addchild') ?>" data-modal="#create-child">
            <i class="fa fa-plus"></i> Enfant
        </a>
        <?php endif; ?>

        <a class="btn delete-person" href="<?= url('/person', $person->id, 'delete') ?>"
           data-confirm="Etes-vous sûr ? Cette action supprimera cette personne ainsi que toutes ses relations et enfants.">
            <i class="fa fa-times"></i>
        </a>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>

    </footer>

</form>

<div class="p-template">

    <div class="event" data-i="{i}">
        <input type="hidden" name="p-event[{i}][<?= $i ?>][id]"/>
        <input type="text" name="p-event[{i}][name]" placeholder="Evénement" required />
        le
        <input type="text" name="p-event[{i}][date]" placeholder="Date" />
        à
        <input type="text" name="p-event[{i}][place]" placeholder="Lieu" />
        <a class="btn remove-event" href="#"><i class="fa fa-minus"></i></a>
    </div>

</div>

<div class="event c-template">

    <div class="event" data-i="{i}" data-id="{id}">
        <input type="hidden" name="c-event[{id}][{i}][<?= $i ?>][id]"/>
        <input type="text" name="c-event[{id}][{i}][name]" placeholder="Evénement" required />
        le
        <input type="text" name="c-event[{id}][{i}][date]" placeholder="Date" />
        à
        <input type="text" name="c-event[{id}][{i}][place]" placeholder="Lieu" />
        <a class="btn remove-event" href="#"><i class="fa fa-minus"></i></a>
    </div>

</div>