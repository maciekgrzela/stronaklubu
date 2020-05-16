$(document).ready(function () {
    
	let table = $('#matchesTable').DataTable();

	let worker = $('#worker').val();


	$('#matchesTable tbody').on('click', 'tr', function () {
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
		url: "http://localhost/stronaklubu/backend/api/matches/read.php",
		method: "GET",
		dataType: "json"

	}).done((response) => {

		for (var i = 0; i < response.length; i++) {
			table.row.add(
				[response[i].match_ID,
				response[i].clubHomeName,
				response[i].clubAwayName,
				response[i].stadium,
				response[i].match_address,
				response[i].amount_of_spectators,
				response[i].earnings,
				response[i].date_of_match]
			);
		}

		table.draw();
    });

    $.ajax({
		url: "http://localhost/stronaklubu/backend/api/clubs/read.php",
		method: "GET",
		dataType: "json"

	}).done((response) => {

		var chooseClubHome = document.getElementById("chooseClubHome");
		var chooseClubAway = document.getElementById("chooseClubAway");

		for (var i = 0; i < response.length; i++ ) {

			console.log(response[i].clubname);
			var option = document.createElement("option");
			option.text = String(response[i].clubname);

			var option2 = document.createElement("option");
			option2.text = String(response[i].clubname);
			
			chooseClubHome.add(option);
			chooseClubAway.add(option2);
		}

	});


	var club_home_name = $("#chooseClubHome").val();
	var club_away_name = $("#chooseClubAway").val();

	var club_home_ID;
	var club_away_ID;

	$("#chooseClubHome").change(function() {

		var club_home_name = $("#chooseClubHome").val();

		$.ajax({
			url : "http://localhost/stronaklubu/backend/api/clubs/read_single.php?clubname=" + club_home_name,
			method : "get",
			dataType : "json"
	
		}).done((response) => {
	
			club_home_ID = response.club_ID;
			console.log(club_home_ID);
		});
	});

	$("#chooseClubAway").change(function() {

		var club_away_name = $("#chooseClubAway").val();

		$.ajax({
			url : "http://localhost/stronaklubu/backend/api/clubs/read_single.php?clubname=" + club_away_name,
			method : "get",
			dataType : "json"
	
		}).done((response) => {
	
			club_away_ID = response.club_ID;
			console.log(club_away_ID);
		});
	});

	$("#matchesTable tbody").on('click', 'tr', function () {
		var matchID = table.row(this).data()[0];
		var chooseHome = table.row(this).data()[1];
		var chooseAway = table.row(this).data()[2];
		var stadium = table.row(this).data()[3];
		var matchAddress = table.row(this).data()[4];
		var matchDate = table.row(this).data()[7];

		$('#matchID').val(matchID);
		$("#chooseClubHome").val(chooseHome);
		$("#chooseClubAway").val(chooseAway);
		$("#matchStadium").val(stadium);
		$("#matchAddress").val(matchAddress);
		$('#matchDate').val(matchDate);


		var club_home_name = $("#chooseClubHome").val();

		$.ajax({
			url : "http://localhost/stronaklubu/backend/api/clubs/read_single.php?clubname=" + club_home_name,
			method : "get",
			dataType : "json"
	
		}).done((response) => {
	
			club_home_ID = response.club_ID;
			console.log(club_home_ID);
		});

		var club_away_name = $("#chooseClubAway").val();

		$.ajax({
			url : "http://localhost/stronaklubu/backend/api/clubs/read_single.php?clubname=" + club_away_name,
			method : "get",
			dataType : "json"
	
		}).done((response) => {
	
			club_away_ID = response.club_ID;
			console.log(club_away_ID);
		});
	});

	$( '#buttonAddMatch' ).click(function(e) {
		e.preventDefault();

		var stadium = $("#matchStadium").val();
		var matchAddress = $("#matchAddress").val();
		var matchDate = $("#matchDate").val();

		$.ajax({
			url : "http://localhost/stronaklubu/backend/api/matches/create.php",
			method : "post",
			dataType : "json",
			data : {
				club_home_ID: club_home_ID,
				club_away_ID: club_away_ID,
				stadium: stadium,
				match_address: matchAddress,
				amount_of_spectators: "0",
				earnings: "0",
				date_of_match: matchDate
			}
		}).done((response) => {
			alert("Poprawnie dodano artykuł");
			console.log(response);
			location.reload();
		});
	  });


	  $( '#buttonEditMatch' ).click(function(e) {
		e.preventDefault();

		var matchID = $("#matchID").val();
		var stadium = $("#matchStadium").val();
		var matchAddress = $("#matchAddress").val();
		var matchDate = $("#matchDate").val();

		console.log("XD1:" + club_home_ID);
		console.log(club_away_ID);

		$.ajax({
			url : "http://localhost/stronaklubu/backend/api/matches/update.php",
			method : "post",
			dataType : "json",
			data : {
				club_home_ID: club_home_ID,
				club_away_ID: club_away_ID,
				stadium: stadium,
				match_address: matchAddress,
				amount_of_spectators: "0",
				earnings: "0",
				date_of_match: matchDate,
				match_ID: matchID
			}
		}).done((response) => {
			alert("Poprawnie edytowano artykuł");
			console.log(response);
			location.reload();
		});
	  });


	  $( '#buttonDeleteMatch' ).click(function(e) {
		e.preventDefault();

		var matchID = $("#matchID").val();

		$.ajax({
			url : "http://localhost/stronaklubu/backend/api/matches/delete.php",
			method : "post",
			dataType : "json",
			data : {
				match_ID: matchID
			}
		}).done((response) => {
			alert("Poprawnie usunięto artykuł");
			console.log(response);
			location.reload();
		});
	  });
});