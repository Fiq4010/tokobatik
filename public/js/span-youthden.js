const yd_top = document.querySelector(".youth-den-p .top");
const yd_bottom = document.querySelector(".youth-den-p .bottom");

for (let index = 0; index < 3; index++) {
    var span = document.createElement("span");
    var text = document.createTextNode("youthden.");
    span.classList.add("color");
    span.appendChild(text);
    yd_top.appendChild(span);
}

for (let index = 0; index < 3; index++) {
    var span = document.createElement("span");
    var text = document.createTextNode("youthden.");
    span.classList.add("color");
    span.appendChild(text);
    yd_bottom.appendChild(span);
}