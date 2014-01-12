<div class="content">
    <div class="row">
        <div class="col-md-4">
            <h2>New Contacts</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8">
            <table>
                <tr>
                    <th>First Name</th>
                    <th>Surname</th>
                    <th>Address</th>
                    <th>DOB</th>
                    <th>Phone No.</th>
                    <th>Email</th>
                </tr>
                <?php foreach ($users as $users_item): ?>
                    <tr>
                        <td><?php echo $users_item['firstName'] ?></td>
                        <td><?php echo $users_item['lastName'] ?></td>
                        <td><?php echo $users_item['address'] ?></td>
                        <td><?php echo $users_item['dateOfBirth'] ?></td>
                        <td><?php echo $users_item['phoneNumber'] ?></td>
                        <td><?php echo $users_item['email'] ?></td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>

