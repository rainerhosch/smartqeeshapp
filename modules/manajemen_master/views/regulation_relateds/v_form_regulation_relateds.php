<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<div class="form-group">
    <label for="exampleInputEmail1"><?=$fieldName?></label>
    <input class="form-control" id="id" name="id" type="hidden" value="<?= isset($id) ? $id : "" ?>" />
    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" data-type="input" value="<?= isset($name) ? $name : "" ?>">
</div>
<div class="form-group">
    <label for="exampleInputPassword1">Status</label>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="status" id="status" value="active" data-type="checkbox" <?=isset($status) && $status == 'active' ? "checked" : ""?>>
        <label class="form-check-label">Active</label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="radio" name="status" value="non active" data-type="checkbox" <?=isset($status) && $status != 'active' ? "checked" : ""?>>
        <label class="form-check-label">Non Active</label>
    </div>
    <div class="form-check" id="statusMessage">
        
    </div>
</div>