<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-4 text-gray-800">View Booked Tickets</h1>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered" style="min-width: 600px;">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Booked For</th>
                            <th scope="col">Child Tickets #</th>
                            <th scope="col">Student Tickets #</th>
                            <th scope="col">Regular Tickets #</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Visit Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tickets as $key => $ticket) { ?>
                            <tr>
                                <th scope="row"><?= $key + 1 ?></th>
                                <td><?= $ticket['book_name'] ?></td>
                                <td><?= $ticket['child_num'] ?></td>
                                <td><?= $ticket['student_num'] ?></td>
                                <td><?= $ticket['regular_num'] ?></td>
                                <td>$<?= $ticket['regular_num'] * 6 +  $ticket['student_num'] * 3 + $ticket['child_num'] * 2 ?></td>
                                <td><?= $ticket['t_date'] ?></td>
                            </tr>
                        <?php }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>