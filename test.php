<?php

// Ini adalah jalur lengkap ke file SkillController.php
// __DIR__ akan merujuk ke direktori tempat 'test.php' ini berada (C:\laragon\www\Porto-Az\)
$filePath = __DIR__ . '/app/Http/Controllers/Admin/SkillController.php';

// Tampilkan jalur file yang sedang kita periksa
echo "<h1>Checking file:</h1>";
echo "<p><code>" . htmlspecialchars($filePath) . "</code></p><br>"; // htmlspecialchars untuk menampilkan path dengan aman

// Periksa apakah file ada di jalur tersebut
if (file_exists($filePath)) {
    echo "<h2 style='color: green;'>Status: File exists at the specified path.</h2><br>";

    // Jika file ada, coba baca isinya
    $fileContents = file_get_contents($filePath);

    // Tampilkan 200 karakter pertama dari isi file
    echo "<h2>File contents (first 200 chars):</h2>";
    echo "<pre style='background-color: #eee; padding: 10px; border: 1px solid #ddd;'>";
    echo nl2br(htmlspecialchars(substr($fileContents, 0, 200))); // nl2br untuk baris baru, htmlspecialchars untuk menampilkan kode
    echo "</pre>";
    echo "<br><p>Ini berarti PHP dapat menemukan dan membaca file Controller.</p>";

} else {
    echo "<h2 style='color: red;'>Status: Error - SkillController.php NOT found at the specified path.</h2><br>";
    echo "<p><strong>Penyebab:</strong></p>";
    echo "<p>1. Nama file 'SkillController.php' mungkin tidak persis sama (perhatikan huruf besar/kecil).</p>";
    echo "<p>2. Jalur folder 'app/Http/Controllers/Admin/' mungkin salah atau ada typo.</p>";
    echo "<p>3. Ada masalah izin file (permissions) yang mencegah PHP melihat file tersebut.</p>";
    echo "<p>4. File tersebut benar-benar tidak ada di lokasi yang ditunjukkan.</p>";
}
?>