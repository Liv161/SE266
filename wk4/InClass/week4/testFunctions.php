<?php


include_once './functions/dbData.php';


$allResults = getAllTestData();
$res = getSearchData ("phone", "128");

$columns = getColumns();

?>


<select name="field">
    
    <?php foreach ($columns as $col): ?>
    <option value="<?php echo $col; ?>">
        <?php echo $col; ?>
    </option>
    <?php endforeach; ?>
</select>
