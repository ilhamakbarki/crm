#########################################
#			Forgot Password				#
#				 API v1					#
#		URL API = /api/v1/forgot  		#
#		method = form data post			#
#########################################

1. Change Password
	Request (e.g)
		"m"="change"
		"platfrom"="web"
		"uid"="uid"
		"token"="token"
		"pwd"="pwd"
		"cpwd"="cpwd"

	Response
	{
		"code": 200,
		"message": "OK",
		"data": null
	}