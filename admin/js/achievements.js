$(document).ready(function () {
    
    let table = $('#achievementsTable').DataTable();

    $('#achievementsTable tbody').on('click', 'tr', function () {
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


    $("#achievementsTable tbody").on('click', 'tr', function () {
        
        var _achievement_ID = table.row( this ).data()[0];
        var _achievement_year = table.row( this ).data()[1];
        var _achievement_name = table.row( this ).data()[2];

		$('#achievement_ID').val(_achievement_ID);
		$("#achievement_year").val(_achievement_year);
		$("#achievement_name").val(_achievement_name);

	});

    $.ajax({
        url: "http://localhost/PSIMv2/backend/api/achievements/read.php",
        method: "GET",
        dataType: "json"

    }).done((response) => {

        for (var i = 0; i < response.length; i++) {
            table.row.add(
                [response[i].achievement_ID,
                response[i].achievement_year,
                response[i].achievement_name]
            );
        }

        table.draw();
    });

	$('#btnAddAchievement').click(function (e) {
        e.preventDefault();

        var _achievement_year = $("#achievement_year").val();
		var _achievement_name = $("#achievement_name").val();

		$.ajax({
			url: 'http://localhost/PSIMv2/backend/api/achievements/create.php/',
			method: "post",
			dataType: "json",
			data: {
				// achievement_ID: _achievement_ID,
				achievement_year: _achievement_year,
				achievement_name: _achievement_name
            }
            
		}).done((response) => {
            alert("Poprawnie dodano osiągnięcie");
            console.log(response);
            location.reload();
        });
    });
    
	$('#btnDeleteAchievement').click(function (e) {
        e.preventDefault();
        
		var _achievement_ID = $("#achievement_ID").val();

		$.ajax({
			url: "http://localhost/PSIMv2/backend/api/achievements/delete.php/",
			method: "post",
			dataType: "json",
			data: {
				achievement_ID: _achievement_ID
            }
            
		}).done((response) => {
            alert("Poprawnie usunięto osiągnięcie");
            console.log(response);
            location.reload();
        });
    });    
    
	$('#btnEditAchievement').click(function (e) {
        e.preventDefault();
        
        var _achievement_ID = $("#achievement_ID").val();
        var _achievement_year = $("#achievement_year").val();
        var _achievement_name = $("#achievement_name").val();

		$.ajax({
			url: "http://localhost/PSIMv2/backend/api/achievements/update.php/",
			method: "post",
			dataType: "json",
			data: {
                achievement_ID: _achievement_ID,
                achievement_year: _achievement_year,
                achievement_name: _achievement_name
            }
		}).done((response) => {
            alert("Poprawnie edytowano osiągnięcie");
            console.log(response);
            location.reload();
        });
	});       
});