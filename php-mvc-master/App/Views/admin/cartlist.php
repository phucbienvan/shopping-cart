<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Category List</h2>
        <div class="block">
            <table class="data display datatable" id="example">
                <thead>
                <tr>
                    <th>Serial No.</th>
                    <th>Customer</th>
                    <th>Total</th>
<!--                    <th>Action</th>-->
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 0;
                foreach ($carts as $item){
                    $i++;
                    ?>
                    <tr class="odd gradeX">
                        <td> <?php echo $i?></td>
                        <td><?php echo $item['id_customer']?></td>
                        <td><?php echo $item['total']?></td>
<!--                        <td>-->
<!--                            <a href="/admin/catlist/--><?php //echo $item['id']?><!--">Delete</a>-->
<!--                        </td>-->
                    </tr>

                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>

