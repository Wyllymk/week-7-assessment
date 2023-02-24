
<h2 class="text-center text-warning mt-3"><u>View Added Employees</u></h2>

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Date Created</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
            global $wpdb;
            $table = $wpdb->prefix.'admin_employees';
            $employees = $wpdb->get_results("SELECT * FROM $table");
            foreach($employees as $employee){
           ?>
                <tr>
                    <td><?php echo $employee->event_date;?></td>
                    <td><?php echo $employee->firstname;?></td>
                    <td><?php echo $employee->lastname;?></td>
                    <td><?php echo $employee->email;?></td>
                    <td><?php echo $employee->phone;?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?php echo $employee->employee_id; ?>">
                            <input type="submit" name="delbtnemployee" class="btn btn-danger" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>
