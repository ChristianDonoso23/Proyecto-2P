<form method="POST" id="formulario">
    <label>Tipo de sistema:
        <select name="dimension" id="dimension" onchange="this.form.submit()">
            <option value="2" <?= $dimension == '2' ? 'selected' : '' ?>>2x2</option>
            <option value="3" <?= $dimension == '3' ? 'selected' : '' ?>>3x3</option>
        </select>
    </label>

    <hr>

    <?php if ($dimension == '2'): ?>
        <h3>Ecuación 1: a1·x + b1·y = c1</h3>
        <input name="a1" type="number" step="any" placeholder="a1" value="<?= $_POST['a1'] ?? '' ?>">
        <input name="b1" type="number" step="any" placeholder="b1" value="<?= $_POST['b1'] ?? '' ?>">
        <input name="c1" type="number" step="any" placeholder="c1" value="<?= $_POST['c1'] ?? '' ?>">

        <h3>Ecuación 2: a2·x + b2·y = c2</h3>
        <input name="a2" type="number" step="any" placeholder="a2" value="<?= $_POST['a2'] ?? '' ?>">
        <input name="b2" type="number" step="any" placeholder="b2" value="<?= $_POST['b2'] ?? '' ?>">
        <input name="c2" type="number" step="any" placeholder="c2" value="<?= $_POST['c2'] ?? '' ?>">

    <?php else: ?>
        <?php for ($i = 1; $i <= 3; $i++): ?>
            <h3>Ecuación <?= $i ?>: a<?= $i ?>·x + b<?= $i ?>·y + c<?= $i ?>·z = d<?= $i ?></h3>
            <?php foreach (['a','b','c','d'] as $letra): ?>
                <input name="<?= $letra . $i ?>" type="number" step="any"
                       placeholder="<?= $letra . $i ?>" value="<?= $_POST[$letra . $i] ?? '' ?>">
            <?php endforeach; ?>
        <?php endfor; ?>
    <?php endif; ?>

    <br><br>
    <button type="submit">Resolver</button>
</form>

<?php if ($error): ?>
    <p style="color: red;"><?= $error ?></p>
<?php endif; ?>

<?php if ($resultado): ?>
    <h4>Resultado:</h4>
    <?php if (is_array($resultado)): ?>
        <ul>
            <?php foreach ($resultado as $var => $val): ?>
                <li><strong><?= strtoupper($var) ?>:</strong> <?= $val ?></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p style="color: #b00;"><?= $resultado ?></p>
    <?php endif; ?>
<?php endif; ?>
