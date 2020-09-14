<?php
session_start();
$Username = $_SESSION['login_user'];
?>
<!-- -->

<!DOCTYPE html>
<html lang="en">

<head>
	

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, shrink-to-fit=no">
	<title>Recommendations</title>
	<meta name="description" content="Find books from Google Play Books">
	<link rel="icon" href="favicon.ico">
	<meta itemprop="name" content="Books">
	<meta itemprop="description" content="Find books from Google Play Books">
	<meta itemprop="image" content="icons/icon-192x192.png">
	<!-- See https://goo.gl/OOhYW5 -->
	 <link rel="manifest" href="manifest.json"> 
	<!-- See https://goo.gl/qRE0vM -->
	<meta name="theme-color" content="#ffffff">
	<!-- Add to homescreen for Chrome on Android. Fallback for manifest.json -->
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="application-name" content="Books">
	<!-- Add to homescreen for Safari on iOS -->
	
	<!-- Web Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:500,600,900&display=swap" rel="stylesheet">
	 <link rel="stylesheet" 
      href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" 
      integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" 
      crossorigin="anonymous">
	<!-- Scripts -->
	<link rel="stylesheet" href="index.css">
</head>

<body>
	<aside>
		<nav>
			<ul >
				<li class="subhead">DISCOVER</li>
				<li><a class="nav scrolltoview current" href="#search"><i class="fa fa-search" aria-hidden="true"></i>&nbsp Search</a></li>
				<li><a class="nav scrolltoview" href="home.php"><i class="fas fa-tachometer-alt"></i></i>&nbsp Home</a></li>
				<li><a class="nav scrolltoview" href="#foryou"><i class="fa fa-heartbeat" aria-hidden="true"></i>&nbsp Top Picks For you</a></li>
				<li class="subhead">LIBRARY</li>
				<li><a class="nav scrolltoview" href="#hab"><i class="fa fa-rocket" aria-hidden="true"></i>&nbsp Recommanded For You</a></li>
				<li><a class="nav scrolltoview" href="#fiction"><i class="fa fa-rocket" aria-hidden="true"></i>&nbsp Fiction</a></li>
				<li><a class="nav scrolltoview" href="#poetry"><i class="fas fa-scroll"></i>&nbsp Poetry</a></li>
				<li><a class="nav scrolltoview" href="#fantasy"><i class="fa fa-magic" aria-hidden="true"></i>&nbsp Fantasy</a></li>
				<li><a class="nav scrolltoview" href="#romance"><i class="far fa-grin-hearts"></i>&nbsp Romance</a></li>
				<li class="nav trigger"><i class="fas fa-angle-double-right"></i>&nbsp More</li>
			</ul>
		</nav>
		<div class="spacer"></div>
		<label class="theme-switch" for="checkbox" title="Night mode">
			<input type="checkbox" id="checkbox" aria-label="Night mode">
			<div class="slider round"></div>
		</label>
	</aside>
	<main id="main" class="main">
		<article>
			<section id="search" class="results">
				<div class="flex">
					<input style="visibility: hidden;" id="search-box" class="search-box" placeholder="Search books by name, author, genre and etc ..." aria-label="Search books">
				</div>
				<div class="list-book search">
					<div class="prompt">Enter a search term</div>
				</div>
			</section>
			<div id="foryou">
				<section class="results">
					<div class="list-book foryou">
						<a class="category" href="#love">
							<div class="book">
								<div class="book-info">
									<h1 class="section-title">Daily Top 100</h1>
								</div>
							</div>
						</a>
						<a class="category" href="#feminism">
							<div class="book">
								<div class="book-info">
									<h1 class="section-title">New releases</h1>
								</div>
							</div>
						</a>
						<a class="category" href="#inspirational">
							<div class="book">
								<div class="book-info">
									<h1 class="section-title">Bestsellers</h1>
								</div>
							</div>
						</a>
						<a class="category" href="#authors">
							<div class="book">
								<div class="book-info">
									<h1 class="section-title">Top authors</h1>
								</div>
							</div>
						</a>
					</div>
				</section>
				<section id="love" class="results">
					<div class="flex">
						<h1 class="section-title">Daily Top 100</h1>
						<div>
							<button id="love-prev" class="pagination prev" onclick="prev('love')">◀</button>
							<button id="love-next" class="pagination next" onclick="next('love')">▶</button>
						</div>
					</div>
					<div class="list-book love categories">
						<div class='prompt'>
							<div class="loader"></div>
						</div>
					</div>
					<div class="fade left"></div>
					<div class="fade right"></div>
				</section>
				<section id="feminism" class="results">
					<div class="flex">
						<h1 class="section-title">New releases</h1>
						<div>
							<button id="feminism-prev" class="pagination prev" onclick="prev('feminism')">◀</button>
							<button id="feminism-next" class="pagination next" onclick="next('feminism')">▶</button>
						</div>
					</div>
					<div class="list-book feminism categories">
						<div class='prompt'>
							<div class="loader"></div>
						</div>
					</div>
					<div class="fade left"></div>
					<div class="fade right"></div>
				</section>
				<section id="inspirational" class="results">
					<div class="flex">
						<h1 class="section-title">Bestsellers</h1>
						<div>
							<button id="inspirational-prev" class="pagination prev" onclick="prev('inspirational')">◀</button>
							<button id="inspirational-next" class="pagination next" onclick="next('inspirational')">▶</button>
						</div>
					</div>
					<div class="list-book inspirational categories">
						<div class='prompt'>
							<div class="loader"></div>
						</div>
					</div>
					<div class="fade left"></div>
					<div class="fade right"></div>
				</section>
				<section id="authors" class="results">
					<div class="flex">
						<h1 class="section-title">Top authors</h1>
						<div>
							<button id="authors-prev" class="pagination prev" onclick="prev('authors')">◀</button>
							<button id="authors-next" class="pagination next" onclick="next('authors')">▶</button>
						</div>
					</div>
					<div class="list-book authors categories">
						<div class='prompt'>
							<div class="loader"></div>
						</div>
					</div>
					<div class="fade left"></div>
					<div class="fade right"></div>
				</section>
			</div>

			


			<section id="fiction" class="results">
				<div class="flex">
					<h1 class="section-title">Fiction</h1>
					<div>
						<button id="fiction-prev" class="pagination prev" onclick="prev('fiction')">◀</button>
						<button id="fiction-next" class="pagination next" onclick="next('fiction')">▶</button>
					</div>
				</div>
				<div class="list-book fiction">
					<div class='prompt'>
						<div class="loader"></div>
					</div>
				</div>
			</section>
			<section id="poetry" class="results">
				<div class="flex">
					<h1 class="section-title">Poetry</h1>
					<div>
						<button id="poetry-prev" class="pagination prev" onclick="prev('poetry')">◀</button>
						<button id="poetry-next" class="pagination next" onclick="next('poetry')">▶</button>
					</div>
				</div>
				<div class="list-book poetry">
					<div class='prompt'>
						<div class="loader"></div>
					</div>
				</div>
			</section>
			<section id="fantasy" class="results">
				<div class="flex">
					<h1 class="section-title">Fantasy</h1>
					<div>
						<button id="fantasy-prev" class="pagination prev" onclick="prev('fantasy')">◀</button>
						<button id="fantasy-next" class="pagination next" onclick="next('fantasy')">▶</button>
					</div>
				</div>
				<div class="list-book fantasy">
					<div class='prompt'>
						<div class="loader"></div>
					</div>
				</div>
			</section>
			<section id="romance" class="results">
				<div class="flex">
					<h1 class="section-title">Romance</h1>
					<div>
						<button id="romance-prev" class="pagination prev" onclick="prev('romance')">◀</button>
						<button id="romance-next" class="pagination next" onclick="next('romance')">▶</button>
					</div>
				</div>
				<div class="list-book romance">
					<div class='prompt'>
						<div class="loader"></div>
					</div>
				</div>
			</section>
			<!---footer-->


		</article>
		<div class="modal">
			<span class="close-button">✖</span>
			<div class="modal-content">
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Adult</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Anthologies</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Art</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Audiobooks</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Biographies</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Body</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Business</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Children</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Comics</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Contemporary</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Cooking</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Crime</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Engineering</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Entertainment</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Fantasy</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Fiction</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Food</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>General</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Health</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>History</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Horror</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Investing</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Literary</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Literature</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Manga</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Media-help</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Memoirs</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Mind</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Mystery</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Nonfiction</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Religion</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Religion</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Romance</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Science</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Self</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Spirituality</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Sports</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Superheroes</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Technology</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Thrillers</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Travel</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Women</h3>
				<h3 class='book-authors' onclick='updateFilter(this,"subject");toggleModal();'>Young</h3>
			</div>
		</div>
	</main>
	<!-- <script src="index.js"></script> -->
</body>
<script type="text/javascript">
	
let bookContainer = document.querySelector('.search')
let searchBooks = document.getElementById('search-box')
//console.log(bookContainer);
// all genre & search fetching (main)
const getBooks = async book => {
	//console.log(book)
	const response = await fetch(`https://www.googleapis.com/books/v1/volumes?q=${book}`)
	const data = await response.json()
	return data
}
const bala = async book => {
	console.log("zz"+book)
	//h="harry potter"
	console.log("abhi"+book)
	const response = await fetch(`https://www.googleapis.com/books/v1/volumes?q=${book}`)
	const data = await response.json()
	console.log(response)
	return data
}
//extracting books 
const extractThumbnail = (volumeInfo) => {
	//console.log(volumeInfo)
	const DEFAULT_THUMBNAIL = 'icons/logo.svg'
	if (!volumeInfo.imageLinks || !volumeInfo.imageLinks.thumbnail) { return DEFAULT_THUMBNAIL }
	return volumeInfo.imageLinks.thumbnail.replace('http://', 'https://')
}
const drawList = async (subject, startIndex = 0) => {
	var bb='hab'
	subject=hab[i];
	i++;
		let cbookContainer = document.querySelector(`.${bb}`)
	console.log("b="+cbookContainer);
	let b="Teller's Tale, The"
		console.log("1"+subject)
	cbookContainer.innerHTML = `<div class='prompt'><div class="loader"></div></div>`
	const cdata = await bala(`${subject}&startIndex=${startIndex}&maxResults=1`)
	//console.log(cdata);
	if (cdata.error) {
		cbookContainer.innerHTML = `<div class='prompt'>ツ Limit exceeded! Try after some time</div>`
	} else if (cdata.totalItems == 0) {
		cbookContainer.innerHTML = `<div class='prompt'>ツ No results, try a different term!</div>`
	} else if (cdata.totalItems == undefined) {
		cbookContainer.innerHTML = `<div class='prompt'>ツ Network problem!</div>`
	} else if (!cdata.items || cdata.items.length == 0) {
		cbookContainer.innerHTML = `<div class='prompt'>ツ There is no more result!</div>`
	} else {
		cbookContainer.innerHTML = cdata.items
		cbookContainer.innerHTML = cdata.items
		//console.log(cdata.items.volumeInfo.previewLink)
			.map(({
				volumeInfo
				//console.log(volumeInfo)
			}) => `<div class='book' style='background: linear-gradient(` + getRandomColor() + `, rgba(0, 0, 0, 0));'><a href='${volumeInfo.previewLink}'  target='_blank'><img class='thumbnail' src='` + extractThumbnail(volumeInfo) + `' alt='cover'></a><div class='book-info'><h3 class='book-title'><a href='${volumeInfo.previewLink}'  target='_blank'><p onclick='fun(this,"title");'>${volumeInfo.title}</p></a></h3><div class='book-authors' onclick='updateFilter(this,"author");'>${volumeInfo.authors}</div><div class='info' onclick='updateFilter(this,"subject");' style='background-color: ` + getRandomColor() + `;'>` + (volumeInfo.categories === undefined ? 'Others' : volumeInfo.categories) + `</div></div></div>`)
			.join('')
			// console.log(cbookContainer.innerHTML);
	}	} 


const drawChartBook = async (subject, startIndex = 0) => {
	let cbookContainer = document.querySelector(`.${subject}`)
	//console.log(cbookContainer);
	cbookContainer.innerHTML = `<div class='prompt'><div class="loader"></div></div>`
	const cdata = await getBooks(`subject:${subject}&startIndex=${startIndex}&maxResults=6`)
	//console.log(cdata);
	if (cdata.error) {
		cbookContainer.innerHTML = `<div class='prompt'>ツ Limit exceeded! Try after some time</div>`
	} else if (cdata.totalItems == 0) {
		cbookContainer.innerHTML = `<div class='prompt'>ツ No results, try a different term!</div>`
	} else if (cdata.totalItems == undefined) {
		cbookContainer.innerHTML = `<div class='prompt'>ツ Network problem!</div>`
	} else if (!cdata.items || cdata.items.length == 0) {
		cbookContainer.innerHTML = `<div class='prompt'>ツ There is no more result!</div>`
	} else {
		cbookContainer.innerHTML = cdata.items
		cbookContainer.innerHTML = cdata.items
			.map(({
				volumeInfo
			}) => `<div class='book' style='background: linear-gradient(` + getRandomColor() + `, rgba(0, 0, 0, 0));'><a href='${volumeInfo.previewLink}'  target='_blank'><img class='thumbnail' src='` + extractThumbnail(volumeInfo) + `' alt='cover'></a><div class='book-info'><h3 class='book-title'><a href='${volumeInfo.previewLink}'  target='_blank'><p id="trail" onclick='fun(this,"title");'>${volumeInfo.title}</p></a></h3><div class='book-authors' onclick='updateFilter(this,"author");'>${volumeInfo.authors}</div><div class='info' onclick='updateFilter(this,"subject");' style='background-color: ` + getRandomColor() + `;'>` + (volumeInfo.categories === undefined ? 'Others' : volumeInfo.categories) + `</div></div></div>`)
			.join('')
			//console.log(volumeInfo.previewLink);
	}
}
//search func
const drawListBook = async () => {
	if (searchBooks.value != '') {
		bookContainer.style.display = 'flex'
		bookContainer.innerHTML = `<div class='prompt'><div class="loader"></div></div>`
		const data = await getBooks(`${searchBooks.value}&maxResults=6`)

		if (data.error) {
			bookContainer.innerHTML = `<div class='prompt'>ツ Limit exceeded! Try after some time</div>`
		} else if (data.totalItems == 0) {
			bookContainer.innerHTML = `<div class='prompt'>ツ No results, try a different term!</div>`
		} else if (data.totalItems == undefined) {
			bookContainer.innerHTML = `<div class='prompt'>ツ Network problem!</div>`
		} else {
			bookContainer.innerHTML = data.items
				.map(({
					volumeInfo
				}) => `<div class='book' style='background: linear-gradient(` + getRandomColor() + `, rgba(0, 0, 0, 0));'><a href='${volumeInfo.previewLink}' target='_blank'><img class='thumbnail' src='` + extractThumbnail(volumeInfo) + `' alt='cover'></a><div class='book-info'><h3 class='book-title'><a href='${volumeInfo.previewLink}' target='_blank'><p onclick='fun(this,"title");'>${volumeInfo.title}</p></a></h3><div class='book-authors' onclick='updateFilter(this,"author");'>${volumeInfo.authors}</div><div class='info' onclick='updateFilter(this,"subject");' style='background-color: ` + getRandomColor() + `;'>` + (volumeInfo.categories === undefined ? 'Others' : volumeInfo.categories) + `</div></div></div>`)
				.join('')
		}
	} else {
		bookContainer.style.display = 'none'
	}
}
const updateFilter = ({
	innerHTML
}, f) => {
	document.getElementById('main').scrollIntoView({
		behavior: 'smooth'
	})
	let m
	switch (f) {
		case 'author':
			m = 'inauthor:'
			break
		case 'subject':
			m = 'subject:'
			break
	}
	searchBooks.value = m + innerHTML
	//console.log(searchBooks.value)
	debounce(drawListBook, 1000)
}
const debounce = (fn, time, to = 0) => {
	to ? clearTimeout(to) : (to = setTimeout(drawListBook, time))
}
//console.log(searchBooks)
searchBooks.addEventListener('input', () => debounce(drawListBook, 1000))
document.addEventListener('DOMContentLoaded', () => {
	drawChartBook('love')
	drawChartBook('feminism')
	drawChartBook('inspirational')
	drawChartBook('authors')
	drawChartBook('fiction')
	drawChartBook('poetry')
	drawChartBook('fantasy')
	drawChartBook('romance')
	drawList('hab')
})
let mainNavLinks = document.querySelectorAll('.scrolltoview')
window.addEventListener('scroll', event => {
	let fromTop = window.scrollY + 64
	mainNavLinks.forEach(({
		hash,
		classList
	}) => {
		let section = document.querySelector(hash)
		if (section.offsetTop <= fromTop && section.offsetTop + section.offsetHeight > fromTop) {
			classList.add('current')
		} else {
			classList.remove('current')
		}
	})
})
const getRandomColor = () => `#${Math.floor(Math.random() * 16777215).toString(16)}40`
const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]')
if (localStorage.getItem('marcdownTheme') == 'dark') {
	document.documentElement.setAttribute('data-theme', 'dark')
	document.querySelector('meta[name=theme-color]').setAttribute('content', '#090b28')
	toggleSwitch.checked = true
	localStorage.setItem('marcdownTheme', 'dark')
} else {
	document.documentElement.setAttribute('data-theme', 'light')
	document.querySelector('meta[name=theme-color]').setAttribute('content', '#ffffff')
	toggleSwitch.checked = false
	localStorage.setItem('marcdownTheme', 'light')
}
const switchTheme = ({
	target
}) => {
	if (target.checked) {
		document.documentElement.setAttribute('data-theme', 'dark')
		document.querySelector('meta[name=theme-color]').setAttribute('content', '#090b28')
		localStorage.setItem('marcdownTheme', 'dark')
	} else {
		document.documentElement.setAttribute('data-theme', 'light')
		document.querySelector('meta[name=theme-color]').setAttribute('content', '#ffffff')
		localStorage.setItem('marcdownTheme', 'light')
	}
}
toggleSwitch.addEventListener('change', switchTheme, false)
let startIndex = 0
const next = (subject) => {
	startIndex += 6
	if (startIndex >= 0) {
		document.getElementById(`${subject}-prev`).style.display = 'inline-flex'
		drawChartBook(subject, startIndex)
	} else {
		document.getElementById(`${subject}-prev`).style.display = 'none'
	}
}
const prev = (subject) => {
	startIndex -= 6
	if (startIndex <= 0) {
		startIndex = 0
		drawChartBook(subject, startIndex)
		document.getElementById(`${subject}-prev`).style.display = 'none'
	} else {
		document.getElementById(`${subject}-prev`).style.display = 'inline-flex'
		drawChartBook(subject, startIndex)
	}
}
const modal = document.querySelector('.modal')
const trigger = document.querySelector('.trigger')
const closeButton = document.querySelector('.close-button')
const toggleModal = () => modal.classList.toggle('show-modal')
const windowOnClick = ({
	target
}) => {
	if (target === modal) {
		toggleModal()
	}
}
trigger.addEventListener('click', toggleModal)
closeButton.addEventListener('click', toggleModal)
window.addEventListener('click', windowOnClick)


function fun(title){
	var t=new XMLSerializer().serializeToString(title)
	var t1=t.split(">");
	var f=t1[1].split("</p");
	 var bookname=f[0];
	var username = "<?php echo $Username ?>"; 
	//eel.say_hello_py(ans);
    console.log("username = "+username);
	console.log("bookbame = "+bookname);
	
	var httpr=new XMLHttpRequest();
	httpr.open("POST","t1.php",true);
	httpr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	httpr.onreadystatechannge=function(){
		if(httpr.readyState==4 && httpr.status==200){
			document.getElementById("response").innerHTML=httpr.responseText;
		}
	}
	httpr.send("username="+username+"&bookname="+bookname);
}

</script>


</html>