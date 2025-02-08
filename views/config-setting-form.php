<h1>New user</h1>
<form action="/php-config-editor/scripts/form.php" method="post">
    <label for="id">ID:</label>
    <input type="number" name="id" id="id" value="<?= $_GET['id'] ?? ''; ?>">
    <label for="id">Name:</label>
    <input type="text" name="name" id="name" <?= $_GET['name'] ?? ''; ?>>
    <button type="submit">Create</button>
    <br /><br />
    <?php if (isset($_GET['errors'])): ?>
        <?php foreach ($_GET['errors'] as $errName => $errValue): ?>
            <p class="error"><strong><?= $errName; ?></strong><?= $errValue ?></p>
        <?php endforeach; ?>
    <?php endif; ?>
</form>