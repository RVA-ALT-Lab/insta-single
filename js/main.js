const sourceUrl = document.querySelector('#source-url');
const embedCode = document.querySelector('#embed-code');

sourceUrl.addEventListener('change', makeNewEmbed)

function makeNewEmbed(){
	const instaUrl = sourceUrl.value;
	console.log(instaUrl);
}


console.log(sourceUrl)

console.log(embedCode)