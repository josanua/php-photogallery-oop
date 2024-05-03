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
            //                    $user = new User();
            $user = User::find_user_by_id(3);

            var_dump($user);
            //                    $user->username = "Shnobeli";
            //                    $user->password = "1234";
            //                    $user->last_name = "Williams";
            //                    $user->first_name = "Konopit";
            //                    $user->id = 3;

            // $user->create();
            //                    $user->update();
            if ($user) {
                $user->delete();
            }
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
