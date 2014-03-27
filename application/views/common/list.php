<?php 
$keys = array_keys($list[0]);
?>
<div class="row">
    <div class="col-md-12">
        <table id="widgets_table" class="table table-striped table-bordered table-condensed" style="width:100%">
            <thead>
                <tr>
                    <th><input type="checkbox"/></th>
                    <?php 
                    foreach ($keys as $key) {
                        echo '<th>'.$key.'</th>';
                    }
                    ?>
                <th></th>
                </tr>
            </thead>
            <tbody>
            <?php 
            foreach ($list as $item) {
                ?>
                <tr>
                    <th><input type="checkbox"/></th>
                    <?php
                    $view_url = '/'.$obj_type.'/'.$item['id'];
                    $edit_url = $view_url.'/edit';
                    $delete_url = $view_url.'/delete';
                    foreach ($keys as $key) {
                        if ($key == 'id') {
                            echo '<td><a href="'.$view_url.'">'.$item[$key].'</a></td>';
                        } else {
                            echo '<td>'.$item[$key].'</td>';
                        }
                    }
                    ?>
                    <td class="actions">
                        <div class="btn-group btn-group-sm">
                          <a href="<?php echo $edit_url;?>" class="btn btn-default">Edit</a>
                          <a href="<?php echo $delete_url;?>" class="btn btn-default">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>