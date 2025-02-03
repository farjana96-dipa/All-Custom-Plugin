

<div class="container" id="create_book">
    <div class="row ">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading pt-5">Create Book</div>
                <div class="panel-body">
                    <form action="/action_page.php" class="form">

                        
                        <div class="form-group">
                            <label for="name" class="form-label">Full Name:</label>
                            <input type="text" class="form-control" id="name" name="text_name" placeholder="Enter Your Name">
                        </div>

                        
                        <div class="form-group">
                            <label for="email">Email Address:</label>
                            <input type="email" class="form-control" id="email" name="text_email" placeholder="Enter Your Email Address">
                        </div>

                        
                        <div class="form-group">
                            <label for="publication">Publication:</label>
                            <input type="text" class="form-control" id="publication" name="text_publication" placeholder="Enter Your Publication Name">
                        </div>

                        
                        <div class="form-group">
                            <label for="description">Description:</label>
                           
                                <textarea name="text_descrption" id="description" class="form-control" placeholder="Enter Your Message"></textarea>
                        
                        </div>

                        
                        <div class="form-group">
                            <label for="book_image">Book Image:</label>
                            <input type="file" class="form-control" id="book_image" name="book_image" >
                        </div>

                        
                        <div class="form-group">
                            <label for="cost">Book Cost:</label>
                            <input type="text" class="form-control" id="cost" name="book_cost" placeholder="Enter Your Book Price">
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