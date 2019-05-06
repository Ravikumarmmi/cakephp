<div class="panel panel-primary">
        <div class="panel-heading">Book Edit
        <?php
            echo $this->Html->link(
                "< back",
                "/",
                [
                    "class"=>"btn btn-info pull-right",
                    "style"=>"margin-top:-7px;"
                ]
            );
        ?>
        </div>
        <div class="panel-body">
            <?php
                echo $this->Form->create(
                    null,
                    [
                        "url"=>["action"=>"update"],
                        "type"=>"file",
                        "class" => "form-horizontal"
                    ]
                );
            ?> 
                <input type="hidden" value="<?php echo $book->id; ?>" name="bookID">
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Name:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" value="<?php echo $book->name; ?>" name="name" placeholder="Enter name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="author">Author:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="author" value="<?php echo $book->author; ?>" name="author" placeholder="Enter Author">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Email Id:</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" id="email" value="<?php echo $book->email; ?>" name="email" placeholder="Enter Email Id">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="description">Description:</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" id="description" name="description" placeholder="Enter Description"><?php echo $book->description; ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2" for="email">Upload Image :</label>
                    <div class="col-sm-10">
                    <input type="file" class="form-control" id="file" name="file">
                    <br>
                    <p><?php echo $book->img; ?></p>
                    </div>
                </div>
                <div class="form-group"> 
                    <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
</div>


