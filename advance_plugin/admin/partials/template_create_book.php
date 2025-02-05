
<?php
wp_enqueue_script('jquery');
wp_enqueue_media();
?>

<div class="container" id="create_book">
    <div class="row ">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading pt-5">Create Book
                <button class="btn  pull-right" id="btn-first-ajax">First Ajax Request</button>
                </div>
                <div class="panel-body">
                    <form action="javascript:void(0)" class="form" id="create_book_form">

                        <div class="form-group">
                       
                            <label for="shelf_name" class="form-label">Select Book Shelf</label>
                           
                            <select name="shelf_id" id="shelf_id">
                                <option value="selected">Choose Shelf Name</option>
                                <?php
                                if($res){
                                    echo "Result is found";
                                    foreach($res as $idx=>$data){
                                       ?>
                                        <option value="<?php echo $data->id; ?>"><?php echo ucwords($data->shelf_name); ?></option>
                                       <?php
                                    }
                                    
                                }
                               ?>
                            </select>
                        </div>    

                        <div class="form-group">
                            <label for="name" class="form-label">Book Name:</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Book Name">
                        </div>

                      

                        
                        <div class="form-group">
                            <label for="language">Language:</label>
                            <input type="text" class="form-control" id="language" name="language" placeholder="Enter Book Language Name">
                        </div>

                        
                        <div class="form-group">
                            <label for="description">Description:</label>
                           
                                <textarea  id="description" name="description" class="form-control" placeholder="Enter Book Description"></textarea>
                        
                        </div>

                        
                        <div class="form-group">
                            <label for="book_image">Book Image:</label>
                            <input type="button" class="form-control" name="book_image" id="book_image" value="Upload Image">
                            <img src="" alt="" id="book_image" style="height:60px;width:60px;">
                            <input type="hidden" class="form-control" id="book_cover_image" name="book_cover_image" >
                        </div>

                        
                        <div class="form-group">
                            <label for="cost">Book Cost:</label>
                            <input type="number" class="form-control" id="cost" name="amount" placeholder="Enter Book Price">
                        </div>

                        
                        <div class="form-group">
                            <label for="status">Status:</label>
                           
                                <select name="status" id="status" class="form-control">
                                    <option value="0">Active</option>
                                    <option value="1">Inactive</option>
                                </select>
                            
                        </div>


                       <div class="form-group">
                            
                            <button type="submit" class="btn btn-primary" id="ajaxbtn1">Submit</button>
                            
                       </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>