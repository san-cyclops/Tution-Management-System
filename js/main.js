$(document).ready(function(){

$('.fa-bars').click(function(){
    $(this).toggleClass('fa-times');
    $('.navbar').toggleClass('nav-toggle');
});

$(window).on('load scroll',function(){

$('.fa-bars').removeClass('fa-times');
$('.navbar').removeClass('nav-toggle');

if($(window).scrollTop() > 30){
    $('.header').css({'background': 'rgba(0, 0, 0,0.5)','box-shadow':'0 .2rem 4rem rgba(0,0,0,0.8)'});
}else{
    $('.header').css({'background': 'none','box-shadow':'none'});
}
});

});

var swiper = new Swiper(".card-slider", {
   pagination: {
        el: ".swiper-pagination",
      },
   loop:true,
   grabCursor:true,

    breakpoints: {
        0: {
            slidesPerView: 1,
            
          },
        640: {
          slidesPerView: 2,
          
        },
        768: {
          slidesPerView: 3,
          
        },
        1024: {
          slidesPerView: 4,
          
        },
    }
  });


  function focusFunc(){
    let parent = this.parentNode;
    parent.classList.add("focus");
  }

  function blurFunc(){
    let parent = this.parentNode;
    if(this.value === ""){
    parent.classList.remove("focus");
    }
  }

  const inputs = document.querySelectorAll(".input");
  inputs.forEach((input) => {
    input.addEventListener("focus",focusFunc);
    input.addEventListener("blur",blurFunc);
  });