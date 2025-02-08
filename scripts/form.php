<?php
$errors = [];
$id = $_POST['id'];
$name = $_POST['name'];

// id validation
if (isset($id) && is_int($id)) {
    $isAlreadyExist = false;
    foreach ($config['users'] as $userArray) {
        if ($userArray['id'] === (int) $id) $isAlreadyExist;
    }

    if ($isAlreadyExist) {
        $errors['id'] = 'This id already exists.';
    } else {
        $id = (int) $id;
    }
} else {
    $errors['id'] = 'Invalid id number';
}

// name validation
if (!isset($name) || !mb_strlen($name) >= 2) {
    $errors['name'] = 'Invalid name';
}

if (count($errors) === 0) {
    $config = file_get_contents(__DIR__ . '../config.json');
    $config = json_decode($config);
    if ($config) {
        $config['users'] = [
            'id' => $id,
            'name' => $name,
        ];
        file_put_contents(__DIR__ . '../config.json', $config);
        if (false) {
            $errors['config'] = 'Error occured when creating user';
        }
    } else {
        $errors['config'] = 'Error occured when reding config.json';
    }
}

if (count($errors) !== 0) {
    $query = http_build_query(['errors' => json_encode($errors), 'name' => $name, 'id' => $id]);
    header('Location: ' . __DIR__ . '/../index.php' . "?$query");
    exit;
}

echo "Form submitted succesfully!";
