<?php include_once __DIR__ . '/views/header.inc.php'; ?>

<?php
$config = file_get_contents(__DIR__ . '/config.json');
$config = json_decode($config, true);
?>

<?php if ($config === null): ?>
    <?= 'Error occured when config.json was readen'; ?>
<?php else: ?>
    <pre>
        <?= include_once __DIR__ . '/views/config-display.inc.php'; ?>
    </pre>
    <br />
    <?= include_once __DIR__ . '/views/config-setting-form.php'; ?>
<?php endif; ?>

<?php include_once __DIR__ . '/views/footer.inc.php'; ?>