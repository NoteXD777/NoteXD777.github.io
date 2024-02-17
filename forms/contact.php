<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan data dari formulir
    $name = $_POST["name"];
    $comment = $_POST["komentar"];

    // Membaca file JSON yang sudah ada atau membuat file baru jika belum ada
    $file_path = "assets/JSON/comments.json";
    $comments = file_exists($file_path) ? json_decode(file_get_contents($file_path), true) : [];

    // Menambahkan komentar baru ke dalam array
    $new_comment = [
        "name" => $name,
        "comment" => $comment,
        "timestamp" => date("Y-m-d H:i:s")
    ];

    $comments[] = $new_comment;

    // Menyimpan array komentar kembali ke file JSON
    file_put_contents($file_path, json_encode($comments, JSON_PRETTY_PRINT));

    // Tampilkan pesan sukses
    echo "Komentar terkirim. Terima kasih!";
} else {
    // Jika bukan metode POST, mungkin akan ada tindakan lain yang perlu dilakukan
    echo "Akses tidak valid.";
}

?>
