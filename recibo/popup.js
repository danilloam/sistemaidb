//Funcao que centraliza a janela

function openpopup(popurl)
{
w = screen.width;
h = screen.height;

L = 790;
A = 524;

if(w > 850){
l = w / 2 - L / 2;
t = h / 2 - A / 2;
} else {
l = 0;
t = 0;
}
winpops=window.open(popurl,"","width="+L+",height="+A+",scrollbars,top="+t+",left="+l+",status")
}