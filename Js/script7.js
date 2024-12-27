var Sipt = document.getElementById("Conm");
var ha = document.getElementById("ha");
var kk = document.getElementById("kk");
var nnp = document.getElementById("nnp");
var cha=document.getElementById("cha")
var roo= document.getElementById("roo")
var ms = document.getElementById("ms");
var msee= document.getElementById('msee');
var ik= document.getElementById("ik");
var limos=document.getElementsByClassName("limos");



ms.addEventListener("click", function() {
    msee.removeAttribute("hidden");
    msee.style.display="flex";
    limos.style.display="flex";
    ik.removeAttribute('hidden');
    ha.setAttribute("hidden", true);
    roo.setAttribute("hidden", true);
    cha.setAttribute("hidden", true);
    kk.setAttribute("hidden", true);
    model.setAttribute("hidden", true);


});

Sipt.addEventListener("click", function() {
    ha.setAttribute("hidden", true);
    cha.removeAttribute("hidden");
    roo.setAttribute("hidden", true);
    kk.removeAttribute("hidden");
    msee.setAttribute("hidden",true);
    msee.style.display="none";
    limos.style.display="none";
    ik.setAttribute('hidden', true);
    model.setAttribute("hidden", true);
});

nnp.addEventListener("click", function() {
    kk.setAttribute("hidden", true);
    ha.removeAttribute("hidden");
    roo.removeAttribute("hidden"); 
    cha.setAttribute("hidden", true);
    msee.setAttribute("hidden",true);
    msee.style.display="none";
    limos.style.display="none";
    ik.setAttribute('hidden', true);
});
