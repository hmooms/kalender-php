var list = document.getElementsByTagName('ul')[0];
var butt = document.getElementsByTagName('button')[0];
var input = document.getElementsByTagName('input');

function main(){
  if (list.style.display == "inline"){
    list.style.display = "none";
    butt.style.borderWidth = "1px";
  }
  else{
    list.style.display = "inline";
    butt.style.borderWidth = "2px 1px 1px 2px";
  }
}

function check(){
  if (input[2].value == 2 || input[2].value == 6 || input[2].value == 7 || input[2].value == 9 || input[2].value == 11) {
    input[1].max = "30";
  } else if (input[2].value == 4 && input[3].value % 4 == 0){
    input[1].max = "29";
  } else if (input[2].value == 4) {
    input[1].max = "28";
  } else {
    input[1].max = "31";
  }
}
