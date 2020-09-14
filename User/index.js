var ans="";
let bookContainer = document.querySelector('.search')
let searchBooks = document.getElementById('search-box')
//console.log(bookContainer);
let hab = ['Harry potter', 'Tellers Tale, The','hellen Keller','alchemist','your dreams are mine now']
let i=0;
// all genre & search fetching (main)
// function bha(i){
// 	drawList(hab[i-1]);
// 	drawList(hab[i+1]);
// 	drawList(hab[i]);

// }
const getBooks = async book => {
	//console.log(book)
	const response = await fetch(`https://www.googleapis.com/books/v1/volumes?q=${book}`)
	//console.log(response)
	const data = await response.json()
	//console.log(data)
	return data
}
//-------------------------------------------------------------------------------------------------//
const bala = async book => {
	console.log("zz"+book)
	//h="harry potter"
	console.log("abhi"+book)
	const response = await fetch(`https://www.googleapis.com/books/v1/volumes?q=${book}`)
	const data = await response.json()
	console.log(response)
	return data
}
//-------------------------------------------------------------------------------------------------//
//extracting books 
const extractThumbnail = (volumeInfo) => {
	//console.log(volumeInfo)
	const DEFAULT_THUMBNAIL = 'icons/logo.svg'
	if (!volumeInfo.imageLinks || !volumeInfo.imageLinks.thumbnail) { return DEFAULT_THUMBNAIL }
	return volumeInfo.imageLinks.thumbnail.replace('http://', 'https://')
}
const drawChartBook = async (subject, startIndex = 0) => {
	let cbookContainer = document.querySelector(`.${subject}`)
	//console.log(cbookContainer);
	let b="harry potter"
		//console.log("1"+b)
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
		//console.log(cdata.items.volumeInfo.previewLink)
			.map(({
				volumeInfo
				//console.log(volumeInfo)
			}) => `<div class='book' style='background: linear-gradient(` + getRandomColor() + `, rgba(0, 0, 0, 0));'><a href='${volumeInfo.previewLink}'  target='_blank'><img class='thumbnail' src='` + extractThumbnail(volumeInfo) + `' alt='cover'></a><div class='book-info'><h3 class='book-title'><a href='${volumeInfo.previewLink}'  target='_blank'><p onclick='fun(this,"title");'>${volumeInfo.title}</p></a></h3><div class='book-authors' onclick='updateFilter(this,"author");'>${volumeInfo.authors}</div><div class='info' onclick='updateFilter(this,"subject");' style='background-color: ` + getRandomColor() + `;'>` + (volumeInfo.categories === undefined ? 'Others' : volumeInfo.categories) + `</div></div></div>`)
			.join('')
			// console.log(cbookContainer.innerHTML);
	}
}
//---------------------------------------------------------------------------------//
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



//-------------------------------------------------------------------------------------//
//search func
const drawListBook = async () => {
	if (searchBooks.value != '') {
		let b="harry potter"
		console.log("3"+b)
		//console.log(searchBooks.value)
		bookContainer.style.display = 'flex'
		bookContainer.innerHTML = `<div class='prompt'><div class="loader"></div></div>`
		const data = await getBooks(`${searchBooks.value}&maxResults=6`)
		console.log(data)
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
b="harrypotter"
	// hab.addEventListener('input', () => debounce(drawList, 1000))
document.addEventListener('DOMContentLoaded', () => {
	drawChartBook('love')
	drawChartBook('feminism')
	drawChartBook('inspirational')
	drawChartBook('authors')
	drawChartBook('fiction')
	drawChartBook('poetry')
	drawChartBook('fantasy')
	drawChartBook('romance')
	//for()
	drawList(hab[i])+drawList(hab[i+1])+drawList(hab[i+2])
	//bha(1);

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
// const getRandomColor = () => `#${Math.floor(Math.random() * 16777215).toString(16)}40`
// const toggleSwitch = document.querySelector('.theme-switch input[type="checkbox"]')
// if (localStorage.getItem('marcdownTheme') == 'dark') {
// 	document.documentElement.setAttribute('data-theme', 'dark')
// 	document.querySelector('meta[name=theme-color]').setAttribute('content', '#090b28')
// 	toggleSwitch.checked = true
// 	localStorage.setItem('marcdownTheme', 'dark')
// } else {
// 	document.documentElement.setAttribute('data-theme', 'light')
// 	document.querySelector('meta[name=theme-color]').setAttribute('content', '#ffffff')
// 	toggleSwitch.checked = false
// 	localStorage.setItem('marcdownTheme', 'light')
// }
// const switchTheme = ({
// 	target
// }) => {
// 	if (target.checked) {
// 		document.documentElement.setAttribute('data-theme', 'dark')
// 		document.querySelector('meta[name=theme-color]').setAttribute('content', '#090b28')
// 		localStorage.setItem('marcdownTheme', 'dark')
// 	} else {
// 		document.documentElement.setAttribute('data-theme', 'light')
// 		document.querySelector('meta[name=theme-color]').setAttribute('content', '#ffffff')
// 		localStorage.setItem('marcdownTheme', 'light')
// 	}
// }
// toggleSwitch.addEventListener('change', switchTheme, false)
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
//-------------------------------------------------------------------------------------------------------------//

let startIndex1 = 0
const next1 = (subject) => {
	startIndex1 += 3
	i=i+3
	if (startIndex1 >= 0) {
		document.getElementById(`${subject}-prev`).style.display = 'inline-flex'
		drawList(subject, startIndex1)
	} else {
		document.getElementById(`${subject}-prev`).style.display = 'none'
	}
}
const prev1 = (subject) => {
	startIndex1 -= 3
	i=i-3
	if (startIndex1 <= 0) {
		startIndex1 = 0
		drawList(subject, startIndex1)
		document.getElementById(`${subject}-prev`).style.display = 'none'
	} else {
		document.getElementById(`${subject}-prev`).style.display = 'inline-flex'
		drawList(subject, startIndex1)
	}
}



function fun(title){
	var t=new XMLSerializer().serializeToString(title)
	var t1=t.split(">");
	var f=t1[1].split("</p");
	 var bookname=f[0];
	//var username = "<?php echo $Username ?>"; 
	//eel.say_hello_py(ans);
   // console.log("username = "+username);
	console.log("bookbame = "+bookname);
	
	// var httpr=new XMLHttpRequest();
	// httpr.open("POST","t1.php",true);
	// httpr.setRequestHeader("content-type","application/x-www-form-urlencoded");
	// httpr.onreadystatechannge=function(){
	// 	if(httpr.readyState==4 && httpr.status==200){
	// 		document.getElementById("response").innerHTML=httpr.responseText;
	// 	}
	// }
	// httpr.send("username="+username+"&bookname="+bookname);
}
