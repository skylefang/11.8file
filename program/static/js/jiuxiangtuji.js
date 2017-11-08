$(function(){
    let lis = $('.box>li');
    let spans = $('span');

    console.log(spans)
    console.log(lis)
    let mask = $('div.mask');
    let close = $('div.close');
    let mImg = $('img',mask);
    console.log()
    let btnL = $('div.btnL');
    let btnR = $('div.btnR');
    let index = 0;
    lis.on('click',function(){
        index = $(this).index();
        let src = $(this).find('img').attr('src');
        mImg.attr('src',src);
        mask.addClass('active');
        console.log(index);
        spans.text(`${index+1}`);
    })
    close.click(function(){
        mask.removeClass('active');
    })
    $(document).mousedown(false);
    btnL.click(function(){
        index--;

        if(index < 0){
            index = lis.length-1;
            
        }
        let src = lis.eq(index).find('img').attr('src');
        mImg.attr('src',src);
        console.log(index)
        console.log(lis.eq(index))
        spans.text(`${index+1}`);
    })

    btnR.on('click',function(){
        index++;
        if(index > lis.length-1){
            index = 0;
        }
        let src = lis.eq(index).find('img').attr('src');
        mImg.attr('src',src);
        console.log(index)
        spans.text(`${index+1}`);
    })
   /* mask.on('click',function(e){
        // btnL.click=null;
        let lefts = e.clientX;
        if(lefts < innerWidth / 2){
            btnL.trigger('click');
        }else{
            btnR.trigger('click');
        }
    })*/




})