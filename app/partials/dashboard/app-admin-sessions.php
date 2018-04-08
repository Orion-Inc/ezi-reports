<?php
    $sessions = Database::query("SELECT `ezi_browser_details`.`browser_name`,(SELECT COUNT(`ezi_sessions`.`browser_id`) FROM `ezi_sessions` WHERE `ezi_sessions`.`browser_id` = `ezi_browser_details`.`id` AND `ezi_sessions`.`logout_date_time` IS NULL) AS count FROM `ezi_browser_details`");
?>

<?php $i = 1; foreach ($sessions as $session):?>
<tr>
    <td style="width:10%"><?php App::show($i)?></td>
    <td style="width:40%"><?php App::show($session['browser_name'])?></td>
    <td style="width:25%"><?php echo $session['count']?></td>
</tr>
<?php $i++; endforeach?>