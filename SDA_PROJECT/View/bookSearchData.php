<?php
$count = 1;
foreach ($bookArray as $k => $arr) {
    if (!empty($arr)) {
        ?>
        <tr>
            <td><?php echo $count++ ?></td>
            <td><?php echo $arr[1] ?></td>
            <td><?php echo $arr[2] ?></td>
            <td><?php echo $arr[3] ?></td>
            <td><?php echo $arr[4] ?></td>
            <td><?php echo $arr[5] ?></td>
            <td>
                <input id="id" name="id" type="hidden" value="<?php echo $arr[0] ?>">
                <a type="button" class="btn btn-warning edit-modal" data-toggle="modal"
                   data-target="#edit_modal">
                    <i class="glyphicon glyphicon-pencil"></i> Edit
                </a>
                <a type="button" class="btn btn-danger delete-modal" data-toggle="modal"
                   data-target="#delete_modal" style="">
                    <i class="glyphicon glyphicon-trash"></i> Delete
                </a>
            </td>
        </tr>
    <?php } else { ?>
        <tr>
            <td colspan="7" class="text-center">No Data Found</td>
        </tr>
    <?php }
} ?>