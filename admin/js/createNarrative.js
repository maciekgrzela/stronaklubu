$(document).ready(function () {

	let table = $('#matchesTable').DataTable();

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
				response[i].club_home_clubname,
				response[i].club_home_clubname,
				response[i].stadium,
				response[i].match_address,
				response[i].amount_of_spectators,
				response[i].earnings,
				response[i].date_of_match]
			);
		}

		table.draw();
    });

    $("#matchesTable tbody").on('click', 'tr', function () {
		var matchID = table.row(this).data()[0];
        var matchDate = table.row(this).data()[7];

        $('#matchID').val(matchID);
        $('#narrativeDate').val(matchDate);
		
		console.log(playerImgPathDt);

    });


    let table2 = $('#narrativesTable').DataTable();

	$('#narrativesTable tbody').on('click', 'tr', function () {
		if ($(this).hasClass('selected')) {
			$(this).removeClass('selected');
		}
		else {
			table2.$('tr.selected').removeClass('selected');
			$(this).addClass('selected');
		}
	});

	$('#button').click(function () {
		table2.row('.selected').remove().draw(false);
	});

	table2.clear();
	table2.draw();

	$.ajax({
		url: "http://localhost/stronaklubu/backend/api/narratives/read.php",
		method: "GET",
		dataType: "json"

	}).done((response) => {

		for (var i = 0; i < response.length; i++) {
			table2.row.add(
				[response[i].narrative_ID,
				response[i].title,
				response[i].date,
				response[i].match_ID]
			);
		}

		table2.draw();
    });

    $("#narrativesTable tbody").on('click', 'tr', function () {
		var narrativeID = table2.row(this).data()[0];
        var matchDate = table2.row(this).data()[2];
        var title = table2.row(this).data()[1];
        var matchID = table2.row(this).data()[3]

        $('#narrativeID').val(narrativeID);
        $("#matchID").val(matchID)
        $('#narrativeTitle').val(title);
        $('#narrativeDate').val(matchDate);
		
		console.log(playerImgPathDt);

    });

    // CREATE NEW NARRATIVE
    $("#btnAddNarrative").click( function(e) {
        e.preventDefault();

            var matchID = $("#matchID").val();
            var title = $("#narrativeTitle").val();
            var date = $("#narrativeDate").val();

            $.ajax({
                url : "http://localhost/stronaklubu/backend/api/narratives/create.php",
                method : "post",
                dataType : "json",
                data : {
                    match_ID: matchID,
                    title: title,
                    date: date
                }
            }).done((response) => {
        
                alert("Poprawnie dodano relację");
                console.log(response);
                location.reload();
            });
    });

    // DELETE NARRATIVE
    $("#btnDeleteNarrative").click( function(e) {
        e.preventDefault();

        var narrartiveID = $("#narrativeID").val();

        $.ajax({
            url : "http://localhost/stronaklubu/backend/api/narratives/delete.php",
            method : "post",
            dataType : "json",
            data : {
                narrative_ID: narrartiveID,
            }
        }).done((response) => {
    
            alert("Poprawnie usunięto relację");
            console.log(response);
            location.reload();
        });
    });

    // EDIT NEW NARRATIVE
    $( '#btnEditNarrative' ).click( function(e) {
        e.preventDefault();

        var narrartiveID = $("#narrativeID").val();
        var matchID = $("#matchID").val();
        var title = $("#narrativeTitle").val();
        var date = $("#narrativeDate").val();

        $.ajax({
            url : "http://localhost/stronaklubu/backend/api/narratives/update.php",
            method : "post",
            dataType : "json",
            data : {
                narrative_ID: narrartiveID,
                match_ID: matchID,
                title: title,
                date: date
            }
        }).done((response) => {
    
            alert("Poprawnie edytowano relację");
            console.log(response);
            location.reload();
        });
    });
});
