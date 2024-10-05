var count = 0;
document.getElementById("my_cat_button").onclick = function() {
        count++;
        if (count % 2 == 0 ) {
                document.getElementById("place_for_cat").innerHTML = "";
        } else {
                var img = document.createElement("img");
                img.src = "images/myCat.png";
                img.style.width = "232px";
                img.style.height = "440px";
                document.getElementById("place_for_cat").appendChild(img);
        }
}
