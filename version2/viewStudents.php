<!--/**-->
<!-- * Created by PhpStorm.-->
<!-- * User: hamdy-->
<!-- * Date: 2/24/16-->
<!-- * Time: 1:16 PM-->
<!-- */-->

<div class="span8">
    <div class="box">
        <header>
            <div class="icons"><i class="icon-edit"></i></div>
            <h5>Students</h5>
            <div>
                <a href="#actionTable" data-toggle="collapse" class="accordion-toggle minimize-box"></a>
            </div>
        </header>

        <div id="actionTable" class="body">
            <table id="dataTable" class="table table-bordered table-condensed table-hover table-striped responsive">
                <thead>
                <tr>
                    <th>First Name
                        <i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                    <th>Last Name
                        <i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                    <th>Identity Number
                        <i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                    <th>ECDL LogBook Number
                        <i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>

                </tr>
                </thead>
                <tbody id = "tableBody">


                <?php
                include 'pullData.php';

                $students = getData("Student");

                for($i=0; $i<sizeof($students); $i++){
                    echo '<tr>';
                    echo '<td>'.$students[$i][2].'</td>';
                    echo '<td>'.$students[$i][3].'</td>';
                    echo '<td>'.$students[$i][4].'</td>';
                    echo '<td>'.$students[$i][6].'</td>';
                    echo '<td>
                            <button class="btn edit"><i class="icon-edit"></i></button>
                            <button class="btn btn-danger remove" data-toggle="confirmation"><i class="icon-remove"></i></button>
                            </td>';
                    echo '</tr>';
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>
</div>