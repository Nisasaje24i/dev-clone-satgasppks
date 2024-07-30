    var dayAndTimeElement = document.getElementById("day-and-time");
    var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

    function updateTime() {
        var today = new Date();
        var day = days[today.getDay()];
        var date = today.getDate() + '/' + (today.getMonth() + 1) + '/' + today.getFullYear();
        var hour = today.getHours();
        var minute = today.getMinutes();
        var second = today.getSeconds();
        var timeRange = (hour < 10 ? '0' + hour : hour) + ':' + (minute < 10 ? '0' + minute : minute) + ':' + (second < 10 ? '0' + second : second);
        dayAndTimeElement.innerHTML = "<i class='bi bi-clock'></i> " + day + " - " + date + ", " + timeRange;
    }

    updateTime();

    setInterval(updateTime, 1000);
