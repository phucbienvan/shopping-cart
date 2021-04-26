<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                 <form method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." class="medium" name="name" value="">
                                <input type="text" placeholder="Enter Category description" class="medium" name="description" value=""/>
                                <input type="text" placeholder="Enter Category Name..." class="medium" name="image" value=""/>

                            </td>
                        </tr>
						<tr>
                            <td>
                                <input type="submit" name="submit" value="add"/>
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>