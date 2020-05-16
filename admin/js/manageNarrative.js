$(document).ready(function () {

	let table = $('#narrativesTable').DataTable();

	$('#narrativesTable tbody').on('click', 'tr', function () {
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
		url: "http://localhost/stronaklubu/backend/api/narratives/read.php",
		method: "GET",
		dataType: "json"

	}).done((response) => {

		for (var i = 0; i < response.length; i++) {
			table.row.add(
                [response[i].narrative_ID, 
                response[i].match_ID,
				response[i].title,
				response[i].date]
			);
		}

		table.draw();
    });

    $("#narrativesTable tbody").on('click', 'tr', function () {
		var narrativeID = table.row(this).data()[0];
        var matchDate = table.row(this).data()[7];

        $('#narrativeID').val(narrativeID);
        $('#narrativeDate').val(matchDate);
		
		console.log(playerImgPathDt);

    });


    let table2 = $('#narrativeItemsTable').DataTable();

	$('#narrativeItemsTable tbody').on('click', 'tr', function () {
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
		url: "http://localhost/stronaklubu/backend/api/narrative-items/read.php",
		method: "GET",
		dataType: "json"

	}).done((response) => {

		for (var i = 0; i < response.length; i++) {
			table2.row.add(
				[response[i].item_id,
                response[i].narrative_id,
                response[i].author_id,
                response[i].img_path,
				response[i].text,
				response[i].date]
			);
		}

		table2.draw();
    });

    $("#narrativeItemsTable tbody").on('click', 'tr', function () {
        var item_id = table2.row(this).data()[0];
        var narrative_id = table2.row(this).data()[1];
		var narrativeItemAuthor = table2.row(this).data()[2];
        var narrativeItemType = table2.row(this).data()[3];
        var narrativeContent = table2.row(this).data()[4];
        var date = table2.row(this).data()[5]

        
        $('#narrativeItemID').val(item_id);
        $("#narrativeID").val(narrative_id);
        $("#narrativeItemAuthor").val(narrativeItemAuthor)
        $('#chooseType').val(narrativeItemType);
        $("#narrativeItemContent").val(narrativeContent);
        $('#narrativeItemDate').val(date);
		


    });

    // CREATE NEW NARRATIVE
    $("#btnAddNarrativeItem").click( function(e) {
        e.preventDefault();

        var narrativeID = $("#narrativeID").val();
        var author = $("#narrativeItemAuthor").val();
        var type = $("#chooseType").val();
        var content = $("#narrativeItemContent").val();
        var date = $("#narrativeItemDate").val();

        $.ajax({
            url : "http://localhost/stronaklubu/backend/api/narrative-items/create.php",
            method : "post",
            dataType : "json",
            data : {
                narrative_id : narrativeID,
                author_id : author,
                img_path : type,
                text : content,
                date : date
            }
        }).done((response) => {
    
            alert("Poprawnie dodano wpis relacji");
            console.log(response);
            location.reload();
        });
    });

    // DELETE NARRATIVE
    $("#btnDeleteNarrativeItem").click( function(e) {
        e.preventDefault();

        var narrartiveID = $("#narrativeItemID").val();

        $.ajax({
            url : "http://localhost/stronaklubu/backend/api/narrative-items/delete.php",
            method : "post",
            dataType : "json",
            data : {
                item_id: narrartiveID,
            }
        }).done((response) => {
    
            alert("Poprawnie usunięto wpis relacji");
            console.log(response);
            location.reload();
        });
    });

    // EDIT NEW NARRATIVE
    $("#btnEditNarrativeItem").click( function(e) {
        e.preventDefault();
        var narrartiveItemID = $("#narrativeItemID").val();

        var narrativeID = $("#narrativeID").val();
        var author = $("#narrativeItemAuthor").val();
        var type = $("#chooseType").val();
        var content = $("#narrativeItemContent").val();
        var date = $("#narrativeItemDate").val();

        $.ajax({
            url : "http://localhost/stronaklubu/backend/api/narrative-items/update.php",
            method : "post",
            dataType : "json",
            data : {
                item_id: narrartiveItemID,
                narrative_id : narrativeID,
                author_id : author,
                img_path : type,
                text : content,
                date : date
            }
        }).done((response) => {
    
            alert("Poprawnie edytowano wpis relacji");
            console.log(response);
            location.reload();
        });
    });
});
