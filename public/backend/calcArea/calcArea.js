function calculate() {

    const length = Number(document.querySelector('#length').value);
    const height = Number(document.querySelector('#height').value);

            let area = length * height;
            let stairsFrames = Math.floor(height/2) + (length > 15 ? Math.floor(height/2) * Math.floor(length/15): 0);
            let passageFrames = Math.round(area/6) - (length > 15 ? Math.round(height/2) * Math.floor(length/15) : 0);
            let doubleConnections = (length * height / 6) ;
            let singleConnections = (length * height / 6);
            let level1Rafters = (length / 3 * 2);
            let allLevelRafters = singleConnections * 2;
            let bash = (height > 6) ? Math.round((length/3+1)*2) : 0;
            let level1Panels = length;
            let allLevelPanels = doubleConnections * 3;

    // Вывести данные в консоль
    console.log("Рам с лестницей: " + stairsFrames);

    document.querySelector('#area').value = area;
    document.querySelector('#stairsFrames').value = stairsFrames;
    document.querySelector('#passageFrames').value = passageFrames;
    document.querySelector('#doubleConnections').value = doubleConnections;
    document.querySelector('#singleConnections').value = singleConnections;
    document.querySelector('#allLevelRafters').value = allLevelRafters;
    document.querySelector('#allLevelPanels').value = allLevelPanels ;
    document.querySelector('#bash').value = bash ;



    // Дополнительные действия, если нужно, например, вывод результатов или обновление других элементов на странице
}

// Добавь слушатель события "input" к элементу с идентификатором "area", чтобы функция calculate() вызывалась при изменении значения
document.querySelector('#length').addEventListener('input', calculate);
document.querySelector('#height').addEventListener('input', calculate);


function calcSum() {
   const stairsFrames = Number(document.querySelector('#stairsFrames').value);
   const passageFrames =  Number(document.querySelector('#passageFrames').value);
   const doubleConnections =  Number(document.querySelector('#doubleConnections').value);
   const singleConnections =  Number(document.querySelector('#singleConnections').value);
   const allLevelRafters =  Number(document.querySelector('#allLevelRafters').value);
   const allLevelPanels = Number(document.querySelector('#allLevelPanels').value);
   const bash =  Number(document.querySelector('#bash').value);
   const jack = Number(document.querySelector('#jack').value);

   let equipment = (stairsFrames * 1500 + passageFrames * 1300 + doubleConnections * 530 + singleConnections * 300 + allLevelRafters * 800 + allLevelPanels * 250 + bash * 100 + jack * 800);
   console.log(equipment);
   document.querySelector('#equipment').value = equipment;
}

document.querySelector('#length').addEventListener('input',  calcSum);
document.querySelector('#height').addEventListener('input',  calcSum);
document.querySelector('#stairsFrames').addEventListener('input',  calcSum);
document.querySelector('#passageFrames').addEventListener('input',  calcSum);
document.querySelector('#doubleConnections').addEventListener('input',  calcSum);
document.querySelector('#singleConnections').addEventListener('input',  calcSum);
document.querySelector('#allLevelRafters').addEventListener('input',  calcSum);
document.querySelector('#allLevelPanels').addEventListener('input',  calcSum);
document.querySelector('#bash').addEventListener('input',  calcSum);
document.querySelector('#jack').addEventListener('input',  calcSum);



