<form action="/<?php echo $obj_type;?>/update" method="post" role="form" class="form-horizontal">
    <fieldset>
        <legend>New <?php echo $obj_type;?></legend>
        <?php 
        foreach ($columns as $col) {
            if (in_array($col->Field, array('created', 'updated'))) {
               continue;
            }
            if ($col->Field == 'id') {
                echo '<input name="obj[id]" type="hidden" value="'.$object[$col->Field].'"/>';
                continue;
            }
        ?>
        <div class="form-group">
            <label for="<?php echo $col->Field;?>" class="col-sm-2 control-label"><?php echo $col->Field?></label>
            <div class="col-sm-6">
                <?php
                $field_type = 'text';
                if (start_with($col->Type, 'datetime')) {
                    $field_type = 'datetime';
                }
                echo '<input name="obj['.$col->Field.']" type="text" class="form-control" value="'.$object[$col->Field].'"/>';
                ?>
            </div>
        </div>
        <?php
        }
        ?>
    </fieldset>
    <div class="form-actions">
        <input type="submit" class="btn btn-default" value="Save"/>
        <a type="button" class="btn" href="/<?php echo $obj_type;?>">Cancel</a>
    </div>
</form>
