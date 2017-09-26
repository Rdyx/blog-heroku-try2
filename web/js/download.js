$('.download').click(function(){
	var content = 'Titre\n' + $('#titre').html() + '\n \nArticle\n' + $('#content').html();
// any kind of extension (.txt,.cpp,.cs,.bat)
var filename = "article.txt";

var blob = new Blob([content], {
	type: "text/plain;charset=utf-8"
});

saveAs(blob, filename);
});