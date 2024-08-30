const timeIndicator = document.querySelector("header p");

setInterval(()=> {
    const time = new Date();
    const hours = String(time.getHours()).padStart("2", 0);
    const minutes = time.getMinutes().toString().padStart("2", 0);
    const seconds = String(time.getSeconds()).padStart("2", 0);

    const currentTime = `${hours}:${minutes}:${seconds}`;
    
    timeIndicator.innerHTML = `${time.getDate()}. ${time.getMonth() + 1}. ${time.getFullYear()} ` + `<span class='actual-time'>${currentTime}</span>`;
    
}, 1000);