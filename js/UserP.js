let arrow = document.querySelectorAll('.arrow');
for (let i = 0; i < arrow.length; i++) {
  arrow[i].addEventListener('click', (e) => {
    let arrowParent = e.target.parentElement.parentElement;
    arrowParent.classList.toggle("showMenu")

  });

}

let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".bx-menu");
//   console.log(sidebarBtn);
sidebarBtn.addEventListener("click", () => {
  sidebar.classList.toggle("close");
});


function myFunction() {
  document.getElementById("notiContent").classList.toggle("shownoti");
}

window.onclick = function (e) {
  if (!e.target.matches('.notiBtn')) {
    var notiDropdown = document.getElementById("notiContent");
    if (notiDropdown.classList.contains('shownoti')) {
      notiDropdown.classList.remove('shownoti');
    }
  }
}
