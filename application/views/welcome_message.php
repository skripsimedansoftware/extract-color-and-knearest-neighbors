<!doctype html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="Cek Kematangan Buah Alpukat">
	<meta name="author" content="G3MB3L INT3RN3T <gembelinternet404@gmail.com>">

	<title>Skripsi - Cek Kematangan Buah Alpukat</title>

	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url('assets/bootstrap-3.4.1/css/bootstrap.min.css') ?>" rel="stylesheet">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style type="text/css">
	/* Space out content a bit */
	body {
		padding-top: 20px;
		padding-bottom: 20px;
	}

	/* Everything but the jumbotron gets side spacing for mobile first views */
	.header,
	.marketing,
	.footer {
		padding-right: 15px;
		padding-left: 15px;
	}

	/* Custom page header */
	.header {
		padding-bottom: 20px;
		border-bottom: 1px solid #e5e5e5;
	}

	.header h3 {
		margin-top: 0;
		margin-bottom: 0;
		line-height: 40px; /* Make the masthead heading the same height as the navigation */
	}

	/* Custom page footer */
	.footer {
		padding-top: 19px;
		color: #777;
		border-top: 1px solid #e5e5e5;
	}

	/* Customize container */
	@media (min-width: 768px) {
		.container {
			max-width: 730px;
		}
	}
	.container-narrow > hr {
		margin: 30px 0;
	}

	/* Main marketing message and sign up button */
	.jumbotron {
		text-align: center;
		border-bottom: 1px solid #e5e5e5;
		margin-bottom: -40px;
	}

	.jumbotron .btn {
		/*padding: 14px 24px;*/
		font-size: 21px;
	}

	/* Supporting marketing content */
	.marketing {
		margin: 40px 0;
	}

	.marketing p + h4 {
		margin-top: 28px;
	}

	/* Responsive: Portrait tablets and up */
	@media screen and (min-width: 768px) {
		/* Remove the padding we set earlier */
		.header,.marketing,
		.footer {
			padding-right: 0;
			padding-left: 0;
		}

		.header {
			margin-bottom: 30px;
		}

		.jumbotron {
			border-bottom: 0;
		}
	}

	.palette {
		background-color: red;
		min-height: 40px;
		min-width: 6%;
		max-height: 40px;
		max-width: 6%;
		line-height: 35px;
		display: flex;
		justify-content: center;
		border: 1px solid black;
		float: left;
		margin-left: 1.5px;
		margin-top: 1.8px;
	}

	video {
		/*margin-top: -80px;*/
		/*margin-bottom: -32px;*/
		position: relative;
		z-index: 0;
	}

	#element-with-background-image {
		position: relative;
		/*background-image: url("//spin.atomicobject.com/wp-content/uploads/20170324102432/portfolio-tips-feature-image.jpg");*/
	}

	#color-overlay {
		/*border: 2px solid red;*/
		position: absolute;
		top: -10px;
		left: 0;
		width: 100%;
		height: 100%;
		background: rgba(0, 0, 0, 0);
		opacity: 0.6;
		z-index: 1000;
		content: '';
		/*height: 510px;*/
		/*width: 610px;*/
		display: block;
		margin-left: auto;
		margin-right:auto;
		box-sizing:border-box;
		display: video;
	}

	.close-camera {
		position: relative;
		margin-top: 2%;
		bottom: 0;
		margin-left: auto;
		margin-right: auto;
	}
	</style>
</head>

<body>
	<div class="container">
		<div class="header clearfix">
			<nav>
				<ul class="nav nav-pills pull-right">
					<li class="<?php echo $this->router->fetch_method() == 'index'?'active':'' ?>"><a href="<?php echo base_url('welcome/index') ?>">Beranda</a></li>
					<li class="<?php echo $this->router->fetch_method() == 'login'?'active':'' ?>"><a href="<?php echo base_url('admin') ?>">Masuk</a></li>
				</ul>
			</nav>
			<h3 class="text-muted">Skripsi</h3>
		</div>
		<div class="row">
			<div class="jumbotron"></div>
			<div class="col-lg-12" style="margin-top: 4%;" id="palettes"></div>
			<!-- <div class="row">
				<div class="col-lg-12" id="table-info">
					<table class="table table-responsive table-hover">
						<thead>
							<th>Label</th>
							<th>Deskripsi</th>
							<th>Jumlah Data Gambar</th>
							<th>Jumlah Data Warna</th>
							<th>Keakuratan</th>
						</thead>
						<tbody id="confidences-list"></tbody>
					</table>
				</div>
			</div> -->
			<div class="col-lg-6" style="z-index: 0;margin-top: 0%;">
				<img id="image" class="img-responsive" style="visibility: hidden;">
			</div>
			<div class="col-lg-6" style="z-index: 0;margin-top: 0%;">
				<canvas id="canvas" class="img-responsive" style="visibility: hidden;"></canvas>
			</div>
		</div>
		<footer class="footer">
			<p>&copy; <?php echo date('Y') ?> Universitas Islam Negeri Sumatera Utara, Medan, Sumatera Utara.</p>
		</footer>
	</div>
</body>
<?php 
$host = 'http://localhost:20211';
// $host = 'https://ml5-server.uinsu.my.id';
?>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/JQuery/jquery-3.6.0.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/plugins/ColorThief/color-thief.js') ?>"></script>
<script type="text/javascript" src="<?php echo $host ?>/socket.io/socket.io.min.js"></script>
<!-- ML5.js -->
<!-- <script src="<?php echo base_url('assets/plugins/') ?>ML5.js/ml5.min.js"></script> -->
<script type="text/javascript">
window.socket = io('<?php echo $host ?>',{ transports: ['websocket', 'polling'] });
window.all_data = [];
(function() {
	$.ajax({
		url: '<?php echo base_url('admin/all_data') ?>',
		type: 'GET',
		dataType: 'JSON',
		success: function(data) {
			$.each(data, function(index, val) {
				all_data.push(val);
			});
		},
		error: function(error) {
			console.log(error);
		}
	});
})();

socket.on('connect', function() {
	socket.emit('join_client');
});

socket.on('loaded', () => {
	console.log('loaded');
});

socket.on('debug', data => {
	console.log(data);
});

socket.on('checked', result => {
	if (result.confidencesByLabel !== undefined) {
		console.log(result)
		const confidences = result.confidencesByLabel;
		Object.keys(confidences).forEach((label, key) => {
			var td_id = label.split(' ').join('-');
			$('td[id="'+td_id+'"]').text(confidences[label]+'%');
		});

		Object.keys(confidences).forEach((label, key) => {
			var td_id = label.split(' ').join('-');
			var text = confidences[label]?confidences[label]*100:0;
			$('td[id="'+td_id+'"]').text(text+'%');
		});

		if (result.label) {
			$('#result-label').text(result.label);
			var td_id = result.label.split(' ').join('-');
			$('td[id="'+td_id+'"]').text(confidences[result.label] * 100)+'%';
		}
	}
});

$(document).ready(function() {
	$.ajax({
		url: '<?php echo base_url(); ?>admin/all_data',
		type: 'GET',
		dataType: 'JSON',
		success: function(data) {
			socket.on('checked_colors', result => {
				console.log(result)
				var find_result = find_value(data, 'id', parseInt(result.id));
				$('#result-label').text(data[find_result].name);
				$('#result-description').text(data[find_result].description+' '+result.percent+'%');
			});
			// $.each(data, function(index, val) {
			// 	var td_id = val.name.split(' ').join('-');
			// 	$('#confidences-list').append('<tr>'+
			// 		'<td>'+val.name+'</td>'+
			// 		'<td>'+val.description+'</td>'+
			// 		'<td>'+val.images.length+'</td>'+
			// 		'<td>'+(val.images.length*16)+'</td>'+
			// 		'<td id="'+td_id+'">0</td>'+
			// 	'</tr>');
			// });
		},
		error: function(error) {

		}
	});
});

var button_element = {
	button_open_camera: {
		rear: '<a class="btn open-camera btn-lg btn-success" camera-type="rear" href="#" role="button">Buka Kamera Belakang</a>',
		front: '<a class="btn open-camera btn-lg btn-success" camera-type="front" href="#" role="button">Buka Kamera Depan</a>',
		default: '<a class="btn open-camera btn-lg btn-success" camera-type="front" href="#" role="button">Buka Kamera Komputer/Laptop</a>'
	},
	open_capture: {
		rear: '<a class="btn open-capture btn-lg btn-success" camera-type="rear" href="#" role="button">Buka Kamera Belakang</a>',
		front: '<a class="btn open-capture btn-lg btn-success" camera-type="front" href="#" role="button">Buka Kamera Belakang</a>',
		default: '<a class="btn open-capture btn-lg btn-success" camera-type="front" href="#" role="button">Ambil Gambar</a>'
	},
	addons_button: {
		take_picture: '<br><a class="btn take-picture btn-lg btn-success" count-dount="0" camera-type="rear" href="#" role="button">Ambil Gambar</a> <a class="btn take-picture btn-lg btn-success" count-dount="1" camera-type="rear" href="#" role="button">Hitung Mundur</a><br>'
	},
	button_stop_camera: '<a class="btn close-camera btn-sm btn-success" href="#" role="button">Tutup Kamera</a>'
}
if (!Object.prototype.watch) {
	Object.defineProperty(Object.prototype,"watch", {
		enumerable: false,
		configurable: true,
		writable: false,
		value: function (prop, handler) {
			var old = this[prop];
			var cur = old;
			var getter = function () {
				return cur;
			};
			var setter = function (val) {
				old = cur;
				cur =
				handler.call(this,prop,old,val);
				return cur;
			};

			if (delete this[prop]) {
				Object.defineProperty(this,prop,{
					get: getter,
					set: setter,
					enumerable: true,
					configurable: true
				});
			}
		}
	});
}

draw_html();

var find_value = (arrayName, searchKey, searchValue) => {
	let find = arrayName.findIndex(i => i[searchKey] == searchValue);
	return (find !== -1)?find:false;
}

// window.knnready = false;

// window.knnClassifier = ml5.KNNClassifier();
// window.featureExtractor = ml5.featureExtractor('MobileNet', readyToUse);

// function readyToUse() {
// 	draw_html();
// 	window.knnready = true;
// 	$.ajax({
// 		url: '<?php echo base_url('admin/try') ?>',
// 		type: 'GET',
// 		dataType: 'JSON',
// 		success: function(data) {
// 			$.each(data, function(index, val) {
// 				var temp_image = new Image();
// 				temp_image.src = '<?php echo base_url('uploads/'); ?>'+val.image;

// 				temp_image.onload = function() {
// 					var img = new Image(this.width, this.height);
// 					img.onload = function() {
// 						console.log(window.knnClassifier.addExample(featureExtractor.infer(img), val.title));
// 					}
// 					img.src = '<?php echo base_url('uploads/'); ?>'+val.image;
// 				}
// 			});
// 		},
// 		error: function(error) {

// 		}
// 	});
// }

function drawCanvas(canvas, img) {
	canvas.width = getComputedStyle(canvas).width.split('px')[0];
	canvas.height = getComputedStyle(canvas).height.split('px')[0];
	let ratio  = Math.min(canvas.width / img.width, canvas.height / img.height);
	let x = (canvas.width - img.width * ratio) / 2;
	let y = (canvas.height - img.height * ratio) / 2;
	canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height);
	canvas.getContext('2d').drawImage(img, 0, 0, img.width, img.height, x, y, img.width * ratio, img.height * ratio);
}

if (!('mediaDevices' in navigator)) {
	navigator.mediaDevices = {}
}

if (!('getUserMedia' in navigator.mediaDevices)) {
	navigator.mediaDevices.getUserMedia = function(constraints) {
		var getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

		if (!getUserMedia) {
			return new Promise.reject(new Error('can get user media'));
		}

		return new Promise((resolve, reject) => {
			getUserMedia.call(navigator, constraints, resolve, reject);
		});
	}
}

function draw_html() {
	var isMobile = false; //initiate as false
	// device detection
	if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 
	|| /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) { 
		isMobile = true;
	}

	$('.jumbotron').empty();
	var html_element = '';
	html_element += '<h1>Cek Kematangan Buah Alpukat</h1>';
	html_element += '<p class="lead">Dengan mengizinkan browser mengakses kamera anda maka sistem pengecekkan buah alpukat siap untuk anda gunakan</p>';

	if (isMobile) {
		html_element += '<p>'+button_element.button_open_camera.rear+'</p>';
		html_element += '<p>'+button_element.button_open_camera.front+'</p>';
		html_element += '<p>'+button_element.open_capture.rear+'</p>';
		html_element += '<p>'+button_element.open_capture.front+'</p>';
	} else {
		html_element += '<p>'+button_element.button_open_camera.default+'</p>';
		html_element += '<p>'+button_element.open_capture.default+'</p>';
	}

	$('.jumbotron').html(html_element);
}

$(document).on('click', '.open-camera', function(event) {
	event.preventDefault();
	$('.jumbotron').empty();
	$('.jumbotron').append('<div id="element-with-background-image"><div align="center" class="embed-responsive embed-responsive-16by9"><video id="video" autoplay loop class="embed-responsive-item"></video></div><div id="color-overlay"></div></div>');

	var camera_type = $(this).attr('camera-type');
	if (camera_type == 'front') {
		openCamera('user');
	} else {
		openCamera('environment');
	}
	var video = document.getElementById('video');
	$('.jumbotron').prepend('<h3 style="margin-top:-4%" id="result-label">KONDISI ALPUKAT</h3><span style="margin-top:-80%;font-size:20px;" id="result-description"></span>');

	function openCamera(type) {
		navigator.mediaDevices.getUserMedia({ video: { facingMode: type }, audio: false }).then(stream => {
			if ('srcObject' in video) {
				video.srcObject = stream;
			} else {
				video.src = window.URL.createObjectURL(stream);
			}

			var mediaStreamTrack = stream.getVideoTracks()[0];
			var imageCapture = new ImageCapture(mediaStreamTrack);

			$('.jumbotron').append(button_element.button_stop_camera).css('z-index', 1000);

			var capture_color = setInterval(function() {
				imageCapture.grabFrame().then(imageBitmap => {
					const canvas = document.getElementById('canvas');
					canvas.width = imageBitmap.width;
					canvas.height = imageBitmap.height;
					drawCanvas(canvas, imageBitmap);

					const image = document.getElementById('image');
					image.src = canvas.toDataURL();

					image.addEventListener('load', function() {
						// socket.emit('image', {image : canvas.toDataURL(), socket_id: socket.id});
						var colorThief = new ColorThief();
						var colorArray = colorThief.getPalette(image, 16);

						socket.emit('check_colors', colorArray);

						// if (knnready) {
						// 	const features = featureExtractor.infer(image);
						// 	// Use KNN Classifier to classify these features
						// 	knnClassifier.classify(features, (err, result) => {
						// 		$('#result-label').text(result.label);
						// 	});
						// }

						// socket.on('checked', function(data) {
						// 	if (data !== null) {
						// 		console.log(data);
						// 	}
						// 	// var find = find_value(all_data, 'id', parseInt(data.label));
						// 	// if (find !== false) {
						// 	// 	$('#result-label').text(all_data[find].name+' '+all_data[find].description);
						// 	// }
						// })

						$('#palettes').empty();
						colorArray.forEach((el, index) => {
							$('#palettes').append('<div class="col-lg-1 palette" style="background-color: rgb('+el[0]+', '+el[1]+', '+el[2]+'); height: 200px; width: 200px; float:left;"></div>');
						});
					});
				}).catch(console.log)
			}, 1000);

			$(document).on('click', '.close-camera', function(event) {
				event.preventDefault();
				stream.getTracks().forEach(function(track) {
					track.stop();
					clearInterval(capture_color);
					draw_html();
					$('#palettes').empty();
				});
			});

			video.onloadedmetadata = function(e) {
				video.play();
			}
		}, console.log)
	}
});

$(document).on('click', '.open-capture', function(event) {
	event.preventDefault();
	$('.jumbotron').empty();
	$('.jumbotron').append('<div id="element-with-background-image"><div align="center" class="embed-responsive embed-responsive-16by9"><video id="video" autoplay loop class="embed-responsive-item"></video></div><div id="color-overlay"></div></div>');

	var camera_type = $(this).attr('camera-type');
	if (camera_type == 'front') {
		openCamera('user');
	} else {
		openCamera('environment');
	}
	var video = document.getElementById('video');
	$('.jumbotron').prepend('<h3 style="margin-top:-4%" id="result-label">KONDISI ALPUKAT</h3><span style="margin-top:-80%;font-size:20px;" id="result-description"></span>');

	function openCamera(type) {
		navigator.mediaDevices.getUserMedia({ video: { facingMode: type }, audio: false }).then(stream => {
			if ('srcObject' in video) {
				video.srcObject = stream;
			} else {
				video.src = window.URL.createObjectURL(stream);
			}

			$('.jumbotron').append(button_element.addons_button.take_picture).css('z-index', 1000);
			$('.jumbotron').append(button_element.button_stop_camera).css('z-index', 1000);



			$(document).on('click', '.take-picture', async function(e) {
				e.preventDefault();
				if (video.paused) {
					video.play();
				}
				function take() {
					var mediaStreamTrack = stream.getVideoTracks()[0];
					var imageCapture = new ImageCapture(mediaStreamTrack);
					imageCapture.grabFrame().then(imageBitmap => {
						const canvas = document.getElementById('canvas');
						canvas.width = imageBitmap.width;
						canvas.height = imageBitmap.height;
						drawCanvas(canvas, imageBitmap);

						const image = document.getElementById('image');
						image.src = canvas.toDataURL();

						image.addEventListener('load', function() {
							// socket.emit('image', {image : canvas.toDataURL(), socket_id: socket.id});
							var colorThief = new ColorThief();
							var colorArray = colorThief.getPalette(image, 16);
							socket.emit('check_colors', colorArray);
							$('#palettes').empty();
							colorArray.forEach((el, index) => {
								$('#palettes').append('<div class="col-lg-1 palette" style="background-color: rgb('+el[0]+', '+el[1]+', '+el[2]+'); height: 200px; width: 200px; float:left;"></div>');
							});
						});
					}).catch(console.log)
				}

				var sleep = function(ms) {
					return new Promise(resolve => setTimeout(resolve, ms));
				}

				var count_dount = parseInt($(this).attr('count-dount'));
				if (count_dount == 1) {
					console.log( $('.jumbotron').children('h3').length)
					if ($('.jumbotron').children('h3').length < 2) {
						$('.jumbotron').append('<h3 id="sleep">5</h3>').css('z-index', 1000);
					} else {
						$('#sleep').text(5);
					}

					for (i = 0; i < 5; i++) {
						$('#sleep').text(parseInt($('#sleep').text()-1));
						await sleep(1000);
					}

					take();
					video.pause();
				} else {
					take();
					video.pause();
				}
			});

			$(document).on('click', '.close-camera', function(event) {
				event.preventDefault();
				stream.getTracks().forEach(function(track) {
					track.stop();
					// clearInterval(capture_color);
					draw_html();
					$('#palettes').empty();
				});
			});

			// video.onloadedmetadata = function(e) {
			// 	video.play();
			// }
		}, console.log)
	}
});
</script>
</html>
