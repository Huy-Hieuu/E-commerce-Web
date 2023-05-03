function toggleSearchBar() {
    var searchInput = document.getElementById("searchInput");
    searchInput.classList.toggle("show");
}

document.addEventListener("DOMContentLoaded", () => {
    let mySearch = document.getElementById("mySearch");
    mySearch.addEventListener("keyup", (event) => {
        let searchVal = event.target.value.toLowerCase();
        showResult(searchVal);
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
        elementRes.innerHTML=this.responseText;

        elementRes.style.border="1px solid #A5ACB2";
      }
    }
    xmlhttp.open("GET","../handler/search_products.php?product="+searchVal,true);
    xmlhttp.send();
}