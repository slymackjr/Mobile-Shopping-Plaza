<?php
require_once ('functions.php');


echo $contact->getMessageCount();
?>

<?php
if ($contact->getMessageCount()>0) {
    foreach ($contact->getThreeMessagesArrayOnly() as $result):
        ?>
        <li class="message-item">
            <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                    <h4><?php echo htmlentities($result['FullName']);?></h4>
                    <p><?php echo htmlentities($result['Message']);?></p>
                    <p><?php echo htmlentities($result['PostingDate']);?></p>
                </div>
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
    <?php
    endforeach;
    echo <<<_END
 <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>
_END;
}

