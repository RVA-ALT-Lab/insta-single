const sourceUrl = document.querySelector('#source-url');
const embedCode = document.querySelector('#embed-code');

sourceUrl.addEventListener('change', makeNewEmbed)

function makeNewEmbed(){
	const instaUrl = sourceUrl.value;
	const iframeDestination = document.querySelector('iframe');
	const newSource = 'http://192.168.33.10/insta-single/vendor/getMediaByUrl.php?url='+instaUrl;
	iframeDestination.src = newSource;
	embedCode.value = '<iframe style="width: 500px;height: 800px;border: 0;" src="' + newSource + '"></iframe'
}
