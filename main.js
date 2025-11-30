const video = document.querySelector("#video");
const coments = Array.from(document.querySelectorAll(".coment"));
const popupForm = document.querySelector(".div__popup-form");
const placeComent = document.querySelector(".place-coment");




function showComent() {
  coments.forEach((elem) => {
    elem.style.display = "none";
  });

  placeComent.style.flexDirection = "column-reverse";
  let timeShow = 16 * 60 * 1000; // 16 минут в миллисекундах
  coments.forEach((elem) => {
    setTimeout(() => {
      elem.style.display = "flex";
      elem.classList.add("animate-show");

      setTimeout(() => {
        elem.classList.remove("animate-show");
      }, 300);

    }, timeShow);
    timeShow = timeShow + 10000;
  });

}

showComent();



video.currentTime = 0;
video.parentNode.addEventListener("click", function () {

  if (document.querySelector("#video") !== null) {
    video.parentNode.classList.toggle("full-video");
    video.parentNode.classList.toggle("relative");
    video.previousElementSibling.classList.toggle("none");
    document.querySelector('body').classList.remove('ovh');

    if (video.muted === true) {
      video.muted = false;

      // Всегда показываем видео на всю ширину экрана при воспроизведении
      video.style.width = "100%";
      video.style.maxWidth = "100%";
      video.style.height = "auto";
      video.style.maxHeight = "100%";

      video.nextElementSibling.classList.remove("none");
      video.play();
      document.querySelector('body').classList.add('ovh');
    } else {
      video.muted = true;
      video.style.width = "";
      video.style.height = "";


      // Возвращаем стили к исходным значениям
      video.style.maxWidth = "";
      video.style.maxHeight = "";
      video.nextElementSibling.classList.add("none");
    }
  }

});




let flagFormTimeUpdate = false;
let timeVideo = 0;


video.addEventListener("timeupdate", function () {
  timeVideo = Math.floor(video.currentTime);

  if (timeVideo > 900 && flagFormTimeUpdate === false) {
    document.querySelector('body').classList.add('ovh');
    flagFormTimeUpdate = true;
    const sectionForm = document.querySelector(".section-form");
    sectionForm.classList.remove("none");
  }

});



video.addEventListener("ended", function () {
  video.parentNode.classList.add("relative");
  video.parentNode.classList.remove("full-video");
  video.classList.add("none");
  video.nextElementSibling.classList.add("none");
  video.previousElementSibling.classList.add("none");
  video.parentNode.classList.add("none");
  console.log('asd')

  const sectionForm = document.querySelector(".section-form");
  sectionForm.classList.remove("none");
});



// Устанавливаем начальное время 
let timeInSeconds = 10 * 60;

// Функция для обновления времени на странице
function updateTimer() {
  if (document.querySelector(".timer") !== null) {
    const timerElement = document.querySelector(".timer");

    // Получаем минуты и секунды из времени в секундах
    const minutes = Math.floor(timeInSeconds / 60);
    const seconds = timeInSeconds % 60;

    // Форматируем время для отображения на странице
    const formattedTime = `${minutes < 10 ? "0" : ""}${minutes}:${seconds < 10 ? "0" : ""
      }${seconds}`;


    // Обновляем текст в элементе с классом "timer"
    timerElement.textContent = formattedTime;

    // Уменьшаем время на одну секунду
    timeInSeconds--;

    // Если время истекло, останавливаем отсчет
    if (timeInSeconds < 0) {
      clearInterval(interval);
    }
  }
}



// Вызываем функцию обновления каждую секунду
const interval = setInterval(updateTimer, 1000);



