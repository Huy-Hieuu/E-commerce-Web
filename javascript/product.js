
document.addEventListener("DOMContentLoaded", function(){
    let lazyloadImages = document.querySelectorAll("img.lazy-load");
    console.log(lazyloadImages)
    let lazyLoadThrottleTimeout;

    function lazyload(){
        if(lazyLoadThrottleTimeout){
            clearTimeout(lazyLoadThrottleTimeout);
        }
        lazyLoadThrottleTimeout = setTimeout(function(){
            let scrollTop = window.pageYOffset;
            lazyloadImages.forEach(function(img){
                console.log("size: ", img.offsetTop, window.innerHeight, scrollTop);
                if(img.offsetTop < (window.innerHeight + scrollTop))
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