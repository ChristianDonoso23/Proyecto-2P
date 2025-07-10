<form method="POST" action="">
    <label for="dataset">Ingrese números separados por comas:</label><br>
    <input type="text" name="dataset" id="dataset" required style="width: 300px;" placeholder="Ej: 4,5,3,3,2,1"><br><br>
    <button type="submit">Calcular estadísticas</button>
</form>

<?php if (!empty($resultado)): ?>
    <div class="resultado">
        <h4>Resultado:</h4>
        <ul>
            <li><strong>Media:</strong> <?= $resultado['media'] ?></li>
            <li><strong>Mediana:</strong> <?= $resultado['mediana'] ?></li>
            <li><strong>Moda:</strong>
                <?= is_array($resultado['moda']) ? implode(', ', $resultado['moda']) : 'No hay moda' ?>
            </li>
        </ul>
    </div>
<?php endif; ?>

