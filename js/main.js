var weather ={
    city:[],
    temp:[],
    wind:[],
    atmo:[],
};
let viewTable = function (data) {
    let table = document.getElementById('content');
    let html ='';
    let i =0;
    data.forEach((el)=>{
        weatherFunc(el,i)
        html+=`<tr><td>${weather.city[i]}</td><td class="table-warning">${weather.temp[i]}</td><td class="table-success">${weather.atmo[i]}</td><td class="table-primary">${weather.wind[i]}</td></tr>`
        i++
    });
    table.innerHTML = html
}

let weatherFunc = function(el,i){
    $.ajax({
        url:'/php/data.php',
        type:"POST",
        data: JSON.stringify({type:'parse', url:el.url}),
        success:(data)=>{
            weather.city[i] =el.city;
            let page = $(data).find('.temperature');
            weather.temp[i]=page[0].title;
            page = $(data).find('.note')
            weather.atmo[i]=page[0].innerText
            page = $(data).find('.wind')
            weather.wind[i]=page[0].title
        },
        error:()=>{

        }
    });
};

