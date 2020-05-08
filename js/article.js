$(document).ready(function(){
    $.ajax({
        url         : "http://localhost/stronaklubu/backend/api/news/read.php",
        method      : "get",
        dataType    : "json",
        data: {
            news_ID: $('body').attr('data-article')
        }
    }).done((response) => {
        console.log(response);
        response.map((article) => {
            if(article.news_ID === $('body').attr('data-article')){
                let singleArticle =
                    `<div class="blog-post mt-4 pb-3">
                    <h3 class="mt-4 pb-2 font-weight-light border-bottom d-flex"><a href="index.php"><ion-icon name="chevron-back-outline"></ion-icon></a> ${article.title}</h3>
                    <p class="blog-post-meta ml-2">${article.created_at} by <a href="#" class="text-secondary">${article.worker_first_name} ${article.worker_last_name}</a></p>
                    <img class="img img-fluid rounded shadow" src="img/articles/${article.news_img_path}.jpg" />
                    <strong class="d-block mt-3 mb-3 font-weight-normal">${article.content_path.substr(0, article.content_path.indexOf('{hl}')) }</strong>
                    <p class="font-weight-light">${article.content_path.substr(article.content_path.indexOf('{hl}') + 4) }...</p>
                </div>`;
                $('.article-main').html(singleArticle);
            }
            else {
                let singleArticle =
                    `<div class="col-md-3 mt-3 other-article">
                        <a class="d-block" href="article.php?article-id=${article.news_ID}">
                        <p class="bg-primary shadow p-1 rounded absolute-center d-none text-white">${article.title.substr(0, 30)}...</p>
                        <img class="img img-fluid rounded shadow" src="img/articles/${article.news_img_path}.jpg" />
                        </a>
                     </div>`;
                $('.other-articles').append(singleArticle);
            }
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
});

$(document).on('mouseover', '.other-article', function () {
    $(this).addClass('activeTitle');
    $(this).find('p').removeClass('d-none');
});

$(document).on('mouseout', '.other-article', function () {
    $(this).removeClass('activeTitle');
    $(this).find('p').addClass('d-none');
});