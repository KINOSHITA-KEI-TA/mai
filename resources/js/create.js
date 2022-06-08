
    var today = new Date();
    today.setDate(today.getDate());
    var yyyy = today.getFullYear();
    var mm = ("0"+(today.getMonth()+1)).slice(-2);
    var dd = ("0"+today.getDate()).slice(-2);
    document.getElementById("today").value=yyyy+'-'+mm+'-'+dd;

    // var now = new Date();
    // now.setDate(now.getDate());
    // var nowhour = now.getHours();
    // var nowminutes = now.getMinutes();
    // var nowseconds = now.getSeconds();
    // document.getElementById("today_time").value = nowhour+":"+nowminutes+":"+nowseconds;
    // var text = nowhour + "：" + nowminutes + "：" + nowseconds; 

    var now = new Date();
    var nowhour = now.getHours();
    var nowminutes = now.getMinutes();
    // var nowseconds = now.getSeconds() + ":" + nowseconds;
    var text = nowhour + ":" + nowminutes; 
    document.getElementById("today_time").value = text;