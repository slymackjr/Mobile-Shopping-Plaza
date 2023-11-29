<?php


class DBController
{
    // Database Connection Properties
    private string $host = 'localhost';
    private string $user = 'root';
    private string $password = '';
    private string $database = "shopping";

    // connection property
    public mysqli|null|false $con = null;

    // call constructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($this->con->connect_error){
            $errorMessage = "Database connection failed: " . $this->con->connect_error;
            $this->logError($errorMessage);
        }
    }

    public function __destruct()
    {
        $this->closeConnection();
    }

    // for mysqli closing connection
    protected function closeConnection(): void
    {
        if ($this->con != null ){
            $this->con->close();
            $this->con = null;
        }
    }

    protected function logError($errorMessage): void
    {
        if ($this->con) {
            $errorMessage = $this->con->real_escape_string($errorMessage); // Sanitize the error message
            $sql = "INSERT INTO error_logs (error_message) VALUES ('$errorMessage')";
            $this->con->query($sql);
        }
    }
}
