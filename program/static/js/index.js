$(function(){
  let lis = $('.bannertud > li');
  let imgW = lis.width();
  let banner = $('.bannerd');
  let lefts = $('.bl');
  let rights = $('.br');
  let now = next = 0;
  let siminfor = $('.siminfor');
  let flag=true;
	let t;
    t=setInterval(move,3000);
    // 自动轮播
	function move(){
	   next++;
       if(next==lis.length){
        next=0;
       }
       lis.eq(next).css({left:imgW,display:'block'});
       lis.eq(next).animate({left:0,display:'block'});
       lis.eq(now).animate({left:-imgW},function(){
          flag=true;
       });     
       now=next;
	}
	function movel(){
       next--;
       if(next<0){
        next=lis.length-1;
       }  
       lis.eq(next).css({left:imgW,display:'block'});
       lis.eq(next).animate({left:0,display:'block'});
       lis.eq(now).animate({left:-imgW},function(){
          flag=true;
       });        
       now=next;
    }
	 // 鼠标移入自动轮播停止
    banner.on('mouseenter',function(){
      clearInterval(t);
   }) 
   banner.on('mouseleave',function(){
       t=setInterval(move,3000);
   })  
     // 左右按钮
    rights.on('click',function(){
      if(!flag){
            return;
        }
        move();
        flag=false;
    })
     lefts.on('click',function(){
      if(!flag){
            return;
        }
        move();
        flag=false;
    })
    /*$(document).ready(function(){
	    let bannerR=$('.banner-right');
		bannerR.on('click',function(){
			let next=$('.active').next();
			console.log(next)
			if (next.length==0) {
				next=$('.banner-list>li').eq(0);
			}
			scale(next,'left');
			function scale(obj){
				let active=$('.active');
				active.addClass('fangda').delay(500).queue(function(){
					$(this).removeClass('fangda').removeClass('active');
					$(this).dequeue();
				}).children('.banner-mask').children().animate({opacity:0})
				obj.delay(500).queue(function(){
					$(this).addClass('fangda').children('.banner-mask')
					.children().animate({opacity:1})
					$(this)[0].offsetWidth;
					$(this).removeClass('fangda').addClass('active');
					$(this).dequeue();
				})
			}
		})
})

    * */

})