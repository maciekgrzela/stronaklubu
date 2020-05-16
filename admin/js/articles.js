$(document).ready(function() {

    let table = $('#articlesTable').DataTable();
    let worker = $('#worker').val();

    console.log(worker);
 
    $('#articlesTable tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );

	table.clear();
	table.draw();

	$.ajax({
		url : "http://localhost/stronaklubu/backend/api/news/read_specific.php?worker_ID="+worker,
		method : "GET",
		dataType : "json"
		
	}).done((response) => {

			for (var i = 0; i < response.length; i++) {
				table.row.add(
                    [response[i].news_ID, 
                    response[i].worker_ID,
					response[i].title, 
					response[i].content_path, 
                    response[i].news_img_path,
                    response[i].tags,
                    response[i].viewers,
                    response[i].created_at]
					);
			}

			table.draw();
    });

    $("#articlesTable tbody").on('click', 'tr', function() {

        var newsID = table.row( this ).data()[0];
        var newsAuthor = table.row( this ).data()[1];
        var title = table.row( this ).data()[2];
        var content = table.row( this ).data()[3];
        var imgPath = table.row( this ).data()[4];
        var tags = table.row( this ).data()[5];

        
        $("#newsID").val(newsID);
        $("#authorID").val(newsAuthor);
        $("#newsTitle").val(title);
        $("#newsContent").val(content);
        $("#newsImgPath").val(imgPath);
        $("#newsTags").val(tags);
       
   });  

   $( '#btnAddArticle' ).click(function(e) {
        e.preventDefault();

        var newsID = $("#newsID").val();
        var worker_ID = $("#authorID").val();
        var title = $("#newsTitle").val();
        var content = $("#newsContent").val();
        var imgPath = $("#newsImgPath").val();
        var tags = $("#newsTags").val();

        $.ajax({
            url : "http://localhost/stronaklubu/backend/api/news/create.php",
            method : "post",
            dataType : "json",
            data : {
                title: title,
                content_path: content,
                news_img_path: imgPath,
                tags: tags,
                worker_ID: worker_ID
            }

        }).done((response) => {

            alert("Poprawnie dodano artykuł");
            console.log(response);
            location.reload();
        });
  });

  $( '#btnDeleteArticle' ).click(function(e) {
    e.preventDefault();

    var _newsID = $("#newsID").val();

    request = $.ajax({
        url : "http://localhost/stronaklubu/backend/api/news/delete.php",
        method : "post",
        dataType : "json",
        data : {
            news_ID: _newsID
        }
    });
    
    request.fail((response) => {
        alert("Błąd");
        console.log(response);
    });

    request.done((response) => {
        alert("Poprawnie usunięto artykuł");
        console.log(response);
        location.reload();
    });
 });

 $( '#btnEditArticle' ).click(function(e) {
    e.preventDefault();

    var _newsID = $("#newsID").val();
    var _title = $("#newsTitle").val();
    var _content_path = $("#newsContent").val();
    var _news_img_path = $("#newsImgPath").val();
    var _tags = $("#newsTags").val();    
    var _worker_ID = $("#authorID").val();

    request = $.ajax({
        url : "http://localhost/stronaklubu/backend/api/news/update.php",
        method : "post",
        dataType : "json",
        data : {
            news_ID : _newsID,
            title : _title,
            content_path : _content_path,
            news_img_path : _news_img_path,
            tags : _tags,
            worker_ID : _worker_ID
        }
    });

    request.done((response) => {
        alert("Poprawnie zaktualizowano artykuł");
        location.reload();
    });

    request.fail((response) => {
        alert("Błąd");
    });    
 });
});
