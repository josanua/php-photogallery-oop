<?php

class User
{

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    public static function find_all_users()
    {
        return self::find_this_query("SELECT * FROM users");
    }

    public static function find_user_by_id($user_id)
    {
        $the_result_array = self::find_this_query("SELECT * FROM users WHERE id= $user_id LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function use_this_query($sql)
    {
        global $database;

        return $database->query($sql);
    }

    public static function find_this_query($sql)
    {
        global $database;

        $result_set = $database->query($sql);
        $the_object_array = array();

        while ($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = self::instantiation($row);
        }

        return $the_object_array;
    }

    public static function verify_user($role)
    {
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";

        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function instantiation($the_record)
    {

        $the_object = new self;

//        $the_object->id           = $found_user['id'];
//        $the_object->username     = $found_user['username'];
//        $the_object->password     = $found_user['password'];
//        $the_object->first_name   = $found_user['first_name'];
//        $the_object->last_name    = $found_user['last_name'];

        foreach ($the_record as $the_attribute => $value) {
            if ($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }

        return $the_object;
    }

    private function has_the_attribute($the_attribute)
    {
        $object_properties = get_object_vars($this);

        return array_key_exists($the_attribute, $object_properties);
    }
}

?>
<!-- login form -->
<div class="col-md-4 col-md-offset-3">
    <h4 class="bg-danger"><?php echo $the_message; ?></h4>
    <form id="login-id" action="" method="post">

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" name="password" value="<?php echo htmlentities($password); ?>">
        </div>

        <div class="form-group">
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </div>
    </form>
</div>