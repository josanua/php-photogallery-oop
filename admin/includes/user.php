<?php

class User
{
    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;

    private const DB_TABLE = "users";

    public static function find_all_users()
    {
        return self::find_this_query("SELECT * FROM " . self::DB_TABLE);
    }

    public static function find_user_by_id($user_id)
    {
        $the_result_array = self::find_this_query("SELECT * FROM " . self::DB_TABLE . " WHERE id = $user_id LIMIT 1");

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

    public static function verify_user($username, $password)
    {
        global $database;

        $username = $database->escape_string($username);
        $password = $database->escape_string($password);

        $sql = "SELECT * FROM " . self::DB_TABLE . " WHERE username = '$username' and password = '$password' LIMIT 1";

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

    public function create()
    {
        global $database;

        $properties = $this->properties();

        $sql = "INSERT INTO " . self::DB_TABLE . "(" . implode(",", array_keys($properties)) . ")";
        $sql .= "VALUES ('" . implode("', '", array_values($properties)) . "')";

        if ($database->query($sql)) {
            $this->id = $database->insert_id();
            return true;
        } else {
            return false;
        }
    }

    protected function properties()
    {
        return get_object_vars($this);
    }

    public function save()
    {
        global $database;

        return isset($this->id) ? $this->update() : $this->create();
    }

    public function update()
    {
        global $database;

        $sql = "UPDATE " . self::DB_TABLE . " SET ";
        $sql .= "username = '" . $database->escape_string($this->username) . "', ";
        $sql .= "password = '" . $database->escape_string($this->password) . "', ";
        $sql .= "first_name = '" . $database->escape_string($this->first_name) . "', ";
        $sql .= "last_name = '" . $database->escape_string($this->last_name) . "' ";
        $sql .= " WHERE id = " . $database->escape_string($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    public function delete()
    {
        global $database;

        $sql = "DELETE FROM " . self::DB_TABLE . " WHERE id = " . $database->escape_string($this->id);
        $database->query($sql);

        return true;
    }
}