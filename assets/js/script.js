// Sllajderi

let sllajderet = document.querySelectorAll(".carousel-item");
let sllajderi = document.querySelector(".carousel")

function ndrroAktiven() {
  for (let i = 0; i < sllajderet.length; i++) {
    if (sllajderet[i].classList.contains("active")) {
      if (i == sllajderet.length - 1) {
        sllajderet[sllajderet.length - 1].classList.remove("active")
        sllajderet[0].classList.add("active")
      }
      sllajderet[i + 1].classList.add("active")
      sllajderet[i].classList.remove("active")
      return
    }

  }
}

setInterval(ndrroAktiven, 5000)


// Statistikat

const nums = document.querySelectorAll(".statInfo");

function statsIncrease(){
  nums.forEach(num => {
    const updateNum = () => {
      let getNumData = Number(num.getAttribute("data-target"))
      let currentNum = +num.textContent
      let timeOut = 100
      const increment = getNumData / 1900
      timeOut += 0.01
      if (currentNum != getNumData) {
        num.textContent = `${Math.ceil(currentNum + increment)}`
        setTimeout(updateNum, timeOut)
      } else {
        num.textContent = getNumData
      }
    }
    updateNum()
  
  })
}


window.addEventListener('scroll', () => {
  if(window.scrollY >= 900){
    statsIncrease()
  }
})

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

