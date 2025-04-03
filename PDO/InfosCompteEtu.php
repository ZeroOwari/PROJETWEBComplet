
    <div class="detail-row">
        <p><strong>Mail :</strong> <span id="email-display"><?php echo $_SESSION['email'] ?? ''; ?></span></p>
        <input type="email" name="email" id="email-input" value="<?php echo $_SESSION['email'] ?? ''; ?>" class="edit-field" />
        <button type="button" onclick="toggleEdit('email')">✎</button>
    </div>
    <div class="detail-row">
        <p><strong>Mot de passe :</strong> <span id="password-display"><?php echo $_SESSION['password'] ?? ''; ?></span></p>
        <input type="password" name="password" id="password-input" value="<?php echo $_SESSION['password'] ?? ''; ?>" class="edit-field" />
        <button type="button" onclick="toggleEdit('password')">✎</button>
    </div>
    <div class="detail-row">
        <p><strong>Tél :</strong> <span id="telephone-display"><?php echo $_SESSION['telephone'] ?? ''; ?></span></p>
        <input type="text" name="telephone" id="telephone-input" value="<?php echo $_SESSION['telephone'] ?? ''; ?>" class="edit-field" />
        <button type="button" onclick="toggleEdit('telephone')">✎</button>
    </div>

    <div class="detail-row">
        <p><strong>Date de naissance :</strong> <span id="birthdate-display"><?php echo $_SESSION['DateNaissance'] ?? ''; ?></span></p>
        <input type="date" name="DateNaissance" id="birthdate-input" value="<?php echo $_SESSION['DateNaissance'] ?? ''; ?>" class="edit-field" />
        <button type="button" onclick="toggleEdit('birthdate')">✎</button>
    </div>

    <div class="detail-row">
        <p><strong>Promo :</strong> <span id="promo-display"><?php echo $_SESSION['promo'] ?? ''; ?></span></p>
        <input type="text" name="promo" id="promo-input" value="<?php echo $_SESSION['promo'] ?? ''; ?>" class="edit-field" />
        <button type="button" onclick="toggleEdit('promo')">✎</button>
    </div>

    <div class="detail-row">
        <img src=<?php $_SESSION['path'] ?>>
    </div>

    <div class="detail-row">
        <button type="submit">Enregistrer</button>
    </div>
