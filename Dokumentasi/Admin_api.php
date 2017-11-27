#########################################
#				User					#
#		CRUD User API v1				#
#		URL API = /api/v1/admin			#
#		method = application/json		#
#########################################

1. Add new user
	- Request (e.g)
		{
			"m":"add",
			"platfrom":"web",
			"nama":"nama",
			"alamat":"alamat",
			"email":"email",
			"telp":"telp",
			"id_u":"id_u"
		}

	- Response
		{
			"code": 200,
			"message": "OK",
			"data": null
		}

2. Get User By ID
	- Request (e.g)
		{
			"m":"getAdmin",
			"platfrom":"web",
			"uid":"1"
		}

	- Response
		{
			"code": 200,
			"message": "OK",
			"data": {
				"uid": 6,
				"nama": "Rudyanto",
				"alamat": "Malang",
				"email": "rudyanto@gmail.com",
				"telp": "087555",
				"id_u": 31
			}
		}

3. Delete User
	- Request (e.g)
		{
			"m":"del",
			"platfrom":"web",
			"uid":"1"
		}
	- Response
		{
			"code": 200,
			"message": "OK",
			"data": null
		}

4. Update User
	- Request (e.g)
		{
			"m":"edit",
			"platfrom":"web",
			"uid":"1",
			"nama":"nama",
			"alamat":"alamat",
			"email":"email",
			"telp":"telp",
			"id_u":"id_u"
		}
	- Response
		{
			"code": 200,
			"message": "OK",
			"data": null
		}