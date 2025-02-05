

<div class="container" id="list_book">
    <div class="row">
        <div class="col-md-12 py-5">
            <div class="panel panel-primary">
                <div class="panel-heading">List Book</div>
                <div class="panel-body">
                <table id="book_list" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Book Name</th>
                <th>Book Cost</th>
                <th>Book Language</th>
                <th>Description</th>
                <th>Shelf Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if($res){
                   // echo "From template list book";
                   // echo "<pre>";
                   // print_r($res);
                   // echo "</pre>";
                   foreach($res as $idx => $data){
                    ?>
                        <tr>
                            <td><?php echo $data['id'] ?> </td>
                            <td><?php echo $data['name']; ?></td>
                            <td><img src="<?php echo $data['book_image']; ?>" alt="" style="height:60px;width:60px;"></td>
                            <td><?php echo $data['amount']; ?></td>
                            <td><?php echo $data['language']; ?></td>
                            <td><?php echo $data['description']; ?></td>
                        
                            <td><?php 
                            global $wpdb;
                            $name = $wpdb->get_var("SELECT shelf_name FROM wp_book_shelf_table WHERE id = ".$data['shelf_id']);
                                echo $name;
                            ?></td>
                            <td>
                                
                            
                            <?php
                                if($data['status']==1){
                                    echo "<button class='btn btn-info'>Active</button>";
                                }else{
                                    echo "<button class='btn btn-danger'>Inactive</button>";
                                }
                            ?>
                        
                        </td>
                            <td>
                                <button class="btn btn-primary edit-book" data-id="<?php echo $data['id'] ?>">Edit</button>  
                        </tr>
                    <?php
                }
                }

            ?>
           
           
        </tbody>
        <tfoot>
        <tr>
        <th>ID</th>
                <th>Book Name</th>
                <th>Book Cost</th>
                <th>Book Language</th>
                <th>Description</th>
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