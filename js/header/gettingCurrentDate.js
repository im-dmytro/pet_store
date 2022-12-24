document.addEventListener('DOMContentLoaded',function (){
    const currentDate = setInterval(function (){
        const today = new Date();
        const date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        const time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
        const dateTime = date+' '+time;
        document.body.querySelector('.current-date').innerText=dateTime;
    },1000);
})