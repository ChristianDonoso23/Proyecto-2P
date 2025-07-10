<form method="POST" action="">
    <h3>Ecuación 1: a1·x + b1·y = c1</h3>
    <input type="number" name="a1" step="any" required placeholder="a1" value="<?= htmlspecialchars($_POST['a1'] ?? '') ?>">
    <input type="number" name="b1" step="any" required placeholder="b1" value="<?= htmlspecialchars($_POST['b1'] ?? '') ?>">
    <input type="number" name="c1" step="any" required placeholder="c1" value="<?= htmlspecialchars($_POST['c1'] ?? '') ?>">

    <h3>Ecuación 2: a2·x + b2·y = c2</h3>
    <input type="number" name="a2" step="any" required placeholder="a2" value="<?= htmlspecialchars($_POST['a2'] ?? '') ?>">
    <input type="number" name="b2" step="any" required placeholder="b2" value="<?= htmlspecialchars($_POST['b2'] ?? '') ?>">
    <input type="number" name="c2" step="any" required placeholder="c2" value="<?= htmlspecialchars($_POST['c2'] ?? '') ?>">

    <br><br>
    <button type="submit">Resolver</button>
</form>

<?php if ($error !== null): ?>
    <p style="color: red; font-weight: bold;"><?= $error ?></p>
<?php endif; ?>

<?php if (isset($resultado)): ?>
    <h4>Resultado:</h4>
    <?php if (is_array($resultado)): ?>
        <ul>
            <li><strong>x:</strong> <?= $resultado['x'] ?></li>
            <li><strong>y:</strong> <?= $resultado['y'] ?></li>
        </ul>
    <?php else: ?>
        <p style="color: #a00; font-weight: bold;"><?= htmlspecialchars($resultado) ?></p>
    <?php endif; ?>
<?php endif; ?>
