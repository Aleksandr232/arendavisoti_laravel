function toursSum() {
    const footing1_5 = Number(document.querySelector('#footing1_5').value);
    const area0_45 =  Number(document.querySelector('#area0_45').value);
    const rama1_2 =  Number(document.querySelector('#rama1_2').value);
    const rigel2 =  Number(document.querySelector('#rigel2').value);
    const link0_7 =  Number(document.querySelector('#link0_7').value);
    const rama1_1 = Number(document.querySelector('#rama1_1').value);
    const emphasis =  Number(document.querySelector('#emphasis').value);
    const footing0_7 = Number(document.querySelector('#footing0_7').value);
    const area07_15 = Number(document.querySelector('#area07_15').value);
    const rama0_7 = Number(document.querySelector('#rama0_7').value);
    const rigel1_5 = Number(document.querySelector('#rigel1_5').value);
    const rama0_7_1 = Number(document.querySelector('#rama0_7_1').value);
    const footing2_4 = Number(document.querySelector('#footing2_4').value);
    const pipe = Number(document.querySelector('#pipe').value);
    const rama1_4 = Number(document.querySelector('#rama1_4').value);
    const link0_9 = Number(document.querySelector('#link0_9').value);

    let sum_equipment = (footing1_5 * 4000 + area0_45 * 2000 + rama1_2 * 1700 + rigel2 * 400 + link0_7 * 100 +  rama1_1 * 1000 + emphasis * 1000 + footing0_7 * 3600 + area07_15 * 2100 + rama0_7 * 1600 + rigel1_5 * 350 + rama0_7_1 * 900 + footing2_4 * 3000 + pipe * 800 + rama1_4 * 1800 + link0_9 * 120);
    console.log(sum_equipment);
    document.querySelector('#sum_equipment').value = sum_equipment;
 }

 document.querySelector('#footing1_5').addEventListener('input',  toursSum);
 document.querySelector('#area0_45').addEventListener('input',  toursSum);
 document.querySelector('#rama1_2').addEventListener('input',  toursSum);
 document.querySelector('#rigel2').addEventListener('input',  toursSum);
 document.querySelector('#link0_7').addEventListener('input',  toursSum);
 document.querySelector('#rama1_1').addEventListener('input',  toursSum);
 document.querySelector('#emphasis').addEventListener('input',  toursSum);
 document.querySelector('#footing0_7').addEventListener('input',  toursSum);
 document.querySelector('#area07_15').addEventListener('input',  toursSum);
 document.querySelector('#rama0_7').addEventListener('input',  toursSum);
 document.querySelector('#rigel1_5').addEventListener('input',  toursSum);
 document.querySelector('#rama0_7_1').addEventListener('input',  toursSum);
 document.querySelector('#footing2_4').addEventListener('input',  toursSum);
 document.querySelector('#pipe').addEventListener('input',  toursSum);
 document.querySelector('#rama1_4').addEventListener('input',  toursSum);
 document.querySelector('#link0_9').addEventListener('input',  toursSum);
