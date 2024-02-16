<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Div-based Table with CSS</title>
  <style>
    /* Style untuk tabel div */
    .tablediv {
      display: table;
      width: 100%;
    }
    .tablediv-row {
      display: table-row;
    }
    .tablediv-header {
      display: table-header-group;
      font-weight: bold;
    }
    .tablediv-cell {
      display: table-cell;
      padding: 8px;
      border: 1px solid #ccc;
    }
  </style>
</head>
<body>
  <div class="tablediv">
    <div class="tablediv-row tablediv-header">
      <div class="tablediv-cell">ID</div>
      <div class="tablediv-cell">Nama Dokumen</div>
      <div class="tablediv-cell">Keterangan</div>
    </div>
    <div class="tablediv-row">
      <div class="tablediv-cell">1</div>
      <div class="tablediv-cell">File1.pdf</div>
      <div class="tablediv-cell">Deskripsi file 1</div>
    </div>
    <div class="tablediv-row">
      <div class="tablediv-cell">2</div>
      <div class="tablediv-cell">File2.docx</div>
      <div class="tablediv-cell">Deskripsi file 2</div>
    </div>
    <!-- Menambahkan baris data lainnya -->
  </div>
</body>
</html>
