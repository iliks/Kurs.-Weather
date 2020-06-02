let viewTableA =  function (data) {
    let table = document.getElementById('content');
    let html ='';
    let i =0;
    data.forEach((el)=>{
        weatherFunc(el,i)
        html+=`<tr><td>${weather.city[i]}</td><td class="table-warning">${weather.temp[i]}</td><td class="table-success">${weather.atmo[i]}</td><td class="table-primary">${weather.wind[i]}</td><td><a href="#"  class="btn btn-danger" onclick="deleteCity(${i})">delete</a></td></tr>`
        i++
    });
    table.innerHTML = html
}

let deleteCity = function(id){
    $.ajax({
        url:'data.php',
        type:'DELETE',
        data:JSON.stringify({'id':id}),
        success:()=>{
            alert('Город удален');
        },
        error:()=>{
            alert('Возникла ошибка!')
        }
    });
};

let addCity = function(){
    let city = document.getElementById('cityName').value;
    let url = document.getElementById('cityURL').value;
    $.ajax({
        url:'data.php',
        type:'POST',
        data:JSON.stringify({type:'add', name:city, url:url}),
        success:()=>{
            alert(`Город ${city} добавлен!`)
            document.getElementById('cityName').value = '';
            document.getElementById('cityURL').value = ''
        },
        error:()=>{
            alert('Error')
        }
    });
};