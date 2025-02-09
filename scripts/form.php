<?php
$errors = [];
$id = (int) $_POST['id'];
$name = $_POST['name'];

// reading config
$config = file_get_contents(__DIR__ . '../config.json');
$config = json_decode($config);
if($config === null){
    $errors['config'] = 'Error occured when reding config.json';
}

// id validation
if (isset($id) && $id > 0) {
    $isAlreadyExist = false;
    foreach ($config['users'] as $userArray) {
        if ($userArray['id'] === $id) $isAlreadyExist;
    }

    if ($isAlreadyExist) {
        $errors['id'] = 'This id already exists.';
    } else {
        $id = $id;
    }
} else {
    $errors['id'] = 'Invalid id number';
}

// name validation
if (!isset($name) || !mb_strlen($name) < 2) {
    $errors['name'] = 'Invalid name';
}

if (count($errors) === 0) {
    $config['users'][] = [
        'id' => $id,
        'name' => $name,
    ];
    if (file_put_contents(__DIR__ . '../config.json', $config) === false) {
        $errors['config'] = 'Error occured when creating user';
    }
}

if (count($errors) !== 0) {
    $query = http_build_query([
        'errors' => json_encode($errors), 'name' => $name, 'id' => $id
    ]);
    header('Location: /php-config-editor/index.php' . "?$query");
    exit;
}

echo "Form submitted succesfully!";
