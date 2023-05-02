function toggleSearchBar() {
    var searchInput = document.getElementById("searchInput");
    searchInput.classList.toggle("show");
}

document.addEventListener("DOMContentLoaded", () => {
    let mySearch = document.getElementById("mySearch");
    mySearch.addEventListener("keyup", (event) => {
        let searchVal = event.target.value.toLowerCase();
        showResult(searchVal);
        // console.log(searchVal);
        // let dropdownItems = document.querySelectorAll(".search-menu li");
        // dropdownItems.forEach((item) => {
        //     let text = item.textContent.toLowerCase();
        //     let child = item.childNodes;
        //     child.item(0).style.display = text.indexOf(searchVal) > -1 ? "block" : "none";
        // });
    });
});

function showResult(searchVal){
    elementRes = document.getElementById('search_rs');
    if(searchVal.length === 0)
    {
        elementRes.innerHTML = '';
        elementRes.style.border = '0px';
        return;
    }
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
      if (this.readyState==4 && this.status==200) {
        data = this.responseText;
        console.log(data)
        // returnElement = `<li class="d-block  px-5 py-2"><a class="dropdown-item" href="#">${data.}</a></li>`
        elementRes.innerHTML=this.responseText;

        elementRes.style.border="1px solid #A5ACB2";
      }
    }
    xmlhttp.open("GET","../handler/search_products.php?product="+searchVal,true);
    xmlhttp.send();
}