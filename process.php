<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    // Validasi file upload
    $file = $_FILES['file'];
    $fileError = $file['error'];
    $fileSize = $file['size'];
    $fileType = $file['type'];
    $allowedTypes = ['text/plain'];

    if ($fileError === 0 && $fileSize <= 100 * 1024 && in_array($fileType, $allowedTypes)) {
        // Baca isi file
        $fileContent = file_get_contents($file['tmp_name']);

        // Simpan data ke session
        $_SESSION['data'] = [
            'name' => $name,
            'email' => $email,
            'age' => $age,
            'gender' => $gender,
            'file_content' => htmlspecialchars($fileContent)
        ];

        // Redirect ke result.php
        header("Location: result.php");
        exit();
    } else {
        echo "File tidak valid. Harap unggah file teks (maksimal 100 KB).";
    }
} else {
    echo "Metode request tidak valid.";
}
?>