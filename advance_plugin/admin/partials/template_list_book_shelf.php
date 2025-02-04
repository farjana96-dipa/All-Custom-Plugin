

<div class="container" id="list_book">
    <div class="row">
        <div class="col-md-12 py-5">
            <div class="panel panel-primary">
                <div class="panel-heading">List Book Shelf</div>
                <div class="panel-body">
                <table id="book_list_shelf" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Capacity</th>
                <th>Shelf Location</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if(count($res) > 0){
                    foreach($res as $idx => $data){
                        ?>
                            <tr>
                                <td><?php echo $data->id ?> </td>
                                <td><?php echo $data->shelf_name; ?></td>
                                <td><?php echo $data->capacity; ?></td>
                                <td><?php echo $data->shelf_location; ?></td>
                                <td>
                                    
                                
                                <?php
                                    if($data->status==1){
                                        echo "<button class='btn btn-info'>Active</button>";
                                    }else{
                                        echo "<button class='btn btn-danger'>Inactive</button>";
                                    }
                                ?>
                            
                            </td>
                                <td>
                                    <button class="btn btn-primary">Edit</button>  <button class="btn btn-danger delete-book-shelf" data-id="<?php echo $data->id; ?>">Delete</button></td>
                            </tr>
                        <?php
                    }
                }
            ?>
            
           
        </tbody>
        <tfoot>
        <tr>
                <th>ID</th>
                 <th>Name</th>
                <th>Capacity</th>
                <th>Shelf Location</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
                </div>
            </div>
        </div>
    </div>
</div>