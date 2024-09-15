<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];
    $phone = $_POST['phone'];

    if (isset($_FILES['profile-picture']) && $_FILES['profile-picture']['error'] == 0) {
        $fileTmpPath = $_FILES['profile-picture']['tmp_name'];
        $fileName = $_FILES['profile-picture']['name'];
        $uploadDir = 'uploads/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $uploadFilePath = $uploadDir . basename($fileName);

        if (move_uploaded_file($fileTmpPath, $uploadFilePath)) {
            echo "Məlumat uğurla saxlanıldı!";
        } else {
            echo "Şəkil yüklənə bilmədi.";
        }
    } else {
        echo "Şəkil yükləmədə problem yarandı.";
    }
}
