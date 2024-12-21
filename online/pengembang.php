<?php include 'header.php'; ?>

<style>
    /* Lazy Load Styles */
.card-image {
	display: block;
	min-height: 20rem; /* layout hack */
	background: #fff center center no-repeat;
	background-size: cover;
}

.card-image > img {
	display: block;
	width: 100%;
	opacity: 0; /* visually hide the img element */
}

.card-image.is-loaded {
	filter: none; /* remove the blur on fullres image */
	transition: filter 1s;
}

/* Layout Styles */
html, body {
	width: 100%;
	height: 100%;
	margin: 0;
	font-size: 15px;
	font-family: sans-serif;
}

.card-list {
	display: block;
	margin: 1rem auto;
	padding: 0;
	font-size: 0;
	text-align: center;
	list-style: none;
}

.card {
	display: inline-block;
	width: 90%;
	max-width: 20rem;
	margin: 1rem;
	font-size: 1rem;
	text-decoration: none;
	overflow: hidden;
	box-shadow: 0 0 3rem -1rem rgba(0,0,0,0.5);
	transition: transform 0.1s ease-in-out, box-shadow 0.1s;
}

.card:hover {
	transform: translateY(-0.5rem) scale(1.0125);
	box-shadow: 0 0.5em 3rem -1rem rgba(0,0,0,0.5);
}

.card-description {
	display: block;
	padding: 1em 0.5em;
	color: #515151;
	text-decoration: none;
}

.card-description > h2 {
	margin: 0 0 0.5em;
}

.card-description > p {
	margin: 0;
}</style>

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="index.php">Pengembang</a></li>
		</ul>
	</div>
</div>

<ul class="card-list">
	
	<li class="card">
		<a class="card-image" target="_blank" style="background-image: url(foto/Hadi.jpeg);" data-image-full="foto/Hadi.jpeg">
			<img src="foto/Hadi.jpeg" alt="Psychopomp" />
		</a>
		<a class="card-description" target="_blank">
			<h2>Muh Nurhadi</h2>
			<p>20330006@student.janabadra.ac.id</p>
		</a>
	</li>
	<li class="card">
		<a class="card-image" target="_blank" style="background-image: url(foto/Riska.jpeg);" data-image-full="foto/Riska.jpeg">
			<img src="foto/Riska.jpeg" alt="Psychopomp" />
		</a>
		<a class="card-description" target="_blank">
			<h2>Riska Destiana</h2>
			<p>20330035@student.janabadra.ac.id</p>
		</a>
	</li>
	<li class="card">
		<a class="card-image" target="_blank" style="background-image: url(foto/Imron.jpg);" data-image-full="foto/Imron.jpg">
			<img src="foto/Imron.jpg" alt="Psychopomp" />
		</a>
		<a class="card-description" target="_blank">
			<h2>Imron Taufiq P J</h2>
			<p>20330055@student.janabadra.ac.id</p>
		</a>
	</li>
    

    <li class="card">
		<a class="card-image" target="_blank" style="background-image: url(foto/yur.jpeg);" data-image-full="foto/y.jpg">
			<img src="foto/y.jpg" alt="Psychopomp" />
		</a>
		<a class="card-description" target="_blank">
			<h2>Yumarlin MZ</h2>
			<p>Dosen</p>
		</a>
	</li>
	
</ul>


<?php include 'footer.php'; ?>