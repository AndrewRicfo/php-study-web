function getXmlHttp() {
  var xmlhttp;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}


function checkLogin(login) {
 if(login!=''){
    var xmlhttp = getXmlHttp(); // Создаём объект XMLHTTP
    xmlhttp.open('POST', 'ajaxChecker.php', true); // Открываем асинхронное соединение
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем тип содержимого
    xmlhttp.send("Login=" + login); // Отправляем POST-запрос
    xmlhttp.onreadystatechange = function() { // Ждём ответа от сервера
      if (xmlhttp.readyState == 4) { // Ответ пришёл
        if(xmlhttp.status == 200) { // Сервер вернул код 200 (что хорошо)
          if (xmlhttp.responseText == '2'){ 
            document.getElementById("check_login").innerHTML = "Логін зайнятий!";
            document.getElementById('check_login').value = "Логін зайнятий!"
          }else{
           document.getElementById("check_login").innerHTML = "Логін свободний!";
           document.getElementById("check_login").value = "Логін свободний!";
         }
       }
     }
   };
 }
}


function checkPassword(){
  if(document.getElementById("pas").value != "" && document.getElementById("paas").value != ""){
    if (document.getElementById("pas").value == document.getElementById("paas").value){ document.getElementById("check_password").innerHTML = "Паролі співпадають";
    document.getElementById('check_password').value = 'Паролі співпадають';
  }else{ document.getElementById("check_password").innerHTML = "Паролі не співпадають";
  document.getElementById("check_password").value = "Паролі не співпадають";}
} else {
  document.getElementById("check_password").innerHTML = "";
}
}


function regOrNot(){
  if((document.getElementById('check_login').value == "Логін свободний!") && (document.getElementById('check_password').value == "Паролі співпадають"))
    document.getElementById('reg_button').innerHTML = '<input type=\"submit\" value=\"Далі!\" name=\"Go\">';
  else
    document.getElementById('reg_button').innerHTML = '<input type="submit" value="Далі!" name="Go" disabled=\"disabled\">';
}
