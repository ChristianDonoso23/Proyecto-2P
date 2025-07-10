<form method="POST" action="">
    <h3>Ecuación 1: a1·x + b1·y = c1</h3>
    <input type="number" name="a1" step="any" required placeholder="a1">
    <input type="number" name="b1" step="any" required placeholder="b1">
    <input type="number" name="c1" step="any" required placeholder="c1">

    <h3>Ecuación 2: a2·x + b2·y = c2</h3>
    <input type="number" name="a2" step="any" required placeholder="a2">
    <input type="number" name="b2" step="any" required placeholder="b2">
    <input type="number" name="c2" step="any" required placeholder="c2">

    <br><br>
    <button type="submit">Resolver</button>
</form>

<?php if (isset($resultado)): ?>
    <h4>Resultado:</h4>
    <pre><?php print_r($resultado); ?></pre>
<?php endif; ?>
