<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="modal-header">
    <h5 class="modal-title" id="exampleModalCenterTitle"><?=$title_modal?></h5>
</div>
<div class="modal-body">
    <form id="form" data-url="<?=$url_form?>">
        <?=$form?>
    </form>
</div>
<div class="modal-footer">
    <button class="btn btn-secondary btn-rounded" type="button" <?= (isset($buttonCloseID) ? "id=\"".$buttonCloseID."\"":"id=\"btnCloseModal\"") ?> >Close</button>
    <?=isset($buttonSave) && !$buttonSave ? "": "<button class=\"btn btn-primary btn-rounded ml-2\" type=\"button\" id=\"".(isset($buttonID) ? $buttonID : "btnProcessModal")."\" ".(isset($buttonTypeSave) ? "data-type=\"{$buttonTypeSave}\"" : "").">".(isset($buttonName) ? $buttonName : 'Save changes')."</button>"?>
</div>