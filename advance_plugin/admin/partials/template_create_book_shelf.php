

<div class="container" id="create_book_shelf">
    <div class="row ">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading py-3">Create Book Shelf
                    <button class="btn  pull-right" id="btn-first-ajax">First Ajax Request</button>
                </div>
                <div class="panel-body">
                    <form action="" class="form" id="create_book_shelf_form">

                        
                        <div class="form-group">
                            <label for="shelf_name" class="form-label">Book Shelf Name:</label>
                            <input type="text" class="form-control" id="shelf_name" name="shelf_name" placeholder="Enter Book Shelf Name">
                        </div>

                        
                        <div class="form-group">
                            <label for="capacity">Capacity:</label>
                            <input type="text" class="form-control" id="capacity" name="shelf_capacity" placeholder="Enter Capacity">
                        </div>

                        
                        <div class="form-group">
                            <label for="location">Location:</label>
                            <input type="text" class="form-control" id="location" name="location" placeholder="Enter Location">
                        </div>

                        
                        <div class="form-group">
                            <label for="status">Status:</label>
                           
                                <select name="status" id="" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            
                        </div>


                       <div class="form-group">
                            
                            <button type="submit" class="btn btn-primary">Submit</button>
                            
                       </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>