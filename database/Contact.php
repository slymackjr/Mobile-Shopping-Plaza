<?php
include_once 'Shopping.php';
class Contact extends Shopping
{
    // fetching admin email where mail will send from tbl_email where there is only one row data.
    private function getAllAdminEmail() : array
    {
        $result = $this->db->con->query("SELECT * FROM tbl_email");

        $resultArray = array();

        //fetch product data one by one
        while ($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
            $resultArray[] = $item;
        }
        return $resultArray;
    }

    //insert into product reviews table
    private function insertContactQuery($params = null)
    {
        if ($this->db->con != null){
            if ($params != null){
                // "Insert into product_reviews values (0)"
                // get table columns
                $columns = implode(',', array_keys($params));

                $values = implode(',', array_values($params));

                //create sql query
                $query_string = sprintf("INSERT INTO %s(%s) VALUES(%s)", "tbl_contact_data",$columns,$values);
                // execute query
                return $this->db->con->query($query_string);
            }
        }
    }

    // get params and insert into product_reviews table
    public function insertIntoTblContact($name,$phone,$email,$subject,$message,$uip,$is_read): bool
    {
        $name = $this->sanitizeString($name);
        $phone = $this->sanitizeString($phone);
        $email = $this->sanitizeString($email);
        $subject = $this->sanitizeString($subject);
        $message = $this->sanitizeString($message);
        $uip = $this->sanitizeString($uip);
        $is_read = $this->sanitizeString($is_read);
        $success = false;
        if (!empty($name) && !empty($phone) && !empty($email) && !empty($subject) && !empty($message) && !empty($uip) && !empty($is_read)){
            $params = array(
                "FullName" => $name,
                "phoneNumber" => $phone,
                "emailId" => $email,
                "subject" => $subject,
                "message" => $message,
                "UserIp" => $uip,
                "Is_Read" => $is_read
            );

            // insert params into product_reviews
            $result = $this->insertContactQuery($params);

            if ($result){
                $success = true;
                // reload page
                header("Location:".$_SERVER['PHP_SELF']);
            }
        }
        return $success;
    }

    // method for getting admin email from tbl_email, one row data present only.
    public function getAdminEmail() : string
    {
        $admin = null;
        foreach ($this->getAllAdminEmail() as $email):
            $admin = $email['emailId'];
        endforeach;
        return $admin;
    }

    public function getMessageCount(): int|string
    {
        $is_read = 1;
        $sql = "SELECT id FROM tbl_contact_data WHERE Is_Read != ?";
        $query = $this->db->con->prepare($sql);
        $query->bind_param('i', $is_read); // Bind the parameter
        $query->execute();
        $result = $query->get_result(); // Get the result set
        return $result->num_rows; // Use num_rows to get the row count
    }


    public function getThreeMessagesArrayOnly(): array
    {
        $is_read = 1;
        $sql = "SELECT FullName, PostingDate, Message FROM tbl_contact_data WHERE Is_Read != ? LIMIT 3";
        $query = $this->db->con->prepare($sql);
        $query->bind_param('i', $is_read); // Bind the parameter as an integer
        $query->execute();
        $result = $query->get_result();

        $messages = [];

        while ($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }

        return $messages;
    }

    public function todayCountMessages(): int|string
    {
        $sql = "SELECT id FROM tbl_contact_data WHERE DATE(PostingDate) = CURDATE()";
        $query = $this->db->con-> prepare($sql);
        $query->execute();
        $results = $query->get_result();

// Check if the query was executed successfully
        if ($results) {
            $todayCount = $results->num_rows;
        } else {
            $todayCount = 0; // Handle the case where the query failed
        }
        return $todayCount;
    }

    public function last7DaysContacts(): int|string
    {
        $sql = "SELECT id from tbl_contact_data where date(PostingDate)>= DATE(NOW()) - INTERVAL 7 DAY";
        $query = $this->db->con-> prepare($sql);
        $query->execute();
        $results = $query->get_result();

        // Check if the query was executed successfully
        if ($results) {
            $last7DaysContacts = $results->num_rows;
        } else {
            $last7DaysContacts = 0; // Handle the case where the query failed
        }
        return $last7DaysContacts;
    }

    public function totalAllContacts(): int|string
    {
        $sql = "SELECT id from tbl_contact_data";
        $query = $this->db->con-> prepare($sql);
        $query->execute();
        $results = $query->get_result();

        // Check if the query was executed successfully
        if ($results) {
            $allContacts = $results->num_rows;
        } else {
            $allContacts = 0; // Handle the case where the query failed
        }
        return $allContacts;
    }

    public function getTodayContactData(): array
    {
        $sql = "SELECT FullName,PhoneNumber,PostingDate,id,Is_Read from tbl_contact_data where date(PostingDate)=CURDATE()";
        $query = $this->db->con-> prepare($sql);
        $query->execute();
        $results = $query->get_result();
        $today = [];

        if ($results) {
            while ($row = $results->fetch_assoc()) {
                $today[] = $row;
            }
        }
        return $today;
    }

    public function getLast7DaysContactData(): array
    {
        $sql = "SELECT FullName,PhoneNumber,PostingDate,id,Is_Read from tbl_contact_data where date(PostingDate)>= DATE(NOW()) - INTERVAL 7 DAY";
        $query = $this->db->con-> prepare($sql);
        $query->execute();
        $results = $query->get_result();
        $Last7Days = [];

        if ($results) {
            while ($row = $results->fetch_assoc()) {
                $Last7Days[] = $row;
            }
        }
        return $Last7Days;
    }

    public function getAllContactData(): array
    {
        $sql ="SELECT FullName,PhoneNumber,PostingDate,id,Is_Read from tbl_contact_data";
        $query = $this->db->con-> prepare($sql);
        $query->execute();
        $results = $query->get_result();

        $allData = [];

        if ($results) {
            while ($row = $results->fetch_assoc()) {
                $allData[] = $row;
            }
        }
        return $allData;
    }

    public function updateReadStatus($messageId): bool
    {
        $message = false;
        // for updating read status of contact form
        if(isset($messageId))
        {
            $is_read=1;
            $sql=" update  tbl_contact_data set Is_Read=? where id=?";
            $query = $this->db->con-> prepare($sql);
            $query->bind_param('ii', $is_read, $messageId); // Bind both parameters in a single call
            $results = $query->execute();
            if($results)
            {
                $message =  true;
            }
        }
        return $message;
    }

    public function adminRemarkInsertion($messageId,$remark): string
    {
            $sql="INSERT INTO tbl_admin_remarks(contactFormId,adminRemark) VALUES(?,?)";
            $query = $this->db->con-> prepare($sql);
            // Bind both parameters in a single bind_param call
            $query->bind_param('is', $messageId, $remark);
            $results = $query->execute();
            if($results)
            {
                $message =  "Details updated successfully.";
            } else {
                $message = "Something went wrong please try again.";
            }
        return $message;
    }

    public function getContactsInfo($messageId): array
    {
        $fid=intval($messageId);// Getting contact form id
        $sql = "SELECT tbl_contact_data.FullName,tbl_contact_data.PhoneNumber,tbl_contact_data.UserIp,
                tbl_contact_data.EmailId,tbl_contact_data.Subject,tbl_contact_data.Message,tbl_contact_data.PostingDate,
                tbl_contact_data.id from tbl_contact_data  where tbl_contact_data.id=?";
        $query = $this->db->con-> prepare($sql);
        $query-> bind_param('i', $fid);
        $query->execute();
        $results = $query->get_result();

        $contactInfo = [];

        if ($results) {
            while ($row = $results->fetch_assoc()) {
                $contactInfo[] = $row;
            }
        }
        return $contactInfo;
    }

    public function getAdminRemarks($contactFormId): array
    {
        $contactFormId = intval($contactFormId);
        $stmt = "SELECT tbl_admin_remarks.adminRemark,tbl_admin_remarks.remarkDate from  tbl_admin_remarks  where contactFormId=?";
        $query1 = $this->db->con-> prepare($stmt);
        $query1->bind_param('i', $contactFormId);
        $query1->execute();
        $results = $query1->get_result();

        $adminRemarks = [];

        if ($results) {
            while ($row = $results->fetch_assoc()) {
                $adminRemarks[] = $row;
            }
        }
        return $adminRemarks;
    }

    public function updateAdminEmailId($email): string
    {
        $msg = "";
        if(isset($_POST['update']))
        {
            $con="update tbl_email set emailId=?";
            $query = $this->db->con-> prepare($con);
            $query->bind_param('s',$email);
            $results = $query->execute();

            if ($results):
                $msg = "Email id successfully changed";
            else:
                $msg = "Email id failed to change";
            endif;

        }
        return $msg;
    }

    public function getAdminReceiveEmail(): array
    {
        $sql = "SELECT emailId from tbl_email";
        $query = $this->db->con->prepare($sql);
        $query->execute();
        $results = $query->get_result();

        $receiveEMail = [];

        if ($results) {
            while ($row = $results->fetch_assoc()) {
                $receiveEMail[] = $row;
            }
        }
        return $receiveEMail;
    }


}