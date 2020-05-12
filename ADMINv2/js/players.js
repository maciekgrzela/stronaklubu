$(document).ready(function () {

	let table = $('#playersTable').DataTable();

	$('#playersTable tbody').on('click', 'tr', function () {
		if ($(this).hasClass('selected')) {
			$(this).removeClass('selected');
		}
		else {
			table.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	});

	$('#button').click(function () {
		table.row('.selected').remove().draw(false);
	});

	table.clear();
	table.draw();

	$.ajax({
		url: "http://localhost/PSIMv2/backend/api/player/read.php",
		method: "GET",
		dataType: "json"

	}).done((response) => {

		for (var i = 0; i < response.length; i++) {
			table.row.add(
				[response[i].player_ID,
				response[i].first_name,
				response[i].last_name,
				response[i].age,
				response[i].height,
				response[i].nationality,
				response[i].date_of_birth,
				response[i].place_of_birth,
				response[i].position,
				response[i].player_value,
				response[i].player_img_path]
			);
		}

		table.draw();
	});

	$("#xxx").click(function () {
		$('#playerID').val(123);
		$("#playerFirstName").val("firstNameDt");
		$("#playerLastName").val("lastNameDt");
		$("#playerAge").val(12);
		$("#playerHeight").val(123);
		$('#playerNationality').val("nationalityDt");
		$('#playerBirthday').val(2012-12-12);
		$('#playerBirthPlace').val("birthdayPlaceDt");
		$('#playerPosition').val("Bramkarz");
		$('#playerValue').val(12313);
		$('#playerImgPath').val("playerImgPathDt");
		$('#playerImgPreview').attr('src', playerImgPathDt);
	});

	$('input[type=file]').change(function () {
		var filePath = $('#playerImgPath').val();
		var dl = filePath.length;
		filePath = filePath.substring(12, dl);
		console.log(filePath);

		var searchPic = "img//" + filePath;

		//$('#playerImgPreview').attr('src', searchPic);

	});

	$("#playersTable tbody").on('click', 'tr', function () {
		var playerID = table.row(this).data()[0];
		var firstNameDt = table.row(this).data()[1];
		var lastNameDt = table.row(this).data()[2];
		var ageDt = table.row(this).data()[3];
		var heightDt = table.row(this).data()[4];
		var nationalityDt = table.row(this).data()[5];
		var birthdayDt = table.row(this).data()[6];
		var birthdayPlaceDt = table.row(this).data()[7];
		var positionDt = table.row(this).data()[8];
		var valueDt = table.row(this).data()[9];
		var playerImgPathDt = table.row(this).data()[10];

		$('#playerID').val(playerID);
		$("#playerFirstName").val(firstNameDt);
		$("#playerLastName").val(lastNameDt);
		$("#playerAge").val(ageDt);
		$("#playerHeight").val(heightDt);
		$('#playerNationality').val(nationalityDt);
		$('#playerBirthday').val(birthdayDt);
		$('#playerBirthPlace').val(birthdayPlaceDt);
		$('#playerPosition').val(positionDt);
		$('#playerValue').val(valueDt);
		$('#playerImgPath').val(playerImgPathDt);
		$('#playerImgPreview').attr('src', playerImgPathDt);

		console.log(playerImgPathDt);

	});

	$( '#btnAddPlayer' ).click(function (e) {
		e.preventDefault();

		var _first_name = $("#playerFirstName").val();
		var _last_name = $("#playerLastName").val();
		var _age = $("#playerAge").val();
		var _height = $("#playerHeight").val();
		var _nationality = $("#playerNationality").val();
		var _date_of_birth = $("#playerBirthday").val();
		var _place_of_birth = $("#playerBirthPlace").val();
		var _position = $("#playerPosition").val();
		var _player_value = $("#playerValue").val();
		var _player_img_path = $("#playerImgPath").val();

		$.ajax({
			url: "http://localhost/PSIMv2/backend/api/player/create.php",
			method: "post",
			dataType: "json",
			data: {
				first_name: _first_name,
				last_name: _last_name,
				age: _age,
				height: _height,
				nationality: _nationality,
				date_of_birth: _date_of_birth,
				place_of_birth: _place_of_birth,
				position: _position,
				player_value: _player_value,
				player_img_path: _player_img_path
			}
		}).done((response) => {
			alert("Poprawnie dodano piłkarza");
			console.log(response);
			console.log(_age);
			location.reload();
		});
	});

	$( '#btnEditPlayer' ).click(function (e) {
		e.preventDefault();

		var _player_ID = $("#playerID").val();
		var _first_name = $("#playerFirstName").val();
		var _last_name = $("#playerLastName").val();
		var _age = $("#playerAge").val();
		var _height = $("#playerHeight").val();
		var _nationality = $("#playerNationality").val();
		var _date_of_birth = $("#playerBirthday").val();
		var _place_of_birth = $("#playerBirthPlace").val();
		var _position = $("#playerPosition").val();
		var _player_value = $("#playerValue").val();
		var _player_img_path = $("#playerImgPath").val();

		$.ajax({
			url: "http://localhost/PSIMv2/backend/api/player/update.php",
			method: "post",
			dataType: "json",
			data: {
				player_ID: _player_ID,
				first_name: _first_name,
				last_name: _last_name,
				age: _age,
				height: _height,
				nationality: _nationality,
				date_of_birth: _date_of_birth,
				place_of_birth: _place_of_birth,
				position: _position,
				player_value: _player_value,
				player_img_path: _player_img_path
			}
		}).done((response) => {
			alert("Poprawnie edytowano piłkarza");
			location.reload();
		});
	});

	$( '#btnDeletePlayer' ).click(function (e) {
		e.preventDefault();

		var _player_ID = $("#playerID").val();

		console.log(_player_ID);

		$.ajax({
			url: "http://localhost/PSIMv2/backend/api/player/delete.php",
			method: "post",
			dataType: "json",
			data: {
				player_ID: _player_ID
			}

		}).done((response) => {
			alert("Poprawnie usunieto");
			console.log(response);
			location.reload();
		});
	});
});
