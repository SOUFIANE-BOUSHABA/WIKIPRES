function toggleAside() {
    var aside = document.getElementById("myAside");
    var righttt = document.getElementById("right");
    var rightttBtn = document.getElementById("rightBtn");
    var leftBtn = document.getElementById("leftBtn");
    var links = document.querySelectorAll(".link");

    if (aside.style.width === "5%") {
      aside.style.width = "17%";
      righttt.style.width="83%";
      leftBtn.style.display="block";
      rightttBtn.style.display="none";
      links.forEach(function (link) {
            link.style.display = "block";
        });
    
    } else {
      aside.style.width = "5%";
      righttt.style.width="95%";
      leftBtn.style.display="none";
      rightttBtn.style.display="block";
   
        links.forEach(function (link) {
            link.style.display = "none";
        });
    }
  }




  
  function searchadmincategory() {
               
    let input = document.getElementById("searchInput").value;
    let url = `?uri=category/search&search=${encodeURIComponent(input)}`;

    let xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("category").innerHTML = xml.responseText;
        }
    };
    xml.open("GET", url, true);
    xml.send();

}




function searchadmintag() {
               
    let input = document.getElementById("searchInput").value;
    let url = `?uri=tag/search&search=${encodeURIComponent(input)}`;

    let xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("tag").innerHTML = xml.responseText;
        }
    };
    xml.open("GET", url, true);
    xml.send();

}



function searchadminwiki() {
               
    let input = document.getElementById("searchInput").value;
    let url = `?uri=wiki/search&search=${encodeURIComponent(input)}`;

    let xml = new XMLHttpRequest();
    xml.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("category").innerHTML = xml.responseText;
        }
    };
    xml.open("GET", url, true);
    xml.send();

}