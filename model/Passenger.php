<?php
include_once 'helper/DbConnection.php';


class Passenger
{
    public $names = ['name1' => null, 'name2' => null, 'name3'=>null , 'name4' =>null ];


    public function insertPassengers($names)
    {
        $this->names = $names;


        $connection = new DbConnection();
        $conn = $connection->connection();

        $username = $_SESSION['username'];

        $sql = "SELECT id FROM user WHERE username=  '$username' ";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $user_id = $row['id'];
            }
        }

            $stmt = $conn->prepare("INSERT INTO passengers (name1, name2 , name3 , name4, user_id)
    VALUES (?,?,?,?,?)");
        $stmt->bind_param('sssss', $this->names['name1'], $this->names['name2'], $this->names['name3'],
            $this->names['name4'], $user_id );
        $stmt->execute();

    }


}