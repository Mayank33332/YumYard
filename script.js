let tl = gsap.timeline()

tl.from("#logo1", {
    y: -30,
    opacity: 0.5,
    dealy: 1,
});


tl.from("h4 ", {
    y: -30,
    duration: 1,
    opacity: 0,


});



tl.from(".top-head ", {
    y: -30,
    opacity: 0,
    scale: 3,


});


tl.from(".head ", {
    y: -30,
    opacity: 0,


});

tl.from(".m1-img ", {
    x: 90,
    opacity: 0,
    scale: 3


});


gsap.from(".q-menu ", {
    x: 90,
    opacity: 0,
    scale: 3,
    dealy:3,
    scrollTrigger: {
        trigger: ".q-menu",
        scroller: "body",
    }


});



gsap.from(".welcome ", {
    x: 90,
    opacity: 0,
    duration: 2,
    dealy: 2,
    scrollTrigger: {
        trigger: ".welcome",
        scroller: "body",


    }
});


gsap.from(".explore ", {
    y:100,
    opacity: 0,
    scale:3,
    scrollTrigger: {
        trigger: ".explore",
        scroller: "body",


    }
});

gsap.from(".cards ", {
    x: 90,
    opacity: 0,
    scale: 3,
    dealy:2,
    scrollTrigger:".cards"  

});