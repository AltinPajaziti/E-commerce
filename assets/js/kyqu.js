const inputFields = document.querySelectorAll("input:not([type=submit])")
const labels = document.querySelectorAll(".form-control label")
const butonatPerKyqje = document.querySelectorAll(".buttonat")

butonatPerKyqje.forEach(btn => {
  btn.addEventListener("click", () => {
    document.querySelector(".containerOuter").classList.toggle("switch")
  })
})


inputFields.forEach(input => {
  input.setAttribute("placeholder","  ");
})


labels.forEach(label => {
  label.innerHTML = label.innerText
  .split('')
  .map((letter,index) => `<span style="transition-delay:${index * 30}ms">${letter}</span>`)
  .join('')
})

document.querySelector("button").addEventListener("click", () => {
  window.location.href = "./index.php"
})
