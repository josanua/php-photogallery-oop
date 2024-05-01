<?php

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

                    $user_class = new User();
                    var_dump($user_class->create('josanu', '1234', 'Josanun', 'Andrei'));

//                     $found_user = User::find_user_by_id(1);
//                    echo $found_user->username;
//                    $pictures = new Picture();
//
//                $user = User::instantiation($found_user);
//
//                var_dump($user);
//                echo $user->id;

//                echo $found_user['username'];

//                var_dump(User::find_user_by_id(1));

//                $sql = "SELECT * FROM  users WHERE id=1";
//                $result = $database->query($sql);
//                $user_found = mysqli_fetch_array($result);
//
//                echo $user_found['username'];

//                  $users = User::find_all_users();
//
////                  var_dump($users);
//                  foreach ($users as $user) {
//                      echo $user->id . "<br>";
//                  }
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
