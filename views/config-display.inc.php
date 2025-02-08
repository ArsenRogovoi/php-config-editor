<h1>Name: <?= $config['appName']; ?></h1>
<div class="table_component" role="region" tabindex="0">
    <table>
        <caption>Users</caption>
        <thead>
            <tr>
                <th>#</th>
                <th>ID:</th>
                <th>Name:</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($config['users'] as $index => $userArray): ?>
                <tr>
                    <td><?= $index; ?></td>
                    <td><?= $userArray['id']; ?></td>
                    <td><?= $userArray['name']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="table_component" role="region" tabindex="0">
    <table>
        <caption>Settings</caption>
        <thead>
            <tr>
                <th>Name:</th>
                <th>Value:</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Theme</td>
                <td><?= $config['settings']['theme']; ?></td>
            </tr>
            <tr>
                <td>Language</td>
                <td><?= $config['settings']['language']; ?></td>
            </tr>
        </tbody>
    </table>
</div>