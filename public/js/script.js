// add hovered class to selected list item
let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("mouseover", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};


document.addEventListener('DOMContentLoaded', function() {
  // Toggle menu links saat tombol hamburger di-click
  document.querySelector('.menu-toggle').addEventListener('click', function() {
      document.querySelector('.links').classList.toggle('show');
  });

  // Toggle dropdown pengaturan pengguna saat tombol user di-click
  document.querySelector('.user-toggle').addEventListener('click', function() {
      document.querySelector('.user-dropdown-content').classList.toggle('show');
  });
});


