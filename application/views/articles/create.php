<h2><?php echo $title ?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open('articles/create') ?>

<label for="titre">Title</label>
<input type="input" name="titre" /><br />

<label for="texte">Text</label>
<textarea name="texte"></textarea><br />

<input type="submit" name="submit" value="Veuillez créer un nouvel article" />

</form>

