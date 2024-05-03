let kategorite = document.querySelectorAll("label");
let checkboxes = document.querySelectorAll("input[type='checkbox']")
const goUp = document.querySelector("#goUp")


kategorite.forEach((kategori, index) => {
  kategori.addEventListener("click", () => {

    kategori.classList.toggle("active")

    console.log(checkboxes);
    checkboxes[index].checked = true
  })
})

goUp.addEventListener("click", () => {
  window.scrollTo(0, 0)
})

window.addEventListener("scroll", () => {
  if (window.scrollY > 400) {
    goUp.classList.add("active")
  } else {
    goUp.classList.remove("active")
  }
})


document.addEventListener("DOMContentLoaded", () => {
  const produktet = document.querySelectorAll(".bestSeller")
  let produktAnimationDelay = 0;

  produktet.forEach(produkt => {
    produkt.animate(
      [
        { transform: 'translateY(10px)', opacity: 0 },
        { transform: 'translateY(0px)', opacity: 1 }
      ],
      { duration: 300, delay: produktAnimationDelay, fill: "forwards"}
    );

    produktAnimationDelay += 300;
  });
});



let navBtn = document.querySelector(".navBtn")
let nav = document.querySelector("nav")

navBtn.addEventListener("click", () => {
  nav.classList.toggle("active")
  if(nav.classList.contains("active")){
    document.querySelector(".fa.fa-bars").classList.replace("fa-bars","fa-times")
  } else {
    document.querySelector(".fa.fa-times").classList.replace("fa-times","fa-bars")
  }
})

