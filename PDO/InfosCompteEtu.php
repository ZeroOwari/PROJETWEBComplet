<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $email = $_POST['email'] ?? $_SESSION['email'];
    $password = $_POST['password'] ? password_hash($_POST['password'], PASSWORD_BCRYPT) : $_SESSION['password'];
    $telephone = $_POST['telephone'] ?? $_SESSION['telephone'];
    $birthdate = $_POST['DateNaissance'] ?? $_SESSION['date'];
    $promo = $_POST['promo'] ?? $_SESSION['promo'];
    $path = $_POST['path'] ?? $_SESSION['path']; 
    $stage = $_POST['stage'] ?? $_SESSION['stage'];

    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    $_SESSION['telephone'] = $telephone;
    $_SESSION['date'] = $birthdate;
    $_SESSION['promo'] = $promo;
    $_SESSION['path'] = $path;

    include("Admin.php");
    $db = new Admin('mysql:host=localhost;dbname=web4all', 'website_user', 'kxHBI-ozJOjvwr_H');
    $db->updateStudent($_SESSION['id'], [
        'firstname' => $_SESSION['firstname'],
        'lastname' => $_SESSION['name'],
        'email' => $email,
        'password' => $password,
        'telephone' => $telephone,
        'date' => $birthdate,
        'path' => $path, 
        'idpromo' => $promo,
        'stage' => $stage
    ]);

    $db->updateStudent($_SESSION['id'], [
        $_SESSION['firstname'],
        $_SESSION['name'],
        $_SESSION['mail'],
        $_SESSION['password'],
        $_SESSION['telephone'],
        $_SESSION['date'],
        $_SESSION['path'],
        $_SESSION['idpromo'],
        $_SESSION['stage']
    ]);

    echo "Modifications enregistrées avec succès.";
}

$telephone = $_SESSION['telephone'] ?? '';
$birthdate = $_SESSION['date'] ?? '';   
$promo = $_SESSION['promo'] ?? '';
$path = $_SESSION['path'] ?? ''; 
$stage = $_SESSION['stage'] ?? '';
?>

<form action="InfosCompteEtu.php" method="POST">
    <div class="detail-row">
        <p><strong>Mail :</strong> <span id="email-display"><?php echo $_SESSION['email'] ?? ''; ?></span></p>
        <input type="email" name="email" id="email-input" value="<?php echo $_SESSION['email'] ?? ''; ?>" class="edit-field">
    </div>
    <div class="detail-row">
        <p><strong>Mot de passe :</strong> <span id="password-display">********</span></p>
        <input type="password" name="password" id="password-input" value="" class="edit-field">
    </div>
    <div class="detail-row">
        <p><strong>Promo :</strong> <span id="promo-display"><?php echo $promo; ?></span></p>
        <input type="text" name="promo" id="promo-input" value="<?php echo $promo; ?>" class="edit-field">
    </div>
    <div class="detail-row">
        <p><strong>Tél :</strong> <span id="telephone-display"><?php echo $telephone; ?></span></p>
        <input type="text" name="telephone" id="telephone-input" value="<?php echo $telephone; ?>" class="edit-field">
        <button type="button" onclick="toggleEdit('telephone')">✎</button>
    </div>
    <div class="detail-row">
        <p><strong>Date de naissance :</strong> <span id="birthdate-display"><?php echo $birthdate; ?></span></p>
        <input type="date" name="DateNaissance" id="birthdate-input" value="<?php echo $birthdate; ?>" class="edit-field">
        <button type="button" onclick="toggleEdit('birthdate')">✎</button>
    </div>
    <div class="detail-row">
        <p><strong>Stage :</strong> <span id="promo-display"><?php echo $stage; ?></span></p>
        <input type="text" name="stage" id="stage-input" value="<?php echo $stage; ?>" class="edit-field">
        <button type="button" onclick="toggleEdit('stage')">✎</button>
    </div>
    <div class="detail-row">
        <img src="<?php echo $path; ?>" alt="Importez votre CV">
    </div>
    <div class="detail-row">
        <button type="submit" name="update">Enregistrer</button>
    </div>
</form>

