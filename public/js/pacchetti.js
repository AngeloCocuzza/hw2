
function pacchetti(event) {
  


  if (event.currentTarget.querySelector('#destinazione').value == '') {
    alert("Inserisci una destinazione!");
  }

  const form_data1 = new FormData(document.querySelector("#arrivo"));
  
  fetch('/pacchetti/load/' + encodeURIComponent(form_data1.get('destinazione'))).then(onResponse).then(onJson);


  event.preventDefault();
}
const form1 = document.querySelector('#arrivo');
  form1.addEventListener('submit',pacchetti);

function onJson(json) {
    
    
    console.log(json);    
    const cont=document.querySelector('.container');
    cont.innerHTML='';
    for(let j=0;j<json.length; j++) {
        const sez=document.createElement('section');
        const div=document.createElement('div');
        
        const utility=document.createElement('div');
       
        utility.classList.add('utility');
        const pacchettiid=document.createElement('div');
        
        
        
        const day=document.createElement('h5');
        
        const button = document.createElement('button');
        const info = document.createElement('div');
        const price = document.createElement('h5');
        info.classList.add('info');
        
        button.innerHTML='Aggiungi al carrello';
        
        
        day.textContent = ' partenza ore: ' + json[j].ora_partenza + '  Giorno ' + json[j].giorno;
        price.textContent = 'Prezzo ' + json[j].prezzo + '€';
        pacchettiid.textContent= json[j].id;
        const descrizione=document.createElement('div');
        const destinazione=document.createElement('h3');
        destinazione.textContent='Destinazione : '+ json[j].destinazione_tour;
        const iter=document.createElement('p');

        iter.textContent=json[j].descrizione;
        descrizione.appendChild(destinazione);
        descrizione.appendChild(iter);
        
        
       
        
        
        
        info.appendChild(day);
        info.appendChild(price);
        utility.appendChild(info);
        div.appendChild(descrizione);
        div.appendChild(utility);
        div.appendChild(button);    
        div.appendChild(pacchettiid); 
      descrizione.classList.add('info');
      sez.appendChild(div);
        cont.appendChild(sez);
        
        
        pacchettiid.classList.add('hidden');

        button.addEventListener('click',Cart);
    }
}

function onResponse(response) {
    console.log(response);
    return response.json();
}


function Cart(event) {
    const pacchetti = event.currentTarget.parentNode.querySelector('.hidden').textContent;
    console.log(pacchetti);
    fetch('pacchetti/add/' + pacchetti);
    window.location.reload();
}

function openMenu(event) {
    const mobile=document.querySelector('#mobile');
    mobile.classList.remove('hidden');
    menu.classList.add('hidden');
    document.body.classList.add("no_scroll");
  
    const elimina = document.querySelector('.elimina');
    elimina.addEventListener('click', removeMenu);
  }
  
  function removeMenu(event) {
    const mobile =document.querySelector('#mobile');
    mobile.classList.add('hidden');
    menu.classList.remove('hidden');
    document.body.classList.remove("no_scroll");
  }
  const menu = document.querySelector('#menu');
  menu.addEventListener('click',openMenu);

  function search(event) {

    if (event.currentTarget.querySelector('#citta').value == '') {
      alert("Inserisci una città!");
    }
  
    const form_data = new FormData(document.querySelector("#meteo"));
    console.log(form_data);
    fetch('/load/weather/' + encodeURIComponent(form_data.get('citta'))).then(searchResponse).then(searchJson);
  
  
    event.preventDefault();
  }
  
  function searchJson(json) {
    console.log(json);
    const ther = document.querySelector('.weather');
    ther.innerHTML='';
    const weat = document.createElement('div');
    const mcitta = document.createElement('h5');
    const ing_name  = document.createTextNode(json.name);
    mcitta.appendChild(ing_name);
    const temp = document.createTextNode(json.main.temp_max + '/' + json.main.temp_min + ' C° ' + json.weather[0].main);
    weat.appendChild(mcitta);
    weat.appendChild(temp);
    const icon = document.createElement('img');
    let src  = 'http://openweathermap.org/img/wn/' + json.weather[0].icon + '@2x.png';
    icon.src=src;
    weat.appendChild(icon);
    ther.appendChild(weat);
  }
  
  function searchResponse(response)
  {
      console.log(response);
      return response.json();
  }
  
  const form = document.querySelector('#meteo');
  form.addEventListener('submit', search);
