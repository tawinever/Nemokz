{
	"button": {
		"show": true,
		"text": "Short form"
	},
	"fields": [
		{
			"type": "text",
			"name": "Ваше имя",
			"placeholder": "Как нашим менеджерам к вам обратиться?",
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
		"align": "left",
		"welcome": "Закажите обратный звонок"
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
		"smtp": true
	},
	"animationSpeed": 150,
	"sms": {
		"send": true,
		"captions": true,
		"cut": true
	}
}
