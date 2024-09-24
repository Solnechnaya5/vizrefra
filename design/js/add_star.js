const iframes = document.getElementsByClassName('iframe-restrict');

for (let i = 0; i < iframes.length; i++) {

   iframes[i].onload = function () {
   const redStars = document.querySelectorAll('.red-star');

   function showStar() {
       redStars.forEach((redStars) => redStars.classList.add('show-star'));
   };
   function hideStar() {
       redStars.forEach((redStars) => redStars.classList.remove('show-star'));
   };
       
       const iframeDoc = iframes[i].contentDocument || iframes[i].contentWindow.document;
       const tabDivs = iframeDoc.getElementsByClassName('main-part');
   
    
   let loginForm = iframeDoc.getElementsByClassName('restrict-content_msg');
	   
  let modalArrows = document.querySelectorAll('.modal-restrict');
	   function hideArrow(){
		    modalArrows.forEach(( modalArrows) =>  modalArrows.style.display = 'none')
	   }
	   
   for (let i = 0; i < tabDivs.length; i++) {
       if (tabDivs[i] == 0) {
           loginForm[i].style.display = 'flex';
       } else {
           loginForm[i].style.display = 'none';
       }
   };
       for (let j = 0; j < loginForm.length; j++) {
       if (loginForm[j].hasAttribute('style', 'display: none;')) {
           
            hideStar();
       } else {
    		showStar() ;
			hideArrow()   
       }
   }
   
   }
   
};