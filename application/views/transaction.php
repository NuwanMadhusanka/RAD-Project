<div class="container">

    <table class="table table-striped">

        <thead>

            <tr>

                <td class="bg-dark text-light">#</td>

                <td class="bg-dark text-light">STUDENT NAME</td>

                <td class="bg-dark text-light">AMOUNT (Rs.)</td>

                <td class="bg-dark text-light">PAID MONTHS</td>

                <td class="bg-dark text-light">DATE</td>

            </tr>

        </thead>

        <tbody>

            <?php

                foreach($transactionData as $row){

                    echo '<tr>

                            <td>' . $row["transaction_id"] . '</td>

                            <td>' . $row["student_name"] . '</td>

                            <td>' . $row["amount"] . '</td>

                            <td>' . $row["month"] . '</td>

                            <td>' . $row["date"] . '</td>

                        </tr>';

                }

            ?>

        </tbody>

    </table>

</div>