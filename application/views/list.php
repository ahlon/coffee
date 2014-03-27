<?php 
$keys = array_keys($list[0]);
?>
<div class="row">
    <div class="col-md-12">
        <table id="widgets_table" class="table table-striped">
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
                    $obj_type = 'user';
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
                        <a href="<?php echo $view_url;?>"><i class="icon-search"></i></a>&nbsp;
                        <a href="<?php echo $edit_url;?>"><i class="icon-edit"></i></a>&nbsp;
                        <a href="<?php echo $delete_url;?>"><i class="icon-trash"></i></a>&nbsp;
                    </td>
                </tr>
            <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
