document.addEventListener("DOMContentLoaded", function(){
    let lazyloadImages = document.querySelectorAll("img.lazy-load");
    let lazyLoadThrottleTimeout;

    function lazyload(){
        if(lazyLoadThrottleTimeout){
            clearTimeout(lazyLoadThrottleTimeout);
        }
        lazyLoadThrottleTimeout = setTimeout(function(){
            let scrollTop = window.pageYOffset;
            lazyloadImages.forEach(function(img){
                if(img.offsetTop < (window.innerHeight + scrollTop*100))
                {
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                }
            })
            if(lazyloadImages.length === 0){
                document.removeEventListener("scroll", lazyload);
                window.removeEventListener("resize", lazyload);
                window.removeEventListener("orientationChange", lazyload);
            }
        }, 20);
    }
    document.addEventListener("scroll", lazyload);
    window.addEventListener("resize", lazyload);
    window.addEventListener("orientationChange", lazyload);
})