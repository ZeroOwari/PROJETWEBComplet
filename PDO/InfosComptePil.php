
<div class="detail-row">
    <p><strong>Mail :</strong> <span id="email-display"><?php echo $_SESSION['email'] ?? ''; ?></span></p>
    <input type="email" name="email" id="email-input" value="<?php echo $_SESSION['email'] ?? ''; ?>" class="edit-field" />
</div>
<div class="detail-row">
    <p><strong>Mot de passe :</strong> <span id="password-display"><?php echo $_SESSION['password'] ?? ''; ?></span></p>
    <input type="password" name="password" id="password-input" value="<?php echo $_SESSION['password'] ?? ''; ?>" class="edit-field" />
</div>

<div class="detail-row">
    <button type="submit">Enregistrer</button>
</div>
