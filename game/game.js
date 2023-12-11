const shuffle = (array) => {
  for (let i = array.length - 1; i > 0; i--) {
    const j = Math.floor(Math.random() * (i + 1));
    [array[i], array[j]] = [array[j], array[i]];
  }
  return array;
};

let buttonValues = [
  "1",
  "2",
  "3",
  "4",
  "5",
  "6",
  "7",
  "8",
  "9",
  "0",
  "Q",
  "W",
  "E",
  "R",
  "T",
  "Y",
  "U",
  "I",
  "O",
  "P",
  "A",
  "S",
  "D",
  "F",
  "G",
  "H",
  "J",
  "K",
  "L",
  "Ç",
  "Z",
  "X",
  "C",
  "V",
  "B",
  "N",
  "M",
  "DEL",
  "DONE",
];

let words = ["CINCO", "REGUA", "PINTAR", "RAPIDO", "FRASCO"];
//, "SILABA", "JOGADOR", "CAMERA", "PRUDENTE", "ESFINGE", "RENASCER", "CAUTELOSO", "REFLETINDO", "EMERGENCIA", "ESTIMULANTE", "COMPREENDENDO", "HETEROGENEIDADE", "DESENVOLVENDO", "INSTITUCIONALIZACAO", "INCOMPREENSIBILIDADE"];

let newButtons = [];

const handleShuffle = () => {
  newButtons = shuffle(buttonValues);
  updateButtons();
};

const updateButtons = () => {
  const container = document.getElementById("buttons-container");

  while (container.firstChild) {
    container.removeChild(container.firstChild);
  }

  const input = document.getElementById("input");

  newButtons.forEach((value) => {
    const button = document.createElement("button");
    button.textContent = value;
    button.setAttribute("class", "btn");
    button.addEventListener("click", () => {
      if (value != "DEL" && value != "DONE") {
        input.innerText += value;
        input.setAttribute("style", "background-color: white");
      } else if (value == "DEL") {
        input.innerText = input.innerText.slice(0, -1);
      } else {
        done();
      }

      handleShuffle();
    });
    container.appendChild(button);
  });
};

const keyboardInit = () => {
  newButtons = buttonValues;
  updateButtons();
};

const word = document.getElementById("word");
const level = document.getElementById("level");

let i = 0;
function wordSelect() {
  word.innerText = words[i];
  i++;
  level.innerText = i;
}

function done() {
  if (input.textContent == word.textContent) {
    wordSelect();
    end();
  } else {
    input.setAttribute("style", "background-color: #f74a4a");
  }
  input.innerText = "";
}

let cron = document.getElementById("cron");
var resultTime;

function end() {
  if (i == words.length + 1) {
    resultTime = cron.textContent;
    stopCron();
    endScreen();
  }
}

function endScreen() {
  let containerGame = document.getElementById("container-game");
  containerGame.innerText = "";
  let pShow = document.createElement("p");
  pShow.innerText = "Parabéns! tempo: " + resultTime;
  pShow.setAttribute("style", "font-size: 35px");
  let turnBtn = document.createElement("a");
  turnBtn.innerHTML = "Voltar";
  turnBtn.setAttribute(
    "style",
    "  border: 1px solid black;padding: 5px;margin: 1px;font-weight: bold;font-size: 35px;color: black;background-color: #2ff4fa;cursor: pointer; height: 50px;border-radius: 10px;text-decoration: none;"
  );
  turnBtn.setAttribute("href", "../index/index.php");
  containerGame.appendChild(pShow);
  containerGame.appendChild(turnBtn);
}

let stopwatch;
let time = 0;
let run = false;

function startCron() {
  if (!run) {
    stopwatch = setInterval(() => {
      time += 10;
      const minutes = Math.floor(time / 60000);
      const seconds = Math.floor((time % 60000) / 1000);
      const miliseconds = time % 1000;

      const format = `${minutes.toString().padStart(2, "0")}:${seconds
        .toString()
        .padStart(2, "0")}:${miliseconds.toString().padStart(3, "0")}`;

      document.getElementById("cron").textContent = format;
    }, 10);
    run = true;
  }
}

function stopCron() {
  clearInterval(stopwatch);
  run = false;
  time = 0;
}

window.alert("Aperte ok para iniciar");
keyboardInit();
wordSelect();
startCron();
