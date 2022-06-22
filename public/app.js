// Tooltip
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
  });

// Page-Intro
let intro = document.querySelector('.intro');
let banner = document.querySelector('.banner-header');
let bannerSpan = document.querySelectorAll('.banner');

window.addEventListener('DOMContentLoaded', ()=> {

    setTimeout(()=>{

        bannerSpan.forEach((span, idx)=>{
            setTimeout(()=>{
                span.classList.add('active');
            }, (idx + 1 * 400))
        });

        setTimeout(()=>{
            bannerSpan.forEach((span, idx)=>{
                setTimeout(()=>{
                    span.classList.remove('active');
                    span.classList.add('fade');
                }, (idx + 1 * 50 ))
            })
        }, 2000);

        setTimeout(() => {
            intro.style.top = '-100vh';
        }, 2300);

    })
})