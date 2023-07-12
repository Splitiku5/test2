<?php
/**
 * @var array $error
 */

?>
<?php if($error): ?>
<div class="error">
    <?= $error ?>
</div>
<?php endif; ?>
<form name="CSVfile" method="post" action="" enctype="multipart/form-data">
<div>
    <label for="formFile" class="form-label">Выберите файл CSV для отображения.</label>
    <input name="uploadedFile" class="form-control" type="file" id="formFile" accept="text/csv">
    <button type="submit" class="btn btn-primary">Загрузить</button>
</div>
</form>
