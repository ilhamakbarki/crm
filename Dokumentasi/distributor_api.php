#########################################
#			Distributor					#
#		CRUD Barang API v1				#
#		URL API = /api/v1/distributor	#
#		method = POST					#
#########################################

1. ADD to add new Distributor
	- Request (e.g)
		m = "add"
	 	platfrom = "web"
	 	nama = "nama"
	 	pt = "pt"
	 	alamat = "tes"
	 	email = "email"
	 	telp = "telp"
	 	grup = "grup"
	 	id_u = "null"

	 - response
	 	{
			"code": 200,
			"message": "OK",
			"data": null
		}

2. GET DISTRIBUTOR
	- Request (e.g)
		m = "get"
		platfrom = "web"
		uid = "uid"

	- Response
		{
			"code": 200,
			"message": "OK",
			"data": {
				"uid": 2,
				"nama": "Ilham Akbar",
				"pt": "tes",
				"alamat": "tes",
				"email": "tes@gmail.com",
				"telp": "087",
				"id_u": 2,
				"grup": 1
			}
		}

3. Eit Distributor
	- Request (e.g)
		m = "edit"
	 	platfrom = "web"
	 	uid = "uid"
	 	nama = "nama"
	 	pt = "pt"
	 	alamat = "tes"
	 	email = "email"
	 	telp = "telp"
	 	grup = "grup"
	 	id_u = "null"

	 - response
	 	{
			"code": 200,
			"message": "OK",
			"data": null
		}

4. DELETE DISTRIBUTOR
	- Request (e.g)
		m = "del"
		platfrom = "web"
		uid = "uid"

	- Response
		{
			"code": 200,
			"message": "OK",
			"data": null
		}