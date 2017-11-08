window.onload=function(){
    let li1 = document.querySelector('.li1');
    let zhezhao1 =document.querySelector('div.zhezhao1');
    li1.addEventListener('mouseover',function(){
        zhezhao1.style.opacity = 1;
        zhezhao1.style.transform = `translateY(${-28}px)`;
    })
    li1.addEventListener('mouseout',function(){
        zhezhao1.style.transform = `translateY(${0}px)`;
        zhezhao1.style.opacity = 0;
    })
    let li2 = document.querySelector('.li2');
    let zhezhao2 =document.querySelector('div.zhezhao2');
    li2.addEventListener('mouseover',function(){
        zhezhao2.style.opacity = 1;
        zhezhao2.style.transform = `translateY(${-28}px)`;
    })
    li2.addEventListener('mouseout',function(){
        zhezhao2.style.transform = `translateY(${0}px)`;
        zhezhao2.style.opacity = 0;
    })
    let li3 = document.querySelector('.li3');
    let zhezhao3 =document.querySelector('div.zhezhao3');
    li3.addEventListener('mouseover',function(){
        zhezhao3.style.opacity = 1;
        zhezhao3.style.transform = `translateY(${-28}px)`;
    })
    li3.addEventListener('mouseout',function(){
        zhezhao3.style.transform = `translateY(${0}px)`;
        zhezhao3.style.opacity = 0;
    })
    let li4 = document.querySelector('.li4');
    let zhezhao4 =document.querySelector('div.zhezhao4');
    li4.addEventListener('mouseover',function(){
        zhezhao4.style.opacity = 1;
        zhezhao4.style.transform = `translateY(${-28}px)`;
    })
    li4.addEventListener('mouseout',function(){
        zhezhao4.style.transform = `translateY(${0}px)`;
        zhezhao4.style.opacity = 0;
    })
}
