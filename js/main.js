$(document).ready(function(){

    $.ajax({
        url         : "http://localhost/stronaklubu/backend/api/news/read.php",
        method      : "get",
        dataType    : "json",
    }).done((response) => {
        response.reverse();
        let counter = 0;
        response.map((article) => {
            if(counter < 3){
                let carouselImportantArticle =
                    `<div class="carousel-item ${counter === 1 ? 'active': ''}">
                        <img src="img/articles/${article.news_img_path}.jpg" class="d-block col-10 pr-0 mr-0 float-right h-fixed-420">
                        <div class="carousel-caption article-carousel-caption col-5 text-left d-none d-md-block">
                            <div class="pl-2 pt-2">
                                <h1 class="display-4 my-1 font-weight-light">${article.title}</h1>
                                <p class="lead mb-3 font-weight-light text-justify">${article.content_path.substr(0, article.content_path.indexOf('{hl}')) }</p>
                                <p class="lead mb-0"><a href="article.php?article-id=${article.news_ID}" class="text-white font-weight-bold">Czytaj dalej...</a></p>
                            </div>
                        </div>
                    </div>`;
                $('.carousel-club-articles').append(carouselImportantArticle);
            }else {
                let singleArticle =
                    `<div class="blog-post mt-4 pb-3">
                    <h2 class="blog-post-title">${article.title}</h2>
                    <p class="blog-post-meta">${article.created_at} by <a href="#" class="text-secondary">${article.worker_first_name} ${article.worker_last_name}</a></p>
                    <img class="img img-fluid rounded shadow" src="img/articles/${article.news_img_path}.jpg" />
                    <strong class="d-block mt-3 mb-3 font-weight-normal">${article.content_path.substr(0, article.content_path.indexOf('{hl}')) }</strong>
                    <p class="font-weight-light">${article.content_path.substr(article.content_path.indexOf('{hl}') + 4, article.content_path.indexOf('{st}') - article.content_path.indexOf('{hl}') - 4) }...</p>
                    <button article-id="${article.news_ID}" class="btn btn-outline-secondary float-right">Przejdź do artykułu</button>
                </div>`;
                $('.club-articles').append(singleArticle);
            }
            counter++;
        });
        $('.loading').fadeOut('slow');
    });

    $.ajax({
        url         : "http://localhost/stronaklubu/backend/api/matches/read.php",
        method      : "get",
        dataType    : "json",
    }).done((response) => {
        let match = response[0];
        let nearestMatch = `
        <h4 class="pb-3">Najbliższy mecz</h4>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3 px-0">
                    <img class="img-fluid mx-auto d-block" src="./img/teams/${match.club1_ID === "1" ? match.club2_path_img_logo : match.club1_path_img_logo}.png" />
                </div>
                <div class="col-9 px-0">
                    <ul class="nearest-match-list">
                        <li>Data: ${match.date_of_match}</li>
                        <li>Przeciwnik: ${match.club2_clubname}</li>
                        <li>Miejsce: ${match.stadium}</li>
                    </ul>
                </div>
            </div>
        </div>`;
        $('.nearest-match').html(nearestMatch);
    });

    $.ajax({
        url         : "http://localhost/stronaklubu/backend/api/clubs/read.php",
        method      : "get",
        dataType    : "json",
    }).done((response) => {
        let pos = 1;
        response.map((club) => {
            console.log(club);
            let clubTableRow =
                `<tr>
                    <td class="${club.club_ID === "1" ? "font-weight-bold" : "" }">${club.league_position}.</td>
                    <td class="font-secondary ${club.club_ID === "1" ? "font-weight-bold" : "bold" } txt-left">${club.clubname}</td>
                    <td class="${club.club_ID === "1" ? "font-weight-bold" : "" }">${club.league_matches}</td>
                    <td class="font-secondary ${club.club_ID === "1" ? "font-weight-bold" : "bold" }">${club.league_points}</td>
                </tr>`;
            $('.clubs-table').append(clubTableRow);
            pos++;
        });
    });


    $.ajax({
        url         : "http://localhost/stronaklubu/backend/api/news/read_most_popular.php",
        method      : "get",
        dataType    : "json",
    }).done((response) => {
        response = response[0];
        let mostPopularArticle =
            `<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col-12 d-none d-lg-block">
                    <img src="img/articles/${response.news_img_path}.jpg" class="img img-fluid" />
                </div>
                <div class="col p-4 d-flex flex-column position-static">
                    <p class="d-inline-block mb-2 text-primary text-uppercase">Najchętniej odwiedzane</p>
                    <h3 class="mb-0 font-weight-light">${response.title}</h3>
                    <div class="mb-1 text-muted">${response.created_at}</div>
                    <p class="card-text mb-auto font-weight-light">${response.content_path.substr(0, response.content_path.indexOf('{hl}')) }...</p>
                    <a href="#" article-id="${response.news_ID}" class="stretched-link">Czytaj dalej</a>
                </div>
            </div>`;
        $('.most-popular-article').append(mostPopularArticle);
    });

    $.ajax({
        url         : "http://localhost/stronaklubu/backend/api/news/read_last_commented.php",
        method      : "get",
        dataType    : "json",
    }).done((response) => {
        response = response[0];
        let lastCommentedArticle =
            `<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
          <div class="col-12 d-none d-lg-block">
            <img src="img/articles/${response.news_img_path}.jpg" class="img img-fluid" />
          </div>
          <div class="col p-4 d-flex flex-column position-static">
            <p class="d-inline-block mb-2 text-secondary text-uppercase">Ostatnio komentowane</p>
            <h3 class="mb-0 font-weight-light">${response.title}</h3>
            <div class="mb-1 text-muted">${response.created_at}</div>
            <p class="card-text mb-auto font-weight-light">${response.content_path.substr(0, response.content_path.indexOf('{hl}')) }...</p>
            <a href="#" article-id="${response.news_ID}" class="stretched-link text-secondary">Czytaj dalej</a>
          </div>
        </div>`;
        $('.last-commented-article').append(lastCommentedArticle);
    });




    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:20,
        nav: false,
        responsiveClass:true,
        autoplay: true,
        dots: false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    })
});