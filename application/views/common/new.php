<form action="/<?php echo $obj_type;?>/save" method="post" role="form" class="form-horizontal">
    <fieldset>
        <legend>New <?php echo $obj_type;?></legend>
        <?php 
        foreach ($columns as $col) {
            if (in_array($col->Field, array('id', 'created', 'updated'))) {
               continue;
            }
        ?>
        <div class="form-group">
            <label for="<?php echo $col->Field;?>" class="col-sm-2 control-label"><?php echo $col->Field?></label>
            <div class="col-sm-6">
                <?php 
                if (start_with($col->Type, 'int')) {
                    echo '<input name="obj['.$col->Field.']" type="text" class="form-control"/>';
                } else if (start_with($col->Type, 'varchar')) {
                    echo '<input name="obj['.$col->Field.']" type="text" class="form-control"/>';
                } else if (start_with($col->Type, 'datetime')) {
                    echo '<input type="datetime" class="form-control" name="obj['.$col->Field.']">';
                } else {
                    echo '<input name="obj['.$col->Field.']" type="text"/>';
                }
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