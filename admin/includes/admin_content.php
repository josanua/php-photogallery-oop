<?php
//var_dump(DB_HOST);
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Admin
                <small>Subheading</small>
            </h1>

            <?php
//                $result_set = User::find_all_users();
//
//                while ($row = mysqli_fetch_array($result_set)) {
//                    echo $row['username'] . "<br>";
//                }

                $found_user = User::find_user_by_id(2);

                $user = new User();

                echo $user->id;

//                echo $found_user['username'];

//                var_dump(User::find_user_by_id(1));

//                $sql = "SELECT * FROM  users WHERE id=1";
//                $result = $database->query($sql);
//                $user_found = mysqli_fetch_array($result);
//
//                echo $user_found['username'];

            ?>

            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>
                    <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->
