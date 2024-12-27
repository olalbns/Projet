var Sipt = document.getElementById('Conm');
var ha = document.getElementById('ha');
var kk = document.getElementById('kk');
var nnp = document.getElementById('nnp');
var cha=document.getElementById('cha')
var roo= document.getElementById('roo')

Sipt.addEventListener("click", function() {
    ha.setAttribute("hidden", true);
    cha.removeAttribute("hidden");
    roo.setAttribute("hidden", true);
    kk.removeAttribute("hidden");
});

nnp.addEventListener("click", function() {
    kk.setAttribute("hidden", true);
    ha.removeAttribute("hidden");
    roo.removeAttribute("hidden"); 
    cha.setAttribute("hidden", true);
});
