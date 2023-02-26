<?php
$pageurl = $_SERVER['HTTP_HOST'];
if ($_SERVER['REQUEST_SCHEME'] == 'http') {
    $protocol = "http://";
} elseif ($_SERVER['REQUEST_SCHEME'] == 'https') {
    $protocol = "https://";
}
try {
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'event_mistry');
    $exe = exec('SET NAMES "utf8mb4"');
} catch (Exception $e) {
    header("Location:" . $protocol . $pageurl . "/admin/500");
    die();
}

if ($db === false) {
    header("Location:" . $protocol . $pageurl . "/admin/500");
    exit;
}

date_default_timezone_set('Asia/Kolkata');
if (isset($_POST['set'])) {
    $code = mysqli_real_escape_string($db, $_POST['agent-code']);
    $query = "SELECT * FROM agents WHERE code='$code'";
    $result = mysqli_query($db, $query);

    if (mysqli_num_rows($result) > 0) {
        foreach ($result as $row) {
            $id = $row['id'];
            $un1 = $row['name'];
            if ($row['status'] == 1) {
                $msg = 1;
            } else {
                $admin_status = $row['status'];
                $msg = 1;
            }
        }

        $_SESSION['msg'] = $msg;
        $_SESSION['name'] = $un1;

        function getIPAddress()
        {
            //whether ip is from the share internet  
            if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }
            //whether ip is from the proxy  
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }
            //whether ip is from the remote address  
            else {
                $ip = $_SERVER['REMOTE_ADDR'];
            }
            return $ip;
        }
        $ip = getIPAddress();
        $time = date('d/m/Y h:i:s', time());
        if ($msg) {
            $query2 = "UPDATE `agents` SET `status`=1,`login_time`= '$time',`ip`='$ip' WHERE id='$id'";
            $result2 = mysqli_query($db, $query2);
            if ($result2) {
                header('Location:.');
            } else {
                header('Location:.');
            }
        } else {
            header('Location:.');
        }
    } else {
        $_SESSION['msg'] = 2;
        header('Location:.');
    }
}
