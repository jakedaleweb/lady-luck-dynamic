//www.abeautifulsite.net/detecting-mobile-devices-with-javascript/
var isMobile = {
    Android: function() {
    	return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
   		return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
    	return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
    	return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
    	return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
   		return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

//create elements to manipulate
var ul = document.getElementById('phone');
var li = document.createElement('li');
var li2 = document.createElement('li');
var liSean = ul.appendChild(li);
var liGemma = ul.appendChild(li2);

//if mobile
// if(isMobile.any()){
// 	liSean.innerHTML = "<a href='tel: +64278139613'>0278139613 - Sean</a>";
// 	liGemma.innerHTML = "<a href='tel: +64274775344'>0274775344 - Gemma</a>";
// } else {
// 	liSean.innerHTML = "0278139613 - Sean";
// 	liGemma.innerHTML = "0274775344 - Gemma";
// }

