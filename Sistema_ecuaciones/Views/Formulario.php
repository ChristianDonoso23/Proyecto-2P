<?php $dimension = $_POST['dimension'] ?? '2'; ?>

<form method="POST" class="equation-form">
    <!-- Selector de sistema -->
    <div class="form-group">
        <label for="dimension" class="form-label">
            <i class="fas fa-cog"></i> Tipo de sistema:
        </label>
        <select name="dimension" id="dimension" class="form-select" onchange="this.form.submit()">
            <?php foreach ([2, 3] as $dim): ?>
                <option value="<?= $dim ?>" <?= $dimension == $dim ? 'selected' : '' ?>>Sistema <?= $dim ?>x<?= $dim ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Generador de ecuaciones -->
    <div class="equations-container">
        <?php for ($i = 1; $i <= $dimension; $i++): ?>
            <div class="equation-block">
                <h3 class="equation-title">
                    <span class="equation-number"><?= $i ?></span>
                    Ecuación <?= $i ?>: 
                    <span class="equation-formula">
                        <?php if ($dimension == 2): ?>
                            a<?= $i ?>x + b<?= $i ?>y = c<?= $i ?>
                        <?php else: ?>
                            a<?= $i ?>x + b<?= $i ?>y + c<?= $i ?>z = d<?= $i ?>
                        <?php endif; ?>
                    </span>
                </h3>
                <div class="coefficients-row">
                    <?php
                        $variables = ['a', 'b'];
                        if ($dimension == 3) $variables[] = 'c';
                        $variables[] = $dimension == 2 ? 'c' : 'd';

                        $letras = ['x', 'y'];
                        if ($dimension == 3) $letras[] = 'z';
                        $letras[] = '=';

                        foreach ($variables as $index => $var):
                    ?>
                        <div class="coefficient-group">
                            <label class="coefficient-label"><?= $var . $i ?></label>
                            <input name="<?= $var . $i ?>" type="number" step="any" class="coefficient-input" 
                                   placeholder="0" value="<?= htmlspecialchars($_POST[$var . $i] ?? '') ?>">
                        </div>
                        <?php if ($index < count($letras)): ?>
                            <span class="operation"><?= $letras[$index] ?><?= $index < count($letras) - 2 ? ' +' : '' ?></span>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endfor; ?>
    </div>

    <!-- Botones -->
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-calculator"></i> Resolver Sistema
        </button>
    </div>
</form>
