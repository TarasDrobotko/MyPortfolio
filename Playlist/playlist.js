/* playlist.js */

window.onload = init;

function init() {
	var button = document.getElementById("addButton");
	button.onclick = handleButtonClick;


	//loadPlaylist();
}



//node1 = document.body;
//var node = document.getElementById("playlist");
//node1.removeChild(node);
 

function handleButtonClick(e) {
	var textInput = document.getElementById("songTextInput");
var songName = textInput.value;

/*var Songs = [];
//	var songName = textInput.value;
 for(i=0; i<Songs.length; i++) {
 if(Songs.indexOf(Songs[i]) == -1)
 Songs.push(Songs[i]);
if( Songs.push(Songs[i]))
 document.createElement("li").innerHTML = Songs[i]; }
var li= document.createElement("li"); */

	if (songName == "") {
		alert("Please enter a song");
	}
	else {
  ul = document.getElementById("playlist");
  var  lis = ul.getElementsByTagName("LI");
var li = document.createElement("li");
		li.innerHTML = songName;
	var ul = document.getElementById("playlist");
		ul.appendChild(li);

		//alert("Adding " + songName);
	//  if(vals.indexOf(lis[i].innerHTML) == -1)	{
//var li = document.createElement("li");
	//	li.innerHTML = songName;

	//	var ul = document.getElementById("playlist");
	//	ul.appendChild(li);
     
function sortUnorderedList(ul, sortDescending) {

    if(typeof ul == "string")
        ul = document.getElementById(ul);
    // Получаем ячейки списка в массив
   var  lis = ul.getElementsByTagName("LI");
var  vals = [];
    for(i = 0, l = lis.length; i < l; i++)
        vals.push(lis[i].innerHTML);

    
   // if(vals.indexOf(lis[i].innerHTML) !== -1)
// vals.push(lis[i].innerHTML="");
    // Сортируем их
    vals.sort(); 
    // Если в обрятном порядке, то оборачиваем
    if(sortDescending)
        vals.reverse();
    // Меняем содержимое элементов списка
    for(i = 0, l = lis.length; i < l; i++) 
 // if(lis.indexOf(lis[i].innerHTML) == -1) 
 lis[i].innerHTML = vals[i];

setTimeout(function() {
   li.parentNode.removeChild(li);
  }, 20000);
//if(lis[i].innerHTML=="undefined") {
//ulp = document.getElementById("playlist").lastChild;
 //ulp.parentNode.removeChild(ulp);
//alert("Цю пісню уже додано до списку!");
//}
//if(lis[i].innerHTML == undefined) {

  //}

//var li = document.createElement("li");
	//	li.innerHTML = songName;
//var ul = document.getElementById("playlist");
	//	ul.appendChild(li);

 //if(vals.indexOf(lis[i].innerHTML) !== -1)
 //lis[i].innerHTML = "";
// else {
// var node = document.getElementById("playlist");
//  while(node.childNodes[i])
 //  node.removeChild(node.childNodes[i]);} -->
}
sortUnorderedList("playlist");
		// for Ready Bake
	//save(songName);
	}
 
}




