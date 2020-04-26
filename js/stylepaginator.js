document.addEventListener("DOMContentLoaded",function () {
    let url = new URL(window.location.href);
    let page = url.searchParams.get('page');
    page = (page == null?1:page)-1 ;
    console.log(page);
    let links = list.getElementsByClassName("pagin");
    links[page].style.color='yellow';
    links[page].style.border='3px solid #ce59f7';
    // var list = document.getElementById("list");
    // var pagin = list.getElementsByClassName("pagin");
    // for (var i = 0; i < pagin.length; i++) {
    //     pagin[i].addEventListener("click", function () {
    //         var current = document.getElementsByClassName("active");
    //         current[0].className = current[0].className.replace("active", "");
    //         this.className += " active";
    //     })
    // }
})
