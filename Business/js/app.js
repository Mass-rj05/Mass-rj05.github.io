const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav_links');
    const navLinks = document.querySelectorAll('.nav_links li');
    console.log(navLinks);
   
  
    burger.addEventListener('click', () => {

          // Togle Nav
        nav.classList.toggle('nav-active');
 
   
            // Animation Links
         navLinks.forEach((link, index) => {  
            console.log(index);
   
            if(link.style.animation){
                link.style.animation = '';
            }
            else{
                 link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`;
                 
                 console.log( index/7);
                // link.style.opacity =('1');
            }
            
       });

       //burger animations
       burger.classList.toggle('toggle');

    });


}

navSlide();
