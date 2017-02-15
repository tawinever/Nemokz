{
	"button": {
	"show": false,
		"text": "Request a callback"
},
	"fields": [
	{
		"type": "text",
		"name": "Ваше имя",
		"placeholder": "Как к вам обратиться?",
		"required": false,
		"sms": true
	},
	{
		"type": "tel",
		"mask": "(999) 999-9999",
		"name": "Номер телефона",
		"required": true,
		"sms": true
	}
],
	"form": {
	"template": "blackred",
		"title": "Request a callback",
		"button": "Request",
		"align": "center",
		"welcome": "Закажите обратный звонок. Перезвоним за 2 минуты!"
},
	"alerts": {
	"yes": "Да",
		"no": "Нет",
		"process": "Отправка...",
		"success": "В течении 2 минут мы вам перезвоним!",
		"fails": {
		"required": "Введите номер телефона",
			"sent": "Сообщение уже отправлено!"
	}
},
	"captcha": {
	"show": true,
		"title": "Captcha",
		"error": "Captcha is wrong"
},
	"license": {
	"key": "0",
		"show": false
},
	"mail": {
	"referrer": "Page referrer",
		"url": "URL",
		"linkAttribute": "Link attribute",
		"smtp": false
},
	"animationSpeed": 150,
	"sms": {
	"send": true,
		"captions": true,
		"cut": true
}
}
