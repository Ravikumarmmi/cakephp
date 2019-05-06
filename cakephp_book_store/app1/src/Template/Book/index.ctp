<div class="row">
    <div class="panel panel-primary">
        <div class="panel-heading">Book List
        <?php
            echo $this->Html->link(
                "+ Add Book",
                "/book/create/",
                [
                    "class"=>"btn btn-success pull-right",
                    "style"=>"margin-top:-7px;"
                ]
            );
        ?>
        </div>
        <div class="panel-body">
        <div class="container">
            <h2>Books List</h2>
            <table class="table">
                <thead>
                <tr>
                    <th>Sr no.</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Email Address</th>
                    <th>Book Image</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                    <?php
                    $count =1;
                    foreach($books as $key=>$book){
                        ?>
                            <tr>
                                <td><?= $count++ ?></td>
                                <td><?= $book->name ?></td>
                                <td><?= $book->author ?></td>
                                <td><?= $book->email ?></td>
                                <td>
                                <?php if(empty($book->img)){
                                    echo "N/A";
                                    }else{
                                        ?>
                                            <img src="<?php echo $book->img; ?>" style="height:50px; width:100px; background-color:red;">
                                        <?php
                                    }
                                ?>
                                </td>
                                <td>
                                    <?php
                                        echo $this->Html->link(
                                            "Edit",
                                            "/book/edit/".$book->id,
                                            [
                                                "class"=>"btn btn-info"
                                            ]
                                        );

                                        echo $this->Html->link(
                                            "Delete",
                                            "/book/delete/".$book->id,
                                            [
                                                "class"=>"btn btn-danger",
                                                "style"=>"margin-left:10px;"
                                            ]
                                        );
                                    ?>
                                </td>
                            </tr>
                        <?php
                    }
                    ?>
                
                </tbody>
            </table>
            </div>
        </div>
    </div>
</div>