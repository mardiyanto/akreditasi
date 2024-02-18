<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />    
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <link rel="icon" href="dk.png">
	<title>Dewan Upload With Progress bar</title>
	<link rel="stylesheet" href="../sys/bootstrap/bootstrap/css/bootstrap.min.css">
	<script src="../sys/bootstrap/plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<style>
        #progressBar {
            height: 25px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        #progressBar .progress-bar {
            height: 100%;
            transition: width 0.3s ease;
        }

        #status {
            margin-top: 10px;
        }

        #loaded_n_total {
            margin-top: 5px;
        }
    </style>
</head>
<body>
	<nav class="navbar navbar-dark bg-danger fixed-top">
	  <a class="navbar-brand text-white" href="index.php">
	    Dewan Komputer
	  </a>
	</nav>

	<h2 align="center" style="margin: 70px 10px 30px 10px;">Demo Upload File dengan Progress Bar Dewan Komputer</h2>
	<div class="row">
		<div class="col-sm-6 offset-sm-3">
			<form id="upload_form">
			<div class="form-group mb-5">
					<label>keterangan</label><br/>
					<input type="text" name="keterangan"   id="keterangan" class="form-control">
					<input type="hidden" name="id_buktidokumen"   id="id_buktidokumen" value="1" class="form-control">
				</div>
				<div class="form-group mb-5">
					<label>Pilih File</label><br/>
					<input type="file" name="file" id="file" class="form-control">
				</div>
				
				<div class="form-group mb-5">
				  	<input type="button" id="upload" value="Upload File" class="btn btn-success">
				</div>

			  	<progress id="progressBar" value="0" max="100" style="width:100%; display: none;"></progress>
				<h3 id="status"></h3>
				<p id="loaded_n_total"></p>
			</form>
		</div>
	</div>
	
	<div class="navbar bg-dark fixed-bottom">
		<div class="text-white">© <?php echo date('Y'); ?> Copyright:
		</div>
	</div>

	<script>
		function ambilId(file){
			return document.getElementById(file);
		}

		$(document).ready(function(){
			$("#upload").click(function(){
				ambilId("progressBar").style.display = "block";
				var file = ambilId("file").files[0];
				var keterangan = ambilId("keterangan").value; // Ambil nilai keterangan
				var id_buktidokumen = ambilId("id_buktidokumen").value; // Ambil nilai id_buktidokumen

				if (file!="") {
					var formdata = new FormData();
					formdata.append("file", file);
					formdata.append("keterangan", keterangan); // Tambahkan keterangan ke FormData
					formdata.append("id_buktidokumen", id_buktidokumen); // Tambahkan keterangan ke FormData
					var ajax = new XMLHttpRequest();
					ajax.upload.addEventListener("progress", progressHandler, false);
					ajax.addEventListener("load", completeHandler, false);
					ajax.addEventListener("error", errorHandler, false);
					ajax.addEventListener("abort", abortHandler, false);
					ajax.open("POST", "upload.php");
					ajax.send(formdata);
				}
			});
		});

		function progressHandler(event){
			ambilId("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
			var percent = (event.loaded / event.total) * 100;
			ambilId("progressBar").value = Math.round(percent);
			ambilId("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
		}
		function completeHandler(event){
			ambilId("status").innerHTML = event.target.responseText;
			ambilId("progressBar").value = 0;
		}
		function errorHandler(event){
			ambilId("status").innerHTML = "Upload Failed";
		}
		function abortHandler(event){
			ambilId("status").innerHTML = "Upload Aborted";
		}
	</script>
</body>
</html>