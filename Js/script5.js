 var ni = document.getElementById('ni');
 var modale = document.getElementById('modale');
 var Decbtn = document.getElementById('Decbtn');
 var Canbtn = document.getElementById('Canbtn');
 ni.onclick =function(){
        modale.style.display="flex";
 }

 Decbtn.onclick= function() {
       document.getElementById('frm').submit();
       modale.style.display="none";
   }

   Canbtn.onclick =function(){
       modale.style.display="none";
}

 