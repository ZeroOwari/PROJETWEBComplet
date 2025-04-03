<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    $email = $_POST['email'] ?? $_SESSION['email'];
    $password = $_POST['password'] ? password_hash($_POST['password'], PASSWORD_BCRYPT) : $_SESSION['password'];
    
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;

    include("Admin.php");
    $db = new Admin('mysql:host=localhost;dbname=web4all', 'website_user', 'kxHBI-ozJOjvwr_H');
    $db->updateAdmin($_SESSION['id'], [
        'firstname' => $_SESSION['firstname'],
        'lastname' => $_SESSION['name'],
        'email' => $email,
        'password' => $password,
    ]);

    echo "Modifications enregistrées avec succès.";
}

?>

<form action="InfosCompteEtu.php" method="POST">
    <div class="detail-row">
        <p><strong>Mail :</strong> <span id="email-display"><?php echo $_SESSION['email'] ?? ''; ?></span></p>
        <input type="email" name="email" id="email-input" value="<?php echo $_SESSION['email'] ?? ''; ?>" class="edit-field">
        <button type="button" onclick="toggleEdit('email')">✎</button>
    </div>
    <div class="detail-row">
        <p><strong>Mot de passe :</strong> <span id="password-display">********</span></p>
        <input type="password" name="password" id="password-input" value="" class="edit-field">
        <button type="button" onclick="toggleEdit('password')">✎</button>
    </div>

    <div class="detail-row">
        <button type="submit" name="update">Enregistrer</button>
    </div>
</form>


