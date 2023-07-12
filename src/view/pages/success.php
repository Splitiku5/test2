<?php
/**
 * @var array $content
 */
?>
<div class="table">
    <table class="table">
        <tbody>
        <?php foreach ($content as $string): ?>
            <tr>
                <?php foreach ($string as $item): ?>
                    <td><?= $item ?></td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<a href="/" class="btn btn-primary">Попробовать снова!</a>
